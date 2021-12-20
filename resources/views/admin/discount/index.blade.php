@extends('admin.template.app')
@section('title', 'Discount')
@section('content')

<div class="col-lg-12 grid-margin stretch-card mt-5">
    <div class="card mb-4 rounded-3 shadow border-success">
        <div class="card-header py-3 text-white bg-dark border-primary">
            <h4 class="my-0 fw-normal">Discount</h4>
        </div>
        <div class="card-body">
            <button class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#addVoucher">Add
                Voucher</button>
            <table id="example1" class="table table-striped table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th> No </th>
                        <th> Code </th>
                        <th> Discount</th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; ?>
                    @foreach($discounts as $d)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$d->voucher_code}}</td>
                        <td>{{$d->discount}}</td>
                        <form action="{{ route ('discount.delete', $d->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <td>
                                <a href="editDiscount/{{$d->id}}" type="button"
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
                        <h5 class="modal-title" id="staticBackdropLabel">Add Voucher</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('discount.store')}}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="voucher_code">Code</label>
                                    <input id="voucher_code" type="text" name="voucher_code" class="form-control"
                                        value="{{old ('voucher_code') }}">
                                    @error('voucher_code')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="discount">Discount</label>
                                    <input id="discount" type=" text" name="discount" class="form-control"
                                        placeholder="20%" value="{{old ('discount') }}">
                                    @error('discount')
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