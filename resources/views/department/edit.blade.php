@extends('layouts.app')
@section('title','Edit Departments')
@section('content')
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('department.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Employees List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('department.update',$department->id)}}" id="employeeCreate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">

                                <div class="md-form">
                                    <label for="department_name">Name</label>

                                    <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ $department->title }}" required autocomplete="department_name" autofocus>

                                    @error('department_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="md-form my-0">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-theme mx-0">
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            $('.birthday').daterangepicker({
                "singleDatePicker": true,
                "autoApply":true,
                "maxDate":moment(),
                "showDropdowns": true,
                "locale":{
                    "format":"YYYY-MM-DD"
                }
            });

            $('.date_of_join').daterangepicker({
                "singleDatePicker": true,
                "autoApply":true,
                "showDropdowns": true,
                "locale":{
                    "format":"YYYY-MM-DD"
                }
            });

            $('#profile_img').on('change',function (){
                var file_length = document.getElementById('profile_img').files.length;
                $('.preview_img').html('');
                for (var i = 0; i<file_length; i++){
                    $('.preview_img').append(`<img src="${URL.createObjectURL(event.target.files[i])}"/>`);
                }
            })
        })
    </script>
@stop
