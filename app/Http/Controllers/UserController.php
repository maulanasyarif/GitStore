<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use Session;

class UserController extends Controller
{

    public function index()
    {
        return view('index', [
            'products' => Products::get(),
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
            return redirect()->intended('/');
        }

        return redirect('user/login');
    }

    public function logout(Request $request)
    { 
        Session::flush();
        Auth::logout();
        return redirect('user/login');
    }
}