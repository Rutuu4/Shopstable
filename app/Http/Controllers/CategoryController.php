<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{

    public function show()
    {
        $category = DB::table('category')->orderBy('id')->paginate(5);
        return view('category.category', ['category' => $category]);
    }

    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');


        $imageName = time() . '.' . $image->extension();
        session(['imageName' => $imageName]);

        try {
            $image->move(public_path('images'), $imageName);
            return response()->json(['success' => "uploaded", 'imageName' => $imageName]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    public function addCategory(Request $request)
    {
        // dd(session('key'));
        $title = $request->input('title');
        $status = $request->input('status');
        $is_feature = $request->input('is_feature');
        $status = $request->input('status');
        $description = $request->input('description');
        // dd(session('key'));
        try {
            $addCategoryData = DB::table('category')
                ->insert([
                    'title' => $title,
                    'status' => $status,
                    'is_feature' => $is_feature,
                'category_image' => 'images/' . session('imageName'),
                    'description' => $description,
                ]);
            $request->session()->forget('imageName');
            return redirect('category')->with('success', 'hello');
            // return response()->json([
            //     'message' => $addCategoryData,
            // ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
    public function deleteCategory($id)
    {
        try {
            DB::table('category')->where('id', $id)->delete($id);
            return redirect('category');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
