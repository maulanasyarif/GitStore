<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discounts;

class DiscountController extends Controller
{
    public function index()
    {
        $discounts = Discounts::first()->paginate(10);
        // $discounts = Discounts::get();
        
        return view('admin.discount.index', [
            'discounts' => $discounts,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'voucher_code'  => 'required|unique:discounts',
            'discount'      => 'required',
        ]);

        $data = new Discounts;
        $data->voucher_code = $request->voucher_code;
        $data->discount     = $request->discount;
        $data->save();

        return redirect('admin/discount');
    }

    public function edit(Discounts $discounts)
    {
        return view('admin.discount.edit', [
            'discounts' => $discounts,
        ]);
    }

    public function update(Request $request, Discounts $discounts)
    {
        $request->validate([
            'voucher_code'  => 'required',
            'discount'      => 'required',
        ]);

        // $data->voucher_code = $request->voucher_codes;
        // $data->discount = $request->discounts;

        $discounts->update($request->all());
        return redirect('admin/discount');
    }

    public function destroy(Discounts $discounts)
    {
        $discounts->delete();
        return redirect('admin/discount');
    }
}