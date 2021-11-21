@extends('layouts.app')
@section('title','Departments')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('department.create')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-plus-circle mr-2"></i>Add new department </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-dark table-hover Datatable w-100">
                        <thead>
                        <tr>
                            <th class="text-center no-sort no-search"></th>
                            <th class="text-center">Department Name</th>
                            <th class="text-center no-sort">Action</th>
                            <th class="text-center">Updated_at</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            var table = $('.Datatable').DataTable({
                ajax: '/department/datatable/ssd',
                columns: [
                    { data: 'plus-icon', name: 'plus-icon', class: 'text-center' },
                    { data: 'title', name: 'title', class: 'text-center text-nowrap text-capitalize' },
                    { data: 'action', name: 'action', class: 'text-center text-nowrap' },
                    { data: 'updated_at', name: 'updated_at', class: 'text-center' },
                ],
                order:[
                    [0,"desc"]
                ],
            });

            $(document).on('click', '.delete-btn', function (e){
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure to delete?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            method: "DELETE",
                            url: `/department/${id}`,
                        })
                        .done(function( msg ) {
                            table.ajax.reload();
                        });
                    }
                })
            })
        })
    </script>
@stop
