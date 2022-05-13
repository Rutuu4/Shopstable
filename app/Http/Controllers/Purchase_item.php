<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Purchase_item extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $purchase_item= Purchase_item::get();
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
        try {
            $purchase_item = Purchase_item::insert([
                'product_id'=>$request->product_id,
                'category_id',
                'price'=>$request->price,
                'quantity'=>$request->quantity,
                'sub_total'=>$request->sub_total,
            ]);
            return response()->json(['success' => "uploaded", 'purchase_item' => $request->$purchase_item]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
