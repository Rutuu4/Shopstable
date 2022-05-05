<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetails extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productDetail = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id')
            ->where('product_image.isFeatured', true)
            ->select('product.id', 'product_image.imageName', 'product.title', 'product.price', 'product.status', 'product.isFeatured')
            ->paginate(5);
        return view('products.productDetail', ['productDetail' => $productDetail]);
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
        $productDetail = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id')
            ->where('product.id', $id)
            ->select('product.*', 'product_image.imageName', 'product_image.isFeatured')
            ->get();
        return view('products.productDetail', ['productDetail' => $productDetail, 'id' => $id,]);
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
