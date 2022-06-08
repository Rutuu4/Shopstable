<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menubuilder;
use App\Models\Order;
use App\Models\Orders_items;
use App\Models\Product;
use App\Models\Purchase_items;
use App\Models\Themecolor;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // generate trackin number
        $length = 20;
        $tracking_number = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

        $token = $_COOKIE['customer_token'];
        $user_info = Customer::where('remember_token', $token)->first();

        // theme color
        $theme = Themecolor::where('page_id', 'globle')->first();
        if ($theme->flag == 'globle') {
            $theme = Themecolor::where('page_id', 'globle')->first();
        }
        // cart count
        $purchase_product_count = Purchase_items::count();

        // get all orders
        $order = Order::get();
        $purchase_items = Purchase_items::leftjoin('product', 'product.id', '=', 'purchase_items.product_id')
            ->leftjoin('product_image', 'product_image.product_id', '=', 'product.id')
            ->select('product.id as product_id', 'product.title', 'product_image.imageName', 'purchase_items.price', 'purchase_items.quantity', 'purchase_items.sub_total')
            ->groupBy('product.id')
            ->get();

        //get navbar items
        $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();

        if (empty($order)) {
            return view('orders.order');
        }
        if (!empty($order)) {
            return view('order.order', ['user_id' => $user_info->id, 'order' => $order, 'theme' => $theme, 'navbar' => $navbar, 'datas' => $purchase_items, 'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'tracking_number' => $tracking_number]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

            $length = 20;
            $tracking_number = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);

            // User token
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();

            // Create new order
            $order = new Order();
            $order->email = $request->orderItemData[0]['id'];
            $order->user_id = $user_info->id;
            $order->tracking_number = $tracking_number;
            $order->user_name = $request->orderItemData[0]['first_name'] . '' . $request->orderItemData[0]['last_name'];
            $order->exapiration_date = Carbon::parse($request->exapiration_date)->format('Y-m-d');
            $order->address = $request->orderItemData[0]['address'];
            $order->city = $request->orderItemData[0]['city'];
            $order->state = $request->orderItemData[0]['state'];
            // $order->country = $request->country;
            $order->postal_code = $request->orderItemData[0]['postal_code'];
            $order->total = $request->orderItemData[0]['total'];

            $order->card_no = 1;
            $order->cvc = 1;
            $order->payment_mode = 1;

            $order->save();

            $order_id = $order->id;
            $category_id = DB::table('product_category')->where('product_id', $request->product_id)->first();

            // dd($category_id->category_id);
            for ($i = 1; $i < count($request->orderItemData); $i++) {
                $order_items = new Orders_items();
                $order_items->user_id = $user_info->id;
                $order_items->order_id = $order_id;
                $order_items->category_id = 1;
                $order_items->product_id = $request->orderItemData[$i]['product_id'];
                $order_items->quantity = $request->orderItemData[$i]['quantity'];
                $order_items->price = $request->orderItemData[$i]['price'];
                $order_items->sub_total = $request->orderItemData[$i]['sub_total'];
                $order_items->save();
            }
            // DB::table('purchase_items')->truncate();

            Purchase_items::where('user_id', $user_info->id)->delete();

            return response()->json([
                'order_confirmation_id' => $tracking_number,
            ]);
            // return response()->json(['success' => "uploaded", 'order' => $request->$order]);
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
        //
        try {
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();

            $purchase_product_count = Purchase_items::count();
            $order = Order::where('id', $id)->first();

            $items = Orders_items::where('order_id', $id)->get();

            if (empty($order)) {
                return view('order.order', ['purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'user_id' => $user_info->id]);
            }
            if (!empty($order) && empty($items)) {
                return view('order.order', ['order' => $order, 'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'user_id' => $user_info->id]);
            }
            if (!empty($items)) {
                return view('order.order', ['order' => $order, 'items' => $items, 'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0, 'user_id' => $user_info->id]);
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
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
            $order = Order::where('id', $id)
                ->update([
                    'email' => $request->email,
                    'user_name' => $request->user_name,
                    'card_no' => $request->card_no,
                    'exapiration_date' => $request->exapiration_date,
                    'cvc' => $request->cvc,
                    'address' => $request->address,
                    'city' => $request->city,
                    'state' => $request->state,
                    'postal_code' => $request->postal_code,
                    'payment_mode' => $request->payment_mode,
                    'sub_total' => $request->sub_total,
                    'discount' => $request->discount,
                    'tax' => $request->tax,
                    'shipping' => $request->shipping,
                    'total' => $request->total,
                    'order_status' => $request->order_status,
                ]);

            $items = Orders_items::where('order_id', $id)
                ->update([
                    'product_name' => $request->product_name,
                    'product_price' => $request->product_price,
                    'product_quantity' => $request->product_quantity,
                    'product_total' => $request->product_total,
                ]);
            return response()->json(['success' => "uploaded", 'order' => $request->$order, 'items' => $request->$items]);
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
            $order = Order::where('id', $id)->delete();
            return response()->json(['success' => "deleted", 'order' => $order]);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()]);
        }
    }
}
