@extends('layouts.app')
@section('title','View Company Settings')
@section('style')
    <style>
        .edit-setting:hover{
            color: var(--secondary-color);
        }
    </style>
@endsection
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @can('edit-companySetting')
                    <a href="{{route('company-setting.edit',$setting->id)}}" class="primary-text edit-setting" style="position: absolute; top: 5px; right: 5px ;cursor: pointer">
                        <i class="fas fa-edit" style="font-size: 30px"></i>
                    </a>
                    @endcan
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Name
                                </p>
                                <p class="mb-0 primary-text text-uppercase">
                                    {{$setting->company_name}}
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
                                    {{$setting->company_phone}}
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
                                    {{$setting->company_email}}
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
                                    {{$setting->company_address}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Office Start Time
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$setting->office_start_time}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Office End Time
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$setting->office_end_time}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Break Start Time
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$setting->break_start_time}}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3 text-md-center">
                                <p class="mb-0">
                                    <i class="fab fa-gg"></i>
                                    Break End Time
                                </p>
                                <p class="mb-0 primary-text">
                                    {{$setting->break_start_time}}
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
