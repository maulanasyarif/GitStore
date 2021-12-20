<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Discounts;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::latest()->paginate(10);
        $discounts = Discounts::all();
        
        return view('admin.product.index', [
            'products' => $products,
            'discounts' => $discounts,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code'  => 'required|unique:products',
            'product_name'  => 'required',
            'price'         => 'required',
            'desc'          => 'required',
            'size'          => 'required',
            'photo'         => 'required',
            'stok'          => 'required',
        ]);

        $data = new Products;
        $data->product_code = $request->product_code;
        $data->product_name = $request->product_name;
        $data->price = $request->price;
        $data->desc = $request->desc;
        $data->size = strtoupper($request->size);
        $data->stok = $request->stok;
        $data->discount = $request->discount_id;
        $data->photo = $request->photo->getClientOriginalName();
        $data->save();

        $photo = $request->photo;
        $extension = $photo->getClientOriginalExtension();
        $fileName = $data->photo;
        $photo->move(\public_path('\assets\photos'), $fileName);
        $photo = $fileName;
        
            return redirect('admin/product');
    }

    public function edit(Products $products)
    {
        $discounts = Discounts::get();
        return view('admin.product.edit', [
            'products' => $products,
            'discounts' => $discounts,
        ]);
    }

    public function update(Request $request, Products $products)
    {
        $rules = $request->validate([
            'product_code'  => 'required',
            'product_name'  => 'required',
            'price'         => 'required',
            'desc'          => 'required',
            'size'          => 'required',
            'stok'          => 'required',
        ]);
        
        $products = Products::find($request->id);
        
        $id = (int)$request->id;
        $product_code = $request->product_code;
        $product_name = $request->product_name;
        $price = $request->price;
        $size = strtoupper($request->size);
        $stok = $request->stok;
        $desc = $request->desc;
        $discount_id = $request->discount_id;

        if($request->photo == "")
        {
            $products->update([
                    'id' => (int)$id,
                    'product_code' => $product_code,
                    'product_name' => $product_name,
                    'price' => $price,
                    'size' => $size,
                    'stok' => $stok,
                    'desc' => $desc,
                    'discount_id' => $discount_id,
            ]);
        } else {
                
                $photo = $request->file('photo');
                $name = $photo->getClientOriginalName();
                $fileName = $name;
                $photo->move(\public_path('/assets/photos'), $fileName);
                
                $products->update([
                    'id' => (int)$id,
                    'product_code' => $product_code,
                    'product_name' => $product_name,
                    'price' => $price,
                    'size' => $size,
                    'stok' => $stok,
                    'desc' => $desc,
                    'discount_id' => $discount_id,
                    'photo' => $fileName,
                ]);
                    
            }
        return redirect('admin/product');
    }

    public function destroy(Products $products)
    {
        $products->delete();
        return redirect('admin/product');
    }
}