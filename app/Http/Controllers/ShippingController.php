<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menubuilder;
use App\Models\Order;
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

        $order = Order::get(['id as order_id', 'unique_order_number', 'order_status', 'address', 'updated_at']);

        $shipping = Orders_items::leftjoin('product', 'product.id', '=', 'orders_items.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->leftjoin('orders', 'orders.unique_order_number', '=', 'orders_items.order_id')
            ->where('orders_items.user_id', $user_info->id)
            ->where('product_image.isFeatured', '1')
            ->select('product_image.imageName', 'product.id as product_id', 'product.title', 'orders_items.price', 'orders_items.quantity', 'product.shortDescription', 'orders.address', 'orders.email', 'orders.id as order_id', 'orders.total', 'orders.unique_order_number', 'orders.updated_at')
            // ->groupBy('orders_items.order_id')
            ->get();


        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
        return view('shipping.shipping', [
            'navbar' => $navbar, 'shippings' => $order, 'theme' => $theme,
            'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0,
            'order_items' => $shipping

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
