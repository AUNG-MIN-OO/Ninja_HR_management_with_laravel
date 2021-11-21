@extends('layouts.app')
@section('title','Edit Roles')
@section('content')
    <div class="row justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('role.index')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-bars mr-2"></i>Roles List </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{route('role.update',$role->id)}}" id="roleUpdate" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">

                                <div class="md-form">
                                    <label for="role_name">Name</label>

                                    <input id="role_name" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ $role->name }}" required autocomplete="role_name" autofocus>

                                    @error('role_name')
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
    {!! JsValidator::formRequest('App\Http\Requests\UpdateRole', '#roleUpdate');!!}
    <script>

    </script>
@stop
