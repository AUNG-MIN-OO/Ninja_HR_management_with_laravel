@extends('layouts.app')
@section('title','Edit Employees')
@section('style')
    <style>
        .applyBtn{
            background-color: var(--primary-color)!important;
        }

        .cancelBtn{
            background-color: red!important;
        }
    </style>
@endsection
@section('content')
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('company-setting.show',$id=1)}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Company Setting</a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{route('company-setting.update',1)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Name
                                    </p>
                                    <input type="text" value="{{$setting->company_name}}" class="form-control" name="company_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Phone
                                    </p>
                                    <input type="text" value="{{$setting->company_phone}}" class="form-control" name="company_phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Email
                                    </p>
                                    <input type="text" value="{{$setting->company_email}}" class="form-control" name="company_email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Address
                                    </p>
                                    <input type="text" value="{{$setting->company_address}}" class="form-control" name="company_address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Office Start Time
                                    </p>
                                    <input type="text" value="{{$setting->office_start_time}}" class="form-control time" name="office_start_time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Office End Time
                                    </p>
                                    <input type="text" value="{{$setting->office_end_time}}" class="form-control time" name="office_end_time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Break Start Time
                                    </p>
                                    <input type="text" value="{{$setting->break_start_time}}" class="form-control time" name="break_start_time">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3 text-md-left">
                                    <p class="mb-2">
                                        <i class="fab fa-gg"></i>
                                        Break End Time
                                    </p>
                                    <input type="text" value="{{$setting->break_end_time}}" class="form-control time" name="break_end_time">
                                </div>
                            </div>
                        </div>
                        <button class="btn primary-background text-white float-right">Update Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee', '#employeeCreate');!!}
    <script>
        $(document).ready(function (){
            $('.time').daterangepicker({
                "singleDatePicker": true,
                "timePicker": true,
                "autoApply": true,
                "timePicker24Hour": true,
                "locale":{
                    "format":"HH:mm:ss"
                }
            }).on('show.daterangepicker',function (ev, picker){
                $('.calendar-table').hide();
            });
        })
    </script>
@stop
