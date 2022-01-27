@extends('user.template.app')
@section('title', 'Account')
@section('content')

<div class="py-4">
    <div class="mt-5">
        <div class="card border-primary mb-3 shadow">
            <!-- Three columns of text below the carousel -->
            <div class="card-body bg-light">
                <div class="row row-cols-2">
                    <div class="col-lg-2">
                        <img src="{{ url('storage/app/public/assets/photos/user/'. Auth::user()->image) }}"
                            class="rounded float-start" alt="...">

                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-5">
                        <h2>{{Auth::user()->name}}</h2>
                        <p>Member silver</p>
                        <p><a class=" btn btn-info" href="{{ route('user.accountEdit') }}">Detail Account &raquo;</a>
                        </p>
                    </div>
                </div><!-- /.row -->
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4">

            <div class="col">
                <div class="card shadow">
                    <div class="card-body bg-info text-center">
                        <img src="{{asset ('assets/icon/wallet.png')}}">
                        <h5 class="card-title mt-2">Payment</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-body bg-warning text-center">
                        <img src="{{asset ('assets/icon/package-box.png')}}">
                        <h5 class="card-title mt-2">Packed</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-body bg-success text-center">
                        <img src="{{asset ('assets/icon/shipped.png')}}">
                        <h5 class="card-title mt-2">Shipped</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                    <div class="card-body bg-primary text-center">
                        <img src="{{asset ('assets/icon/badge.png')}}">
                        <h5 class="card-title mt-2">Star</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="card mb-3 shadow mt-3">
            <ul class="list-group list-group-flush">
                <div class="justify-content-start">

                    <li class="list-group-item">
                        <img src="{{asset ('assets/icon/heart.png')}}"> My Favorit
                    </li>

                    <li class="list-group-item">
                        <img src="{{asset ('assets/icon/settings.png')}}"> Settings
                    </li>

                    <li class="list-group-item">
                        <img src="{{asset ('assets/icon/question-mark.png')}}"> Help Center
                    </li>

                    <li class="list-group-item">
                        <img src="{{asset ('assets/icon/chat.png')}}"> Chat GitStore
                    </li>
                </div>

            </ul>
        </div>

    </div>

    @endsection