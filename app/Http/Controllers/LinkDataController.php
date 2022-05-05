<?php

namespace App\Http\Controllers;

use App\Models\ItemLink;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LinkDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $component_links = ItemLink::all();
            // dd($data['pageData']);
            if (empty($component_links)) {
                return view('PageBuilder.page');
            }
            if (!empty($component_links)) {
                return view('PageBuilder.page', ['component_links' => $component_links]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
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
            ItemLink::insert([
                'page_id' => $request->page_id,
                'component_className' => $request->component_className,
                'link_name' => $request->link_name,
                'link_data' => $request->link_data,
            ]);
            Session::flash('message', 'Item successfully added!');
            return response()->json(['success' => "uploaded", 'assets' => $request->link]);
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
            ItemLink::where('id', $id)->update([
                'page_id' => $request->page_id,
                'component_className' => $request->component_className,
                'link_name' => $request->link_name,
                'link_data' => $request->link_data,
            ]);
            Session::flash('message', 'Item successfully updated!');
            return response()->json(['success' => "uploaded", 'assets' => $request->link]);
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
            ItemLink::where('id', $id)->delete();
            Session::flash('message', 'Item successfully deleted!');
            return response()->json(['success' => "uploaded"]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
