@extends('user.template.app')
@section('title', 'Carts')
@section('content')

<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                @foreach($carts as $c)

                @if($c->products->discount == null)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="150" height="170"
                            src="{{ asset('assets/photos/' . $c->products->photo) }}" alt="image">
                        <title>{{ $c->products->product_name }}</title>
                        <div class="card-body">
                            <strong>{{ $c->products->product_name }}</strong> <br>
                            <small class="text-muted">Rp.{{ $c->products->price }}</small>&nbsp;&nbsp;&nbsp;
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('user.deleteCarts', $c->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group mt-2">
                                        <input type="hidden" class="form-control" value="{{$c->id}}" name="product_id">
                                        <a href=" {{ route('user.cartsBuy', $c->id) }}" type=" button"
                                            class="btn btn-outline-primary">Buy</a>&nbsp;
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>&nbsp;
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($c->products->discount == !null)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="150" height="170"
                            src="{{ asset('assets/photos/' . $c->products->photo) }}" alt="image">
                        <title>{{ $c->products->product_name }}</title>
                        <div class="card-body">
                            <strong>{{ $c->products->product_name }}</strong> <br>
                            <small class="text-muted">Rp.{{ $c->products->price }}</small>&nbsp;&nbsp;&nbsp;
                            <strong class="solid">Rp.{{$result}}</strong>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('user.deleteCarts', $c->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="btn-group mt-2">
                                        <input type="hidden" class="form-control" value="{{$c->id}}" name="product_id">
                                        <a href=" {{ route('user.cartsBuy', $c->id) }}" type=" button"
                                            class="btn btn-outline-primary">Buy</a>&nbsp;
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>&nbsp;
                                    </div>
                                </form>
                                <button class="btn btn-lg btn-warning">{{ $c->products->discount }}%</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @endforeach
            </div>
        </div>
    </div>
</main>

@endsection