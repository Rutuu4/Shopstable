<?php

namespace App\Http\Controllers;

use App\Models\Menubuilder;
use App\Models\Pages;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Pages = Pages::where('id', $id);

        $nav_item = Menubuilder::get();
        // dd($data['pageData']);
        if (empty($nav_item)) {
            return view('PageBuilder.menuBuilder',);
        }
        if (!empty($nav_item)) {
            return view('PageBuilder.menuBuilder', ['nav_item' => $nav_item]);
        }
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
            $link = $request->nav_item_link;
            Menubuilder::insert([
                'nav_item_name' => $request->nav_item_name,
                'nav_item_link' => $link,
                'nav_item_id' => $request->nav_item_id
            ]);
            Session::flash('message', 'Item successfully added!');
            return response()->json(['success' => "uploaded", 'assets' => $request->nav_item_name]);
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
        $assets =  Menubuilder::select('nav_item_name')->first();
        $name = $Pages->select('name')->first();
        // dd($data['pageData']);

        return view('PageBuilder.menuBuilder', ['pageData' => $data['pageData'], 'id' => $id, 'name' => $name['name'], 'assets' => $assets['nav_item_name']]);
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
            $link = $request->nav_item_link;
            Menubuilder::where('nav_item_id', $id)
                ->update([
                    // 'name' => $request->pageData,
                    'nav_item_name' => $request->nav_item_name,
                    'nav_item_link' => $link,
                    'nav_item_id' => $id
                ]);
            Session::flash('message', 'Item successfully Updated!');
            return response()->json(['success' => "uploaded", 'assets' => $request->nav_item_name]);
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
            Menubuilder::where('nav_item_id', $id)->delete();
            Session::flash('message', 'Item successfully deleted!');
            return response()->json(['message' => "item deleted successfully"]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
