<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Purchase_items;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $cart = Purchase_items::leftjoin('product', 'product.id', 'purchase_items.product_id')
                ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
                // ->where('purchase_items.user_id', auth()->user()->id)
                ->select('purchase_items.*', 'purchase_items.id as purchase_item_id', 'product.title', 'product.price','product.shortDescription', 'product_image.imageName')
                ->groupBy('product.id')->get();
            $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
            $purchase_product_count = Purchase_items::count();
            return view('shopping_cart.shopping_cart', ['navbar' => $navbar, 'cart' => $cart, 'purchase_product_count' => $purchase_product_count]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    }
}
