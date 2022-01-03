@extends('layouts.plain')
@section('title','Login')
@section('content')
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <img src="{{asset('image/logo.png')}}" alt="Ninja HR" style="width: 80px">
                </div>
                <div class="card" style="height: 430px">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="fas fa-unlock-alt primary-text" style="font-size: 80px"></i>
                            <p class="mt-3 text-muted">Please choose login option...</p>
                        </div>
                        <ul class="nav nav-pills mb-3 w-100" id="pills-tab" role="tablist">
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link active" id="password" data-toggle="pill" href="#password_content" role="tab"
                                   aria-controls="pills-home" aria-selected="true">
                                    <i class="fas fa-eye"></i>
                                    Password
                                </a>
                            </li>
                            <li class="nav-item w-50 text-center">
                                <a class="nav-link" id="biometric" data-toggle="pill" href="#biometric_content" role="tab"
                                   aria-controls="biometric_content" aria-selected="false">
                                    <i class="fas fa-fingerprint"></i>
                                    Biometric
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-2 pl-1" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="password_content" role="tabpanel" aria-labelledby="password">
                                <!-- Material input -->
                                <form action="{{route('login')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="phone" value="{{request('phone')}}">
                                    <div class="md-form">
                                        <label for="form1" class="text-center">Password</label>
                                        <input type="text" id="form1" class="form-control" autofocus name="password">
                                        @foreach($errors->all() as $e)
                                            <small class="font-weight-bolder text-danger">
                                                * {{$e}}
                                            </small>
                                        @endforeach
                                    </div>

                                    <button class="btn btn-block">Submit</button>
                                    <a href="{{route('login')}}" class="btn btn-danger btn-block mt-3">Go back</a>
                                </form>
                            </div>
                            <div class="tab-pane fade text-center" id="biometric_content" role="tabpanel" aria-labelledby="biometric">
                                <input type="hidden" name="phone" id="phone" value="{{request('phone')}}">
                                <button type="submit" class="btn shadow-sm biometric-data-button" style="padding: 20px 10px;width: 120px;border-radius: 20px">
                                    <i class="fas fa-fingerprint fa-4x primary-text"></i>
                                    <p class="mb-0 mt-2 text-capitalize">Biometric</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra_js')
    <script>
        const login = (event) => {
            event.preventDefault()
            new Larapass({
                login: 'webauthn/login',
                loginOptions: 'webauthn/login/options'
            })
            .login({
                phone: document.getElementById('phone').value
            })
            .then(response => window.location.replace('/'))
            .catch(error => console.log(error))
        }

        $('.biometric-data-button').on('click',function (event){
            login(event)
        })
    </script>
@endsection
