<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orders_items;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::get();
        if (empty($order)) {
            return view('orders.order');
        }
        if (!empty($order)) {
            return view('orders.order', ['order' => $order]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            $order = Order::insert([
                'email' => $request->email,
                'user_name' => $request->user_name,
                'card_no' => $request->card_no,
                'exapiration_date' => $request->exapiration_date,
                'cvc' => $request->cvc,
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'postal_code' => $request->postal_code,
                'payment_mode' => $request->payment_mode,
                'sub_total' => $request->sub_total,
                'discount' => $request->discount,
                'tax' => $request->tax,
                'shipping' => $request->shipping,
                'total' => $request->total,
                'order_status' => $request->order_status,

            ]);
            return response()->json(['success' => "uploaded", 'order' => $request->$order]);
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
        try {
            $order = Order::where('id', $id)->first();
            $items = Orders_items::where('order_id', $id)->get();

            if (empty($order)) {
                return view('orders.order');
            }
            if (!empty($order) && empty($items)) {
                return view('orders.order', ['order' => $order]);
            }
            if (!empty($items)) {
                return view('orders.order', ['order' => $order, 'items' => $items]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        try {
            $order = Order::where('id', $id)
                ->update([
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    'card_no' => $request->card_no,
                    'exapiration_date' => $request->exapiration_date,
                    'cvc' => $request->cvc,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'postal_code' => $request->postal_code,
                    'payment_mode' => $request->payment_mode,
                    'sub_total' => $request->sub_total,
                    'discount' => $request->discount,
                    'tax' => $request->tax,
                    'shipping' => $request->shipping,
                    'total' => $request->total,
                    'order_status' => $request->order_status,
                ]);

            $items = Orders_items::where('order_id', $id)
                ->update([
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_total' => $request->product_total,
                ]);
            return response()->json(['success' => "uploaded", 'order' => $request->$order, 'items' => $request->$items]);
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
        try {
            $order = Order::where('id', $id)->delete();
            return response()->json(['success' => "deleted", 'order' => $order]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
