<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Orders_items;
use App\Models\Purchase_items;
use App\Models\Themecolor;
use Illuminate\Http\Request;

class OrderConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $order = Order::where('tracking_number', $id)->first();
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();
            $order_items = Orders_items::leftjoin('product', 'product.id', '=', 'orders_items.product_id')
                ->where('orders_items.order_id', $id)
                ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
                ->leftjoin('orders', 'orders.id', '=', 'orders_items.id')
                ->where('orders_items.user_id', $user_info->id)
                ->select('product_image.imageName', 'product.title', 'orders_items.quantity', 'orders_items.price', 'product.shortDescription', 'orders.address', 'orders.email', 'orders.id as order_id', 'orders.total', 'orders_items.sub_total', 'product.id as product_id', 'orders.tracking_number')
                ->groupBy('orders.id')
                ->get();

            $theme = Themecolor::where('page_id', 'globle')->first();
            if ($theme->flag == 'globle') {
                $theme = Themecolor::where('page_id', 'globle')->first();
            }

            $purchase_product_count = Purchase_items::count();

            return view('orderConfirmation.orderConfirmation', [
                'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'order' => $order, 'theme' => $theme,
                'order_items' => $order_items
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Order not found'
            ], 404);
        }
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
