<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Purchase_items;
use App\Models\Themecolor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = Themecolor::where('page_id', 'globle')->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }
        $purchase_product_count = Purchase_items::count();
        $categoryDetail = DB::table('product_category')
            ->leftjoin('product', 'product.id', '=', 'product_category.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('category', 'category.id', '=', 'product_category.category_id')
            ->where('product_image.isFeatured', true)
            ->select('product.*', 'product_image.imageName', 'category.id as categoryid', 'category.*', 'product.title as product_title')
            ->paginate(5);
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('category.categoryDetail', ['theme' => $theme, 'categoryDetail' => $categoryDetail, 'navbar' => $navbar, 'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0]);
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
        $theme = Themecolor::where('page_id', 'globle')->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }
        $purchase_product_count = Purchase_items::count();
        $categoryDetail = DB::table('product_category')
            ->where('product_category.category_id', $id)
            ->leftjoin('product', 'product.id', '=', 'product_category.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('category', 'category.id', '=', 'product_category.category_id')
            ->where('product_image.isFeatured', true)
            ->where('category.id', $id)
            ->select('product.*', 'product_image.imageName', 'category.id as categoryid', 'category.*', 'product.title as product_title', 'product.id as productId')
            ->paginate(5);

        $categorytitle = DB::table('category')->where('id', $id)->select('title')->first();
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('category.categoryDetail', ['categoryDetail' => $categoryDetail, 'navbar' => $navbar, 'categorytitle' => $categorytitle, 'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'theme'=>$theme]);
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
