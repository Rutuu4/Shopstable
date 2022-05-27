<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Orders_items;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping=Orders_items::leftjoin('product','product.id','=','orders_items.product_id')
        ->leftjoin('product_image','product_image.product_id','=','product.id')
        ->leftjoin('orders','orders.id','=','orders_items.id')
        ->select('product_image.imageName','product.title','orders_items.price', 'product.shortDescription','orders.address','orders.email')
        ->get();
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('shipping.shipping',['navbar' => $navbar,'shippings'=>$shipping]);
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
