@extends('admin.template.app')
@section('title', 'Shipping')
@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-dark border-primary">
            <h4 class="my-0 fw-normal">Shippings</h4>
        </div>
        <div class="card-body">
            <button class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addVoucher">Add
                Shipping</button>
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Name </th>
                        <th> Price</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($shipping as $d)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$d->shipping_name}}</td>
                        <td>Rp. {{$d->shipping_price}}</td>
                        <form action="{{ route ('shipping.delete', $d->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="editShipping/{{$d->id}}" type="button"
                                    class=" btn btn-sm btn-outline-warning">Edit</a>
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </td>
                        </form>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- modals add voucher -->
    <div class="modal fade" id="addVoucher" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Shipping</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('shipping.store')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="shipping_name">Shipping Name</label>
                                    <input id="shipping_name" type="text" name="shipping_name" class="form-control"
                                        value="{{old ('shipping_name') }}">
                                    @error('shipping_name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="shipping_price">Shipping Price</label>
                                    <input id="shipping_price" type=" text" name="shipping_price" class="form-control"
                                        value="{{old ('shipping_price') }}">
                                    @error('shipping_price')
                                    <div class=" text-danger">{{ $message }}
                                    </div>
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
</div>

@endsection