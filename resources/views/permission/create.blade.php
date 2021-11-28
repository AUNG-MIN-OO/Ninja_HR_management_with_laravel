@extends('layouts.app')
@section('title','Add Permissions')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('permission.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Permissions List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('permission.store')}}" id="permissionCreate">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label for="permission_name">Permission Name</label>

                                    <input id="permission_name" type="text" class="form-control @error('permission_name') is-invalid @enderror" name="permission_name" value="{{ old('permission_name') }}" required autocomplete="permission_name" autofocus>

                                    @error('permission_name')
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
    {!! JsValidator::formRequest('App\Http\Requests\StorePermission', '#permissionCreate');!!}
    <script>
        $(document).ready(function (){

        })
    </script>
@stop
