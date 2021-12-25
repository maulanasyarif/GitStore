@extends('admin.template.app')
@section('title', 'Product')
@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-dark border-primary">
            <h4 class="my-0 fw-normal">Product</h4>
        </div>
        <div class="card-body">
            <button class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addProduct">Add
                Product</button>
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Code </th>
                        <th> Name </th>
                        <th> Price </th>
                        <th> Stok </th>
                        <th> Discount</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($products as $p)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$p->product_code}}</td>
                        <td>{{$p->product_name}}</td>
                        <td>Rp. {{$p->price}}</td>
                        <td>{{$p->stok}}</td>
                        <td>{{$p->discount }}</td>
                        <form action="{{ route ('product.delete', $p->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="editProduct/{{$p->id}}" type="button"
                                    class=" btn btn-sm btn-outline-warning">Edit</a>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <div>
                    {{$products->links('pagination::bootstrap-4')}}
                </div>
            </div>
        </div>
    </div>

    <!-- modals add product -->
    <div class="modal fade" id="addProduct" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" col-md-12">
                            <div class="form-group">
                                <label for="product_code">Code</label>
                                <input id="product_code" type="text" name="product_code" class="form-control"
                                    value="{{old ('product_code') }}">
                                @error('product_code')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="product_name">Name</label>
                                <input id="product_name" type=" text" name="product_name" class="form-control"
                                    value="{{old ('product_name') }}">
                                @error('product_name')
                                <div class=" text-danger">{{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type=" text" name="price" class="form-control"
                                    value="{{old ('price') }}">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <textarea id="desc" class="form-control" name="desc"
                                    value="{{old ('desc') }}"></textarea>
                                @error('desc')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="size">Size</label>
                                <input id="size" class="form-control" name="size" value="{{old ('size') }}"></input>
                                @error('size')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{ csrf_field() }}

                            <label>Choose Picture</label>
                            <div class="form-group">
                                <input type="file" name="photo" required="required">
                            </div>
                            @error('photo')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input id="stok" class="form-control" name="stok" value="{{old ('stok') }}"></input>
                                @error('stok')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="discount">Discount</label>
                                <input id="discount" class="form-control" name="discount"
                                    value="{{ old('discount') }}"></input>
                                @error('discount')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
$(document).ready(function() {
    // $.ajaxSetup({
    //     header: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // })

    // $('body').on('click', '#submit'(event) {
    //     event.preventDefault()
    //     var id = $('#id').val();
    //     var product_code = $('#product_code').val();
    //     var product_name = $('#product_name').val();
    //     var price = $('#price').val();
    //     var desc = $('#desc').val();

    //     $.ajax({
    //         url: 'editProduct/' + id,
    //         type: 'POST',
    //         data: {
    //             id: id,
    //             product_code: product_code,
    //             product_name: product_name,
    //             price: price,
    //             desc: desc,
    //         },
    //         dataType: 'json',
    //         success: (data) {

    //         }
    //     })
    // })
});
</script>
@endpush
@endsection