<?php

namespace App\Http\Controllers;

use App\Models\Pages;
use App\Models\Themecolor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function show()
    {
        $pages = Pages::paginate(5);
        return view('pages.pages', ['pages' => $pages]);
    }
    public function addPages(Request $request)
    {
        DB::table('pages')->insert([
            'name' => $request->only('name'),
            // 'pageData' => ['default']
        ]);

        $id = Pages::orderby('id', 'DESC')->pluck('id')->first();

        Themecolor::insert([
            'page_id' => $id,
            'theme_color' => $request->theme_color,
            'flag' => 'globle'
        ]);

        $route =  "pageBuilder/" . $id;
        return redirect($route)->with([
            'success' => "data successfully added"
        ]);
    }

    public function deletePage($id)
    {

        Pages::where('id', $id)
            ->delete($id);
        return redirect()->back();
    }

    public function createPage($id)
    {
        return view('pages.createPage', ['id' => $id]);
    }

    public function pageData($id)
    {
        return Pages::where('id', $id)->get();
    }
    public function savePage($id, Request $request)
    {
        // dd(json_decode(file_get_contents("php://input")));
        $page_data = $request->only('savePageData');
        $page_data_assets = $request->only('assets');
        $page_data_components = $request->only('components');
        $page_data_html = $request->only('html');
        $page_data_css = $request->only('css');
        $page_data_styles = $request->only('styles');
        $data = Pages::where('id', $id)
            ->update([
                'pageData' => $page_data,
                'assets' => $page_data_assets,
                'components' => $page_data_components,
                'html' => $page_data_html,
                'css' => $page_data_css,
                'styles' => $page_data_styles
            ]);
        // return redirect('pages');
    }
}
