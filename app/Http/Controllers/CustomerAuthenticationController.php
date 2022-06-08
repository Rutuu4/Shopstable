<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use JWTFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use JWTAuth;
use Validator;
use Response;

class CustomerAuthenticationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'register_view', 'login_view', 'logout', 'show']]);
    }

    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
        try {
            if (!$token = auth('api')->attempt($credentials)) {
                return response()->json([
                    'error' => 'Invalid Credentials',
                ]);
            }
        } catch (JWTException $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage() . ' ' . $e->getLine()], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }

        // save $token in customer table
        $customer = Customer::where('email', $request->email)->first();
        $customer->remember_token = $token;
        $customer->save();

        // token in setcookie
        setcookie('customer_token',  $token, time() + (86400 * 30), "/"); // 86400 = 1 day

        response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ], 200);

        return redirect('/')->with([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth('api')->user(),
        ], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // dd('sd');
        if ($user) {
            $token = JWTAuth::fromUser($user);
            return redirect('customer/login')->with([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth('api')->factory()->getTTL() * 60,
                'user' => $user,
            ], 200);
        } else {
            return response()->json(['error' => 'Error while creating user'], HttpResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function logout()
    {

        $token = $_COOKIE['customer_token'];
        // delete token from customer table

        $customer = Customer::where('remember_token', $token)->update(['remember_token' => null]);

        // delete token from cookie
        setcookie('customer_token',  $token, time() - (86400 * 30), "/");

        return redirect('/')->with([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }

    public function register_view()
    {
        return view('customer.register');
    }
    public function login_view()
    {
        return view('customer.login');
    }
    public function show()
    {
        $customer=Customer::leftjoin('orders','orders.email','=','customers.email')
        ->leftjoin('orders_items','orders_items.order_id','=','orders.id')
        ->leftjoin('product','product.id','=','orders_items.product_id')
        ->select('customers.id as id','product.id as product','customers.name as name','orders.address as address','orders.total as total', DB::raw('COUNT(orders_items.product_id) as no_of_orders'))->paginate(10);
        return view('customer.customer',['customers'=>$customer]);
    }
}
