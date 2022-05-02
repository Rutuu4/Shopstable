<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index()
    {
        $page = DB::table('pages')->paginate(10);
        $name = Pages::select('name')->first();
        // dd($data['pageData']);
        if ($page->isEmpty()) {
            return view('dashboard');
        } else {
            return view('dashboard', ['page' => $page, 'name' => $name['name']]);
        }
    }
    public function show($id)
    {
        $Pages = Pages::where('id', $id);
        $data = $Pages->select('publish_data')->first();
        $name = $Pages->select('name')->first();
        // dd($data['pageData']);
        return view('PageBuilder.publishView', ['pageData' => $data['publish_data'], 'id' => $id, 'name' => $name['name']]);
    }


    public function update(Request $request, $id)
    {
        try {
            Pages::where('id', $id)
                ->update([
                    // 'name' => $request->pageData,
                    'is_publish' => true,
                    'publish_data' => $request->pageData
                ]);
            return response()->json(['success' => "uploaded", 'pageData' => $request->pagaData]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
