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
                                <img src="{{asset('storage/employee/'.$ninja->profile_img)}}" alt="" style="width: 150px; height:150px;border-radius: 50%;margin-bottom: 20px">
                                <h4 class="">
                                    <i class="fas fa-user"></i>
                                    Employee Id
                                </h4>
                                <p class="mb-0 font-weight-bolder primary-text">
                                    ( {{$ninja->employee_id}} )
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
                                    Name
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->name}}
                                </p>
                            </div>
                        </div>
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
                                    Department Name
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$ninja->department?$ninja->department->title:'-'}}
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
        </div>
    </div>
@endsection
@section('script')

@stop
