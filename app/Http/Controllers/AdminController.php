<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Laravel\Passport\HasApiTokens;
use Laravel\Passport\RefreshToken;
use Laravel\Passport\Token;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Transactions;
use Session;

class AdminController extends Controller
{
    //
    public function register()
    {
        return view('admin.register');
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

        return redirect('login');
    }

    public function create(array $data)
    {
      return Admin::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }    

    public function login()
    {
        return view('admin.login');
    }

    public function customLoginAdmin(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $email      = $request->input('email');
        $password   = $request->input('password');
        
        $admin   = Admin::where('email', $email)->first();
        if (!$email){
            return redirect('login');
        }

        $isValidPassword = Hash::check($password, $admin->password);
        if (!$password)
        {
            return redirect('login');
        }
        return redirect('/admin/product');

    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    //after login
    public function dashboard()
    {
        $transactions = Transactions::latest()->paginate(5);

        return view('admin.dashboard', [
            'transactions'      => $transactions,
        ]); 
    }

    public function approveOrder(Request $request)
    {
        $data = Transactions::find($request->id)->get();

        foreach($data as $dt)
        {
            $id = $d->id;
            $name = $d->name;
            $phone_number = $d->phone_number;
            $email = $d->email;
            $address = $d->address;
            $product_id = $d->product_id;
            $total = $d->total;
        }

        $id;
        $name;
        $phone_number;
        $email;
        $address;
        $product_id;
        $total;

        DB::table('history')
        ->where('id',$request->id)
        ->insert([
            'id'    => $id,
            'name'  => $name,
            'phone_number'  => $phone_number,
            'email' => $email,
            'address'   => $address,
            'peoduct_id'    => $product_id,
            'total' => $total,
        ]);
        
        return redirect('admin/history');
    }

    public function destroyOrder(Request $request)
    {
        $data = Transactions::where($request->id)->get();
        
        foreach($data as $d)
        {
            $id = $d->id;
        }
        $id;
        
        $deleteHasil = Transactions::find($id, 'id')->delete();
        return redirect('admin/history')->with('error', 'Data has been deleted!');
    }

}