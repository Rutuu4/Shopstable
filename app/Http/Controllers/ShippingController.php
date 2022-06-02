<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menubuilder;
use App\Models\Orders_items;
use App\Models\Purchase_items;
use App\Models\Themecolor;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theme = Themecolor::where('page_id', 'globle')->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }
        $token = $_COOKIE['customer_token'];
        $user_info = Customer::where('remember_token', $token)->first();

        $purchase_product_count = Purchase_items::count();
        $shipping = Orders_items::leftjoin('product', 'product.id', '=', 'orders_items.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('orders', 'orders.id', '=', 'orders_items.id')
            ->where('orders_items.user_id', $user_info->id)
            ->select('product_image.imageName', 'product.title', 'orders_items.price', 'product.shortDescription', 'orders.address', 'orders.email', 'orders.id as order_id', 'orders.total')
            ->groupBy('orders.id')
            ->get();


        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('shipping.shipping', [
            'navbar' => $navbar, 'shippings' => $shipping, 'theme' => $theme,
            'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0
        ]);
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
        //
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
