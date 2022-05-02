<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Product;
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
            Pages::insert([
                'name' => 'heloo',
                'pageData' => $request->pagaData,
                'category_data' => $request->category_data,
            ]);
            return response()->json(['success' => "uploaded", 'data' => $request->data]);
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
        $data = $Pages->select('pageData')->first();
        $assets = $Pages->select('assets')->first();
        $category_data = DB::table('category')->get();
        $product_data = DB::table('product')->get();
        $product_image = DB::table('product_image')->get();
        $category_data ? $category_data : '';
        // echo '<pre>';
        // print_r($category_data);
        // exit;
        $name = $Pages->select('name')->first();

        return view('PageBuilder.page', [
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
