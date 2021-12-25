@extends('user.template.app')
@section('title', 'Dashboard')
@section('content')

<div class="container">
    <main>
        <div class="py-5 text-center">
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-pill">{{$countCarts}}</span>
                </h4>
                <ul class="list-group mb-3">

                    @foreach($carts as $c)

                    @if($c->products->discount == null)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{$c->products->product_name}}</h6>
                            <small class="text-muted">Stock {{$c->products->stok}}</small>
                        </div>
                        <span class="text-muted">Rp. {{$c->products->price}}</span>
                    </li>
                    @endif

                    @if($c->products->discount == !null)
                    <li class="list-group-item d-flex justify-content-between lh-sm">
                        <div>
                            <h6 class="my-0">{{$c->products->product_name}}</h6>
                            <small class="text-muted">Stock {{$c->products->stok}}</small>
                        </div>
                        <div>
                            <span class="text-muted">Rp. {{$result}}</span>
                        </div>
                    </li>
                    @endif
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (Rp)</span>
                        <strong>Rp.{{number_format(($c->products->sum('price') + $result), 3)}}</strong>
                    </li>

                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
            </div>

            <div class="col-md-7 col-lg-8">
                <h4 class="mb-3">Billing address</h4>
                <form action="{{ route('user.buyProcess') }}" method="POST">
                    @csrf
                    <div class="row g-3">
                        <div class="col-8">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class=" invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <div class="input-group has-validation">
                                <input type="text" class="form-control" id="phone_number" name="phone_number"
                                    placeholder="phoneNumber" required>
                                <div class="invalid-feedback">
                                    Your phone number is required.
                                </div>
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-8">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="1234 Main St" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <!-- <div class="col-md-5">
                            <label for="country" class="form-label">Country</label>
                            <select class="form-select" id="country" required>
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div> -->

                        <!-- <div class="col-md-4">
                            <label for="state" class="form-label">State</label>
                            <select class="form-select" id="state" required>
                                <option value="">Choose...</option>
                                <option>California</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="zip" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required>
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div> -->
                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked
                                required>
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                        <div class="form-check">
                            <input id="cod" name="paymentMethod" type="radio" class="form-check-input" required>
                            <label class="form-check-label" for="cod">Cash on Delivery</label>
                        </div>
                    </div>

                    <!-- <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required>
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required>
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required>
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required>
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div> -->

                    <!-- <hr class="my-4">
                    <div class="my-3">
                        @foreach($shippings as $s)
                        <div class="form-check">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <input id="shippings" name="shippings" value="{{$s->shipping_price}}" type="radio"
                                        class="form-check-input" checked required>
                                    <label class="form-check-label" for="shippings_name">{{ $s->shipping_name}}</label>
                                </div>
                                <div class=" col-sm-6">
                                    <label class="form-check-label" for="shippings_price">Rp.
                                        {{ $s->shipping_price}}</label>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> -->

                    <hr class="my-4">
                    <div class="row g-3">
                        <li class="d-flex justify-content-between">
                            <span>{{ $c->products->product_name}}</span>
                            <strong>Rp. {{ $c->products->price}}</strong>
                        </li>
                    </div>

                    <div class="row g-3">
                        <li class="d-flex justify-content-between">
                            <span>Shipping Cost</span>
                            <strong>Rp. {{ $ship }}</strong>
                        </li>

                        <hr class="my-2">

                        <li class="d-flex justify-content-between">
                            <span>Total (Rp)</span>
                            <strong>Rp.{{ $cost = number_format(($c->products->price + $ship), 3)}}</strong>
                            <input type="hidden" name="total" value="{{ $cost }}">
                            <input type="hidden" name="product_id" value="{{ $c->products->id}}">
                        </li>
                    </div>

                    <hr class=" my-4">
                    <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                </form>
            </div>
        </div>
    </main>
</div>

@endsection