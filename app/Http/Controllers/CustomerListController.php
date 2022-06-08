<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Menubuilder;
use App\Models\Purchase_items;
use App\Models\Themecolor;
use Illuminate\Http\Request;

class CustomerListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $theme = Themecolor::where('page_id', 'globle')->first();
            if ($theme->flag == 'globle') {
                $theme = Themecolor::where('page_id', 'globle')->first();
            }
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();
            $purchase_product_count = Purchase_items::count();
            $customer_list = Customer::where('id', '!=', $user_info->id)->get();
            $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
            return view('customerlist.customerlist', [
                'navbar' => $navbar, 'customer_list' => $customer_list, 'theme' => $theme,
                'purchase_product_count' => $purchase_product_count ? $purchase_product_count : 0,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        try {
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();
            $customer_list = Customer::where('id', '!=', $user_info->id)->get();
            $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
            return view('customerlist.customerlist', [
                'navbar' => $navbar, 'customer_list' => $customer_list,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
        try {
            $token = $_COOKIE['customer_token'];
            $user_info = Customer::where('remember_token', $token)->first();
            $customer_list = Customer::where('id', '!=', $user_info->id)->get();
            $navbar = Menubuilder::orderBy('nav_item_order', 'ASC')->get();
            return view('customerlist.customerlist', [
                'navbar' => $navbar, 'customer_list' => $customer_list,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
