<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Carts;
use App\Models\Products;
use App\Models\Shippings;
use App\Models\Transactions;
use Session;

class UserController extends Controller
{

    public function index()
    {
        $products = Products::get();

        foreach($products as $p)
        {
            if(!empty($p))
            {
                $price = $p->price;
                $discount = $p->discount;
                if (!empty($discount))
                {
                    $disc = number_format(($discount/100) * $price, 3);
                    $result = number_format($price-$disc, 3);
                    
                }
            }
        }

        return view('index', [
            'products' => $products,
            'price'   => $price,
            'discount' => $discount,
            'result' => $result,
        ]);
    }

    public function register()
    {
        return view('user.register');
    }

    public function processRegis(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        
        $data = $request->all();
        $check = $this->create($data);

        return redirect('user/login');
    }

    public function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }    
    
    public function login()
    {
        return view('user.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('user/dashboard');
        }

        return redirect('user/login');
    }

    public function logout(Request $request)
    { 
        Session::flush();
        Auth::logout();
        return redirect('user/login');
    }
    
    //after login
    public function dashboard()
    {
        $products = Products::all();
        
        foreach($products as $p)
        {
            if(!empty($p))
            {
                $price = $p->price;
                $discount = $p->discount;
                if (!empty($discount))
                {
                    $disc = number_format(($discount/100) * $price, 3);
                    $result = number_format($price-$disc, 3);
                    
                }
            }
        }

        return view('user.index', [
            'products' => $products,
            'result' => $result,
        ]);
    }

    public function buy(Products $products, Carts $carts)
    {
        $products = Products::all();
        $carts = Carts::all();
        $shippings = Shippings::all();
        $countCarts = DB::table('carts')->count();
        $ship = number_format(10, 3);
        
        foreach($products as $p)
        {
            if(!empty($p))
            {
                $price = $p->price;
                $discount = $p->discount;
                if (!empty($discount))
                {
                    $disc = number_format(($discount/100) * $price, 3);
                    $result = number_format($price-$disc, 3);
                    
                }
            }
        }
        
        return view('user.buying', [
            'products'      => $products,
            'result'        => $result,
            'countCarts'    => $countCarts,
            'carts'         => $carts,
            'shippings'     => $shippings,
            'ship'          => $ship,
        ]);
    }

    public function buyProcess(Request $request, Transactions $transactions)
    {

        $data = new Transactions;
        $data->name = $request->name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->product_id = $request->product_id;
        // $data->shipping = $request->shipping;
        $data->total = $request->total;
        $data->save();

        return redirect('user/history');

    }

    public function cartsBuy(Products $products, Carts $carts)
    {
        $products = Products::all();
        $carts = Carts::all();
        $shippings = Shippings::all();
        $countCarts = DB::table('carts')->count();
        $ship = number_format(10, 3);
        
        foreach($products as $p)
        {
            if(!empty($p))
            {
                $price = $p->price;
                $discount = $p->discount;
                if (!empty($discount))
                {
                    $disc = number_format(($discount/100) * $price, 3);
                    $result = number_format($price-$disc, 3);
                    
                }
            }
        }
        
        return view('user.buying', [
            'products'      => $products,
            'result'        => $result,
            'countCarts'    => $countCarts,
            'carts'         => $carts,
            'shippings'     => $shippings,
            'ship'          => $ship,
        ]);
    }

    public function cartsBuyProcess(Request $request, Transactions $transactions)
    {

        $data = new Transactions;
        $data->name = $request->name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->product_id = $request->product_id;
        // $data->shipping = $request->shipping;
        $data->total = $request->total;
        $data->save();

        return redirect('user/history');

    }

    public function history()
    {
        $transactions = Transactions::latest()->paginate(5);

        return view('user.history', [
            'transactions'      => $transactions,
        ]); 
    }

    public function carts()
    {
        $carts = Carts::all();
        $products = Products::all();
        
        foreach($products as $p)
        {
            if(!empty($p))
            {
                $price = $p->price;
                $discount = $p->discount;
                if (!empty($discount))
                {
                    $disc = number_format(($discount/100) * $price, 3);
                    $result = number_format($price-$disc, 3);
                    
                }
            }
        }
        
        return view('user.carts', [
            'carts' => $carts,
            'result' => $result,
        ]);
    }

    public function storeCarts(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            // 'user_id' => 'required',
        ]);

        $data = new Carts;
        $data->product_id = $request->product_id;
        // $data->user_id = $request->user_id;
        // $data->discount = $request->discount;
        $data->save();
        
        return redirect('user/dashboard');
    }

    public function destroyCart(Carts $carts)
    {   
        $carts->delete();
        return redirect('user/carts');
    }

    public function account()
    {
        $id     = Auth::user()->id;
        $user   = User::find($id)->first();

        return view('user/account', [
            'status'    => 200,
            'user'      => $user,
        ]);
    }

    public function editAccount()
    {
        return view('user/edit-account');
    }

    public function updateAccount(Request $request)
    {
        $id = Auth::user()->id;
        $user  = User::find($id);

        $name             = $request->name;
        $birth            = $request->birth;
        $gender           = $request->gender;
        $phone_number     = $request->phone_number;
        $address          = $request->address;
        
        if($request->image == "")
        {
            $user->update([
                'name' => $name,
                'birth' => $birth,
                'gender' => $gender,
                'phone_number' => $phone_number,
                'address' => $address,
            ]);
        } else {
            
                $image = md5($request->image) . '.' . $request->image->extension('photo');;
                $request->image->storeAs('public/assets/photos/user', $image);
                
                $user->update([
                    'name' => $name,
                    'birth' => $birth,
                    'gender' => $gender,
                    'phone_number' => $phone_number,
                    'address' => $address,
                    'image' => $image,
                ]);
                    
            }
        return redirect('user/account');
    }

}