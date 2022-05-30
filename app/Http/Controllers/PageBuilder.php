<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Product;
use App\Models\Themecolor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PageBuilder extends Controller
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
        try {
            // dd($request->pagaData);
            $page = Pages::insert([
                'name' => 'heloo',
                'name' => 'heloo',
                'pageData' => $request->pagaData,
                'category_data' => $request->category_data,
            ]);
            return response()->json(['success' => "uploaded", 'page' => $request->$page]);
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

        $Pages = Pages::where('id', $id);
        $theme = Themecolor::where('page_id', $id)->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }

        $data = $Pages->select('pageData')->first();
        $assets = $Pages->select('assets')->first();
        $category_data = DB::table('category')->get();
        $product_data = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id', 'left')
            ->groupBy('product.id')
            ->where('product_image.isFeatured', true)->select('product.*', 'product_image.imageName', 'product_image.isFeatured')->get();
        $product_image = DB::table('product_category')
            ->leftjoin('product', 'product.id', '=', 'product_category.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('category', 'category.id', '=', 'product_category.category_id')
            ->where('category.id', $id)
            ->groupBy('product_image.product_id')
            ->select('product.*', 'product_image.imageName', 'category.id as categoryid', 'category.*', 'product.title as product_title', 'product.id as productId')
            ->get();
        $category_data ? $category_data : '';
        // echo '<pre>';
        // print_r($category_data);
        // exit;
        $name = $Pages->select('name')->first();

        return view('PageBuilder.page', [
            'product_image' => $product_image,
            'theme' => $theme,
            'category_data' => $category_data,
            'product_data' => $product_data,
            'product_image' => $product_image,
            'pageData' => $data['pageData'], 'id' => $id, 'name' => $name['name'], 'assets' => $assets['assets']
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
        try {
            // dd($request->pageData);
            Pages::where('id', $id)
                ->update([
                    // 'name' => $request->pageData,
                    'pageData' => $request->pageData,
                ]);
            return response()->json(['success' => "uploaded", 'pageData' => $request->pageData]);
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
    }
}
