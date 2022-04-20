<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class WebBuilderController extends Controller
{
    public function show($id)
    {
        $name = Pages::where('id', $id)->select('name')->first();
        $data = Pages::where('id', $id)->select()->get();
        return view('webBuilder.builder', ['id' => $id, 'name' => $name, 'data' => $data]);
    }

    public function screenDataLoad($id)
    {
        $data = Pages::where('id', $id)->select()->get();
        return response()->json(['data' => $data]);
    }

    public function screenDataSave($id, Request $request)
    {
        // $page_data_html = $request->get('html');
        // dd($request->get('gjs-html'));
        $page_data_html = $request->get('gjs-html');
        $page_data_css = $request->get('gjs-css');
        $page_data_assets = $request->get('gjs-assets');
        // $page_data_assets = $request->get('');
        $page_data_components = $request->get('gjs-components');
        $page_data_styles = $request->get('gjs-styles');
        $page_data = $request->get('savePageData');
        $updaeData = Pages::where('id', $id)
            ->update([
                'pageData' => $page_data,
                'assets' => $page_data_assets,
                'components' => $page_data_components,
                'html' => $page_data_html,
                'css' => $page_data_css,
                'styles' => $page_data_styles
            ]);
        return response()->json(['data' => $updaeData]);
    }

    public function imageUpload(Request $request, $image)
    {
        $Image = $request->file('files');
        $array = [];
        // dd($Image);

        for ($i = 0; $i < sizeof($Image); $i++) {
            $imageName = rand(1000, 1000000) . rand(1000, 1000000)  . '.' . $Image[$i]->extension();

            try {
                array_push($array, $imageName);
                $flag = 1;
                $Image[$i]->move(public_path('images/webScreen/1'), $imageName);
            } catch (Exception $e) {
                Log::error($e->getMessage());
                $flag = 0;
            }
        }

        if ($flag == 1) {
            // dd((url('images/webScreen/1/' . $imageName)));
            return response()->json(['success' => "uploaded", 'imageName' => $array, 'data' => (url('images/webScreen/1/' . $imageName))]);
        } else {
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    public function webView($id)
    {
        $name = Pages::where('id', $id)->select('name')->first();
        $data = Pages::where('id', $id)->select()->get();
        return view('webBuilder.webPreview', ['id' => $id, 'name' => $name, 'data' => $data]);
    }
}
