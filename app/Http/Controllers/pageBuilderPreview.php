<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Pages;
use App\Models\Purchase_items;
use App\Models\Themecolor;
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
        $theme = Themecolor::where('page_id', $id)->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }
        $data = $Pages->select('pageData')->first();
        $name = $Pages->select('name')->first();
        $purchase_product_count = Purchase_items::count();
        $category_data = DB::table('category')->get();
        $product_data = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id', 'left')
            ->where('product_image.isFeatured', true)->select('product.*', 'product_image.imageName', 'product_image.isFeatured')->get();
        $product_image = DB::table('product_category')
            ->leftjoin('product', 'product.id', '=', 'product_category.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('category', 'category.id', '=', 'product_category.category_id')
            ->where('category.id', $id)
            ->select('product.*', 'product_image.imageName', 'category.id as categoryid', 'category.*', 'product.title as product_title', 'product.id as productId')
            ->get();
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        $category_data ? $category_data : '';
        return view('PageBuilder.preview', [
            'category_data' => $category_data,
            'theme' => $theme,
            'product_data' => $product_data,
            'product_image' => $product_image,
            'pageData' => $data['pageData'],
            'id' => $id,
            'name' => $name['name'],
            'navbar' => $navbar,
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
