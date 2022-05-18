<?php

namespace App\Http\Controllers;

use App\Models\Themecolor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isEmpty;

class ThemeBuilder extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = Themecolor::get();
        // dd($data['pageData']);
        if (empty($theme)) {
            return view('setting.themeBuilder');
        }
        if (!empty($theme)) {
            return view('setting.themeBuilder', ['theme' => $theme]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
            // dd($request->pagaData);
            $themeColor1 = Themecolor::get();

            // print_r(count($themeColor1));
            // exit;
            // var_dump($themeColor1);
            if (count($themeColor1) == 0) {

                // print_r("a");
                // exit;
                Themecolor::create([
                    'page_id' => $id,
                    'theme_color' => $request->theme_color,
                    'flag' => $request->flag
                ]);
                return response()->json(['success' => "uploaded"]);
            } else {

                // print_r($request->pageData);
                // exit;
                $theme = Themecolor::where('page_id', $id);

                if ($theme->exists()) {
                    if ($request->flag == 'theme_color') {
                        $theme->update([
                            'theme_color' => $request->theme_color,
                            'flag' => $request->theme_flag
                        ]);
                        return response()->json(['success' => "uploaded", 'theme_color' => $request->theme_color]);
                    }
                    if ($request->flag == 'header_size') {
                        $theme->update([
                            'header_size' => $request->header_size,
                            'flag' => $request->theme_flag
                        ]);
                        return response()->json(['success' => "uploaded", 'header_size' => $request->header_size]);
                    }
                    if ($request->flag == 'lable_size') {
                        $theme->update([
                            'lable_size' => $request->lable_size,
                            'flag' => $request->theme_flag
                        ]);
                        return response()->json(['success' => "uploaded", 'lable_size' => $request->lable_size]);
                    }
                    if ($request->flag == 'paragraph_size') {
                        $theme->update([
                            'paragraph_size' => $request->paragraph_size,
                            'flag' => $request->theme_flag
                        ]);
                        return response()->json(['success' => "uploaded", 'paragraph_size' => $request->paragraph_size]);
                    }
                } else {
                    Themecolor::create([
                        'page_id' => $id,
                        'theme_color' => $request->theme_color,
                        'flag' => $request->flag
                    ]);
                    return response()->json(['success' => "uploaded", 'theme_color' => $request->theme_color]);
                }
            }
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
