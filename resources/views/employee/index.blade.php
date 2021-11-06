@extends('layouts.app')
@section('title','Employees')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="">
                <a href="{{route('employee.create')}}" class="btn btn-theme btn-sm mx-0" style="font-size: 13px"><i class="fas fa-plus-circle mr-2"></i>Add new employee </a>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped table-dark table-hover employee_table">
                        <thead>
                        <tr>
                            <th class="text-center">Employee Id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Is Present</th>
                            <th class="text-center">NRC</th>
                            <th class="text-center">Address</th>
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
            $('.employee_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/employee/datatable/ssd',
                columns: [
                    { data: 'employee_id', name: 'employee_id', class: 'text-center' },
                    { data: 'name', name: 'name', class: 'text-center' },
                    { data: 'phone', name: 'phone', class: 'text-center' },
                    { data: 'email', name: 'email', class: 'text-center' },
                    { data: 'department_name', name: 'department_name', class: 'text-center text-nowrap' },
                    { data: 'is_present', name: 'is_present', class: 'text-center' },
                    { data: 'nrc_number', name: 'nrc_number', class: 'text-center' },
                    { data: 'address', name: 'address', class: 'text-center' },
                ]
            });
        })
    </script>
@stop
