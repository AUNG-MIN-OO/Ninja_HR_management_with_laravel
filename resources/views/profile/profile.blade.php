@extends('layouts.app')
@section('title','View Employees')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="text-center">
                                <img src="{{asset('storage/employee/'.$ninja->profile_img)}}" alt="" style="width: 120px; height:120px;border-radius: 50%;margin-bottom: 20px">
                                <h5 class="text-capitalize">
                                    {{$ninja->name}}
                                </h5>
                                <p class="mb-0 font-weight-bolder primary-text">
                                    ( {{$ninja->employee_id}} )
                                </p>
                                <p class="my-2">
                                    @foreach($ninja->roles as $role)
                                        <span class="badge badge-pill badge-primary primary-background text-uppercase">{{$role->name}}</span>
                                    @endforeach
                                </p>
                                <p class="my-2 badge badge-pill badge-primary primary-background text-capitalize">
                                    {{$ninja->department?$ninja->department->title:'-'}}
                                </p>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Phone
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->phone}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Email
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->email}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Address
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->address}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Birthday
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->birthday}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    NRC Number
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->nrc_number}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Gender
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->choices}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Date Of Join
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->date_of_join}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Is present
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->is_present==1?'Yes':'No'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center">
                                <h5 class="text-center">Log in with device authentication</h5>
                                <form id="register-form">
                                    <button type="submit" class="btn shadow-sm" style="padding: 20px 10px">
                                        <i class="fas fa-fingerprint fa-4x primary-text"></i>
                                        <i class="fas fa-plus primary-text"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (){

            const register = (event) => {
                event.preventDefault()
                new Larapass({
                    register: 'webauthn/register',
                    registerOptions: 'webauthn/register/options'
                }).register()
                    .then(response => {
                        Swal.fire({
                            title: "Successfully Registered!",
                            text: "Device authentication is successfully set up.",
                            icon: "success",
                        })
                    })
                    .catch(response => console.log(response))
            }

            document.getElementById('register-form').addEventListener('submit', register)
        })
    </script>
@stop
