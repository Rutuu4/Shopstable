<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Pages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageBuilderPreview extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $Pages = Pages::where('id', $id);
        $data = $Pages->select('pageData')->first();
        $name = $Pages->select('name')->first();
        $category_data = DB::table('category')->get();
        $product_data = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id', 'left')
            ->where('product_image.isFeatured', true)->select('product.*', 'product_image.imageName', 'product_image.isFeatured')->get();

        $product_image = DB::table('product_image')->get();
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();

        return view('PageBuilder.preview', [
            'category_data' => $category_data,
            'product_data' => $product_data,
            'product_image' => $product_image,
            'pageData' => $data['pageData'],
            'id' => $id,
            'name' => $name['name'],
            'navbar' => $navbar
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
