@extends('layouts.app')
@section('title','Add Roles')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('role.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Roles List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('role.store')}}" id="roleCreate">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="md-form">
                                    <label for="role_name">Role Name</label>

                                    <input id="role_name" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ old('role_name') }}" required autocomplete="role_name" autofocus>

                                    @error('role_name')
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreRole', '#roleCreate');!!}
    <script>
        $(document).ready(function (){

        })
    </script>
@stop
