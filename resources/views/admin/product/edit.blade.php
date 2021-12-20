@extends('admin.template.app')
@section('title', 'Edit Product')
@section('content')

<div class="col-lg-8 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Edit Product</h4>
        </div>
        <form action="{{ route('product.update', $products->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class=" card-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{ $products->id }}">
                        <label for=" product_code">Code</label>
                        <input id="product_code" type="text" name="product_code" class="form-control"
                            value="{{ $products->product_code }}">
                        @error('product_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="product_name">Name</label>
                        <input id="product_name" type=" text" name="product_name" class="form-control"
                            value="{{ $products->product_name }}">
                        @error('product_name')
                        <div class=" text-danger">{{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input id="price" type=" text" name="price" class="form-control" value="{{ $products->price }}">
                        @error('price')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="desc">Description</label>
                        <input id="desc" class="form-control" name="desc" value="{{ $products->desc }}"></input>
                        @error('desc')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="size">Size</label>
                        <input id="size" class="form-control" name="size" value="{{ $products->size }}"></input>
                        @error('size')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    {{ csrf_field() }}

                    <label>Choose Picture</label>
                    <div class="form-group">
                        <input type="file" name="photo" value="{{ $products->photo }}">
                    </div>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input id="stok" class="form-control" name="stok" value="{{ $products->stok }}"></input>
                        @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount</label>
                        <select class="form-control" id="discount" name="discount_id">
                            <option selected disabled class="bg-secondary">Choose Discount</option>
                            <option value="">No Discount</option>
                            @foreach ($discounts as $d)
                            <option value="{{$d->id}}" {{ $products->discount_id == $d->id ? 'selected' : null }}>
                                {{$d->disscount}} </option>
                            @endforeach
                        </select>
                        @error('discount')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route ('product.index') }}" class="btn btn-outline-warning mr-2 mt-3">Back</a>
                <button type="submit" class="btn btn-outline-primary mr-2 mt-3">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection