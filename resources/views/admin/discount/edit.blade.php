@extends('admin.template.app')
@section('title', 'Edit Voucher')
@section('content')

<div class="col-lg-8 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-success border-primary">
            <h4 class="my-0 fw-normal">Edit Voucher</h4>
        </div>
        <form action="{{ route('discount.update', $discounts->id) }}" method="post">
            @csrf
            @method('patch')
            <div class=" card-body">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="voucher_code">Code</label>
                        <input id="voucher_code" type="text" name="voucher_code" class="form-control"
                            value="{{ $discounts->voucher_code }}">
                        @error('voucher_code')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="discount">Name</label>
                        <input id="discount" type=" text" name="discount" class="form-control"
                            value="{{ $discounts->discount }}">
                        @error('discount')
                        <div class=" text-danger">{{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                <a href="{{ route ('discount.index') }}" class="btn btn-outline-warning mr-2 mt-3">Back</a>
                <button type="submit" class="btn btn-outline-primary mr-2 mt-3">Save</button>
            </div>
        </form>
    </div>
</div>

@endsection