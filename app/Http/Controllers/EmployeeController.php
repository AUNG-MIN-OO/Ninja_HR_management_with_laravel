<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreEmployee;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index(){
        return view('employee.index');
    }

    public function create(){
        $departments = Department::orderBy('title')->get();
        return view('employee.create',compact('departments'));
    }

    public function store(StoreEmployee $request){
        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->address = $request->address;
        $employee->nrc_number = $request->nrc_number;
        $employee->is_present = $request->is_present;
        $employee->birthday = $request->birthday;
        $employee->date_of_join = $request->date_of_join;
        $employee->choices = $request->gender;
        $employee->department_id = $request->department_id;

        $employee->save();
        toast('New employee is added','success');
        return redirect()->route('employee.index');
    }

    public function ssd(Request $request){
        $employeeData = User::with('department');
        return DataTables::of($employeeData)
            ->addColumn('department_name',function ($each){
                return $each->department ? $each->department->title : '-';
            })
            ->editColumn('is_present',function ($each){
                if ($each->is_present == 1){
                    return '<span class="badge badge-pill badge-success">Present</span>';
                }else{
                    return '<span class="badge badge-pill badge-danger">Absent</span>';
                }
            })
            ->rawColumns(['is_present'])
            ->make(true);
    }
}
