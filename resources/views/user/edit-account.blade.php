@extends('user.template.app')
@section('title', 'Setting Account')
@section('content')

<div class="py-4">
    <div class="mt-5">
        <div class="p-5 mb-4 bg-light rounded-3">
            <h1>Setting Account</h1>

            <form class="was-validated" action="{{ route('user.updateAccount', Auth::user()->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="validationTextarea" class="form-label">Name</label>
                        <input type="text" value="{{Auth::user()->name}}" name="name" class=" form-control is-invalid"
                            id="validationTextarea" placeholder="Your name here..." required></input>
                    </div>

                    <div class="mb-3">
                        <label for="birthDay" class="form-label">Date of Birth</label>
                        <input type="date" value="{{Auth::user()->birth}}" name="birth" class="form-control is-invalid"
                            id="validationTextarea" placeholder="Your name here..." required></input>
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" name="gender" required aria-label="select example">
                            <option value="" disabled selected class="bg-warning">Open this select menu</option>
                            <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected' : null }}>Male
                            </option>
                            <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected' : null }}>Female
                            </option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" aria-label="file example">
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" value="{{Auth::user()->phone_number}}" name="phone_number"
                            class="form-control is-invalid" id="validationTextarea"
                            placeholder="Your phone number here..." required></input>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" value="{{Auth::user()->address}}" name="address"
                            class="form-control is-invalid" id="validationTextarea" placeholder="Your address here..."
                            required></input>
                    </div>

                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <a href="{{ route('user.account') }}" type="button" class="btn btn-warning">Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection