<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Purchase_items;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\isEmpty;

class Purchase_item extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchase_item = Purchase_items::get();
        if (empty($purchase_item)) {
            return view('shopping_cart.shopping_cart');
        }
        if (!empty($purchase_item)) {
            return view('shopping_cart.shopping_cart', ['purchase_item' => $purchase_item]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // try {
        //     $purchase_item = Purchase_item::insert([
        //         'product_id'=>$request->product_id,
        //         'category_id',
        //         'price'=>$request->price,
        //         'quantity'=>$request->quantity,
        //         'sub_total'=>$request->sub_total,
        //     ]);
        //     return response()->json(['success' => "uploaded", 'purchase_item' => $request->$purchase_item]);
        // } catch (Exception $e) {
        //     Log::error($e->getMessage());
        //     return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        // }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category_id = Product::join('product_category', 'product_category.product_id', '=', 'product.id', 'left')
                ->where('product.id', $request->product_id)
                ->select('product_category.category_id')
                ->get();

            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();


            $flag = Purchase_items::where('product_id', $request->product_id)->first();;
            if (is_null($flag)) {
                $purchase_item =    Purchase_items::insert([
                    'user_id' => $user_info->id,
                    'product_id' => $request->product_id,
                    'category_id' => $category_id[0]->category_id,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'sub_total' => $request->sub_total,
                ]);
                return response()->json(['success' => "item inserted successfully", 'purchase_item' => $request->$purchase_item]);
            } else {
                $purchase_item = Purchase_items::where('product_id', $request->product_id)->first();
                $purchase_item->quantity = $request->quantity;
                $purchase_item->sub_total = $request->sub_total;
                $purchase_item->save();
                return response()->json([
                    'success' => "item upadated successfully", 'purchase_item' => $request->$purchase_item,
                ]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $purchase_item = Purchase_items::find($id);
            return response()->json(['success' => "uploaded", 'purchase_item' => $purchase_item]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $purchase_item = Purchase_items::find($id);
            $purchase_item->quantity = $request->quantity;
            $purchase_item->sub_total = $request->sub_total;
            $purchase_item->save();

            // dd(Session::flash('message', 'Item Updated Successfully!'));
            Session::flash('message', 'Item Updated Successfully!');
            return response()->json(['success' => "uploaded", 'purchase_item' => $purchase_item]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $purchase_item = Purchase_items::find($id);
            $purchase_item->delete();
            return response()->json(['success' => "uploaded", 'purchase_item' => $purchase_item]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
