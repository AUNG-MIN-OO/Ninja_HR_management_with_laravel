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
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="md-form">
                                <label for="phone">{{ __('Phone') }}</label>

                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="md-form">
                                <label for="password" class="">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{old('password')}}" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>

                            <div class="md-form">
                                <div class="text-right">
                                    <button type="submit" class="btn btn-theme  w-100 mx-0">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
