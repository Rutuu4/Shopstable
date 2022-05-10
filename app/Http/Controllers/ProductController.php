<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    // public $array=[];

    public function show()
    {
        $product = DB::table('product')
            ->join('product_image', 'product_image.product_id', 'product.id')
            ->where('product_image.isFeatured', true)
            ->select('product.id', 'product_image.imageName', 'product.title', 'product.price', 'product.status', 'product.isFeatured')
            ->paginate(5);
        return view('products.product', ['products' => $product]);
    }

    public function show_category()
    {
        $category_data = DB::table('category')->get();
        return view('products.addProduct', ['category_data' => $category_data]);
    }

    public function uploadProductImage(Request $request)
    {
        $productImage = $request->file('file');
        $imageName = time() . '.' . $productImage->extension();

        try {
            $productImage->move(public_path('images'), $imageName);
            return response()->json(['success' => "uploaded", 'imageName' => $imageName]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }

    public function addProduct(Request $request)
    {
        $targetKeyword = $request->input('productTargetKeyword');
        $title = $request->input('productTitle');
        $price = $request->input('price');
        $shortDescription = $request->input('productShortDescription');
        $longDescription = $request->input('productLongDescription');
        $status = $request->input('productStatus');
        $isFeatured = $request->input('productIsFeatured');
        $category_selected = $request->input('categorySelected');
        // dd($category_selected);
        $imageUploadName = json_decode($request->only('imageUploadName')['imageUploadName']);

        try {
            $product = DB::table('product');
            $addProductData = $product->insert([
                'product.title' => $title,
                'product.status' => $status,
                'product.isFeatured' => $isFeatured,
                'product.targetKeyword' => $targetKeyword,
                'product.price' => $price,
                'product.shortDescription' => $shortDescription,
                'product.longDescription' => $longDescription
            ]);

            $product_id = $product->where('title', $title)->first()->id;
            // $category_id = DB::table('category')->where('title', $category_selected)->first()->id;

            DB::table('product_category')
                ->insert([
                    'product_id' => $product_id,
                    'category_id' => $category_selected,
                ]);

            for ($i = 0; $i < count($imageUploadName); $i++) {
                DB::table('product_image')->insert([
                    'product_id' => $product_id,
                    'imageName' => 'images/' . $imageUploadName[$i],
                    'isFeatured' => (!$i)
                ]);
            }

            return redirect('product')->with([
                'message' => $addProductData,
                'success' => "data successfully added"
            ]);
            // return response()->json([
            //     'message' => $addProductData,
            //     'success' => "data successfully added",
            // ]);

        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
    public function deleteProduct($id)
    {
        Product::where('id', $id)->delete($id);
        DB::table('product_image')->where('product_id', $id)->delete();
        DB::table('product_category')->where('product_id', $id)->delete();
        return redirect('product');
    }
}
