@extends('user.template.app')
@section('title', 'Dashboard')
@section('content')

<main>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                @foreach($products as $p)
                @if($p->discount == null)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="150" height="170"
                            src="{{ asset('assets/photos/' . $p->photo) }}" alt="image">
                        <title>{{ $p->product_name }}</title>

                        <div class=" card-body">
                            <strong>{{ $p->product_name }}</strong> <br>
                            <small class="text-muted">Rp.{{ $p->price }}</small>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('user.storeCarts') }}" method="post">
                                    @csrf
                                    <div class="btn-group mt-2">
                                        <input type="hidden" class="form-control" value="{{$p->id}}" name="product_id">
                                        <a href=" {{ route('user.buy', $p->id) }}" type=" button"
                                            class="btn btn-outline-primary">Buy</a>&nbsp;
                                        <button type="submit" class="btn btn-outline-success">Cart</button>&nbsp;
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if($p->discount == !null)
                <div class="col">
                    <div class="card shadow-sm">
                        <img class="bd-placeholder-img card-img-top" width="150" height="170"
                            src="{{ asset('assets/photos/' . $p->photo) }}" alt="image">
                        <title>{{ $p->product_name }}</title>
                        <div class="card-body">
                            <strong>{{ $p->product_name }}</strong> <br>
                            <small class="text-decoration-line-through">Rp.{{ $p->price }}</small>&nbsp;&nbsp;&nbsp;
                            <strong class="solid">Rp.{{$result}}</strong>
                            <div class="d-flex justify-content-between align-items-center">
                                <form action="{{ route('user.storeCarts') }}" method="post">
                                    @csrf
                                    <div class="btn-group mt-2">
                                        <input type="hidden" class="form-control" value="{{$p->id}}" name="product_id">
                                        <a href=" {{ route('user.buy', $p->id) }}" type=" button"
                                            class="btn btn-outline-primary">Buy</a>&nbsp;
                                        <button type="submit" class="btn btn-outline-success">Cart</button>&nbsp;
                                    </div>
                                </form>
                                <button class="btn btn-lg btn-warning">{{ $p->discount }}%</button>
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