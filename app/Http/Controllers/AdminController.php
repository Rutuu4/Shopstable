<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function login()
    {
        return view('admin.login');
    }
    function register()
    {
        return view('admin.register');
    }
    function save(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:6|max:12'
        ]);

        // dd($request->email);
        $data=Admin::where('email',$request->email)->get();
        // dd($data[0]['email']);
        // $admin=Admin::where($data->email,$request->email)->first();
        if(!$data){
            return back()->with( ['error' => 'Email already exists' ]);
        }
        else{
            if(Hash::check($request->password, $data[0]['password']))
            {

                return redirect('/tenant');
            }
            else
            {
                return back()->with('failure','Invalid Password');
            }
        }

    }
}
