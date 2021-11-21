@extends('layouts.app')
@section('title','Ninja HR')
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
                                <p class="my-2 badge badge-pill badge-primary primary-background text-capitalize">
                                    {{$ninja->department?$ninja->department->title:'-'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
