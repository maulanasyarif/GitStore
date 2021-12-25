@extends('admin.template.app')
@section('title', 'Edit Shipping')
@section('content')

<div class="col-lg-8 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Edit Shipping</h4>
        </div>
        <form action="{{ route('shipping.update', $shipping->id) }}" method="post">
            @csrf
            @method('patch')
            <div class=" card-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="shipping_name">Shipping Name</label>
                        <input id="shipping_name" type="text" name="shipping_name" class="form-control"
                            value="{{ $shipping->shipping_name }}">
                        @error('shipping_name')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="shipping_price">Name</label>
                        <input id="shipping_price" type=" text" name="shipping_price" class="form-control"
                            value="{{ $shipping->shipping_price }}">
                        @error('shipping_price')
                        <div class=" text-danger">{{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route ('shipping.index') }}" class="btn btn-outline-warning mr-2 mt-3">Back</a>
                <button type="submit" class="btn btn-outline-primary mr-2 mt-3">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection