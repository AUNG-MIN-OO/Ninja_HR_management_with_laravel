@extends('layouts.plain')
@section('title','Login')
@section('content')
<div class="container">
    <div class="row justify-content-center min-vh-100 align-items-center">
        <div class="col-md-6">
            <div class="text-center mb-4">
                <img src="{{asset('image/logo.png')}}" alt="Ninja HR" style="width: 80px">
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h4>Login </h4>
                        <p>Please fill log in form</p>
                    </div>
                    <form action="{{route('login-option')}}" method="GET">
                        <div class="md-form">
                            <label for="phone">{{ __('Phone') }}</label>

                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="btn btn-theme w-100">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
