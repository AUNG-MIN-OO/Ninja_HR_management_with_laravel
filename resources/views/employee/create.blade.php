@extends('layouts.app')
@section('title','Add Employees')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('employee.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Employees List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('employee.store')}}" id="employeeCreate" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label for="employee_id">Employee Id</label>

                                    <input id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autocomplete="employee_id" autofocus>

                                    @error('employee_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="name">Name</label>

                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

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
                                    <label for="email">Email</label>

                                    <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="password">Password</label>

                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="nrc_number">NRC Number</label>

                                    <input id="nrc_number" type="text" class="form-control @error('nrc_number') is-invalid @enderror" name="nrc_number" value="{{ old('nrc_number') }}" required autocomplete="nrc_number" autofocus>

                                    @error('nrc_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">

                                    <label for="address">Address</label>
                                    <textarea id="address" class="md-textarea form-control @error('address') is-invalid @enderror" rows="3" name="address" required autocomplete="address">{{ old('address') }}</textarea>

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label for="birthday">Birthday</label>

                                    <input id="birthday" type="text" class="form-control @error('birthday') is-invalid @enderror birthday" name="birthday" value="{{ old('birthday') }}" required autocomplete="birthday" autofocus>

                                    @error('birthday')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <label for="date_of_join">Date of join</label>

                                    <input id="date_of_join" type="text" class="form-control @error('date_of_join') is-invalid @enderror date_of_join" name="date_of_join" value="{{ old('date_of_join') }}" required autocomplete="date_of_join" autofocus>

                                    @error('date_of_join')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <select name="gender" id="gender" class="browser-default custom-select my-2">
                                        <option value="">Choose gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <select name="department" id="department" class="browser-default custom-select " >
                                        <option value="">Choose Department</option>
                                        @foreach($departments as $d)
                                            <option value="{{$d->id}}">{{$d->title}}</option>
                                        @endforeach
                                    </select>

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="md-form">
                                    <select name="is_present" id="is_present" class="browser-default custom-select mt-md-4" >
                                        <option value="">Choose Present or Not</option>
                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>

                                    @error('is_present')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile_img">Profile Image</label>

                                    <input id="profile_img" type="file" class="form-control p-1 @error('profile_img') is-invalid @enderror" name="profile_img" value="{{ old('profile_img') }}" required autocomplete="profile_img" autofocus>

                                    @error('profile_img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <div class="preview_img my-4">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="md-form my-0">
                            <div class="text-right">
                                <button type="submit" class="btn btn-theme mx-0">
                                    Add Now
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {!! JsValidator::formRequest('App\Http\Requests\StoreEmployee', '#employeeCreate');!!}
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
