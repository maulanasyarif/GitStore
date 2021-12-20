<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Admin;

class AdminController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('/');
        }

        return redirect('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}