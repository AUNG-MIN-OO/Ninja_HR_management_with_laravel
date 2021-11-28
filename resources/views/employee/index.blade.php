@extends('layouts.app')
@section('title','Employees')
@section('content')
    <div class="d-flex justify-content-center pb-5">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('employee.create')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-plus-circle mr-2"></i>Add new employee </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-dark table-hover Datatable w-100">
                        <thead>
                        <tr>
                            <th class="text-center no-sort"></th>
                            <th class="text-center no-sort">Profile</th>
                            <th class="text-center">Employee Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Role or Designation</th>
                            <th class="text-center no-sort">Is Present</th>
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
                ajax: '/employee/datatable/ssd',
                columns: [
                    { data: 'plus_icon', name: 'plus_icon', class: 'text-center' },
                    { data: 'profile_img', name: 'name', class: 'text-center text-nowrap' },
                    { data: 'employee_id', name: 'employee_id', class: 'text-center' },
                    { data: 'name', name: 'name', class: 'text-center text-nowrap' },
                    { data: 'phone', name: 'phone', class: 'text-center' },
                    { data: 'email', name: 'email', class: 'text-center' },
                    { data: 'department_name', name: 'department_name', class: 'text-center text-nowrap' },
                    { data: 'role_name', name: 'role_name', class: 'text-center text-nowrap' },
                    { data: 'is_present', name: 'is_present', class: 'text-center' },
                    { data: 'action', name: 'action', class: 'text-center' },
                    { data: 'updated_at', name: 'updated_at', class: 'text-center' },
                ],
                order:[
                    [10,"desc"]
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
                            url: `/employee/${id}`,
                            data: { name: "John", location: "Boston" }
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
