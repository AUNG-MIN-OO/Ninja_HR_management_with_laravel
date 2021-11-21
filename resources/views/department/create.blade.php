@extends('layouts.app')
@section('title','Add Departments')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('department.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Departments List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('department.store')}}" id="departmentCreate">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label for="department_name">Department Name</label>

                                    <input id="department_name" type="text" class="form-control @error('department_name') is-invalid @enderror" name="department_name" value="{{ old('department_name') }}" required autocomplete="department_name" autofocus>

                                    @error('department_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreDepartment', '#departmentCreate');!!}
    <script>
        $(document).ready(function (){

        })
    </script>
@stop
