<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shippings;

class ShippingController extends Controller
{
    public function index()
    {
        $shipping = Shippings::get();
        
        return view('admin.shipping.index', [
            'shipping' => $shipping,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'shipping_name'     => 'required|unique:shippings',
            'shipping_price'    => 'required',
        ]);

        $data = new Shipping;
        $data->shipping_name = $request->shipping_name;
        $data->shipping_price     = $request->shipping_price;
        $data->save();

        return redirect('admin/shipping');
    }

    public function edit(Shipping $shipping)
    {
        return view('admin.shipping.edit', [
            'shipping' => $shipping,
        ]);
    }

    public function update(Request $request, Shipping $shipping)
    {
        $request->validate([
            'shipping_name'     => 'required|unique:shippings',
            'shipping_price'    => 'required',
        ]);
        
        $shipping->update($request->all());
        return redirect('admin/shipping');
    }

    public function destroy(Shipping $shipping)
    {
        $shipping->delete();
        return redirect('admin/shipping');
    }
}