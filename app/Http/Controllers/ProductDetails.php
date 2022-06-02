<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Purchase_items;
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
            // ->where('product_image.isFeatured', true)
            ->select('product.id', 'product_image.imageName', 'product.title', 'product.price', 'product.status', 'product.isFeatured')
            ->take(2)
            ->get();
        dd($productDetail);
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
        $purchase_product_count = Purchase_items::count();
        $productDetail = DB::table('product')
            ->leftJoin('product_image', 'product_image.product_id', 'product.id')
            ->where('product.id', $id)
            ->where('product.status', 'active')
            ->select('product.*', 'product.title as title', 'product_image.imageName', 'product_image.isFeatured')
            ->orderBy('id', 'desc')
            ->limit(1)
            ->first();
        $productQuantity = Purchase_items::where('product_id', $id)->select('quantity')->first();
        // dd($productQuantity->quantity);
        if (is_null($productQuantity)) {
            $productQuantity = 1;
        } else {
            $productQuantity = $productQuantity->quantity;
        }

        $productImage = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id')
            ->where('product.id', $id)
            ->select('product.*', 'product_image.imageName', 'product_image.isFeatured')
            ->get();

        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('products.productDetail', [
            'productDetail' => $productDetail,
            'productQuantity' => $productQuantity,
            'productImage' => $productImage, 'id' => $id, 'navbar' => $navbar,
            'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0
        ]);
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
