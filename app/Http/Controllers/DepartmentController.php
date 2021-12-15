<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\UpdateDepartment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class DepartmentController extends Controller
{
    public function index(){
        if(auth()->user()->can('view-department')){
            $ninja = Auth::user();
            $department = Department::all();
            return view('department.index',compact('department','ninja'));
        }else{
            abort(403,'Unauthorized Action');
        }
    }

    public function create(){
        if(!auth()->user()->can('create-department')){
            abort(403,'Unauthorized Action');
        }
        return view('department.create');
    }

    public function store(StoreDepartment $request){
        $department = new Department();
        $department->title = $request->department_name;

        $department->save();
        toast('New department is created','success');
        return redirect()->route('department.index');
    }

    public function ssd(Request $request){
        $department = Department::query();
        return DataTables::of($department)

            ->addColumn('action',function ($each){
                $edit_icon = '';
                $delete_icon = '';
                if(auth()->user()->can('edit-department')){
                    $edit_icon = '<a href="'.route('department.edit',$each->id).'" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                }

                if(auth()->user()->can('delete-department')){
                    $delete_icon = '<a href="#" class="btn btn-danger btn-sm delete-btn"  data-id="'. $each->id .'"><i class="fas fa-trash-alt"></i></a>';
                }
                return '<div>'.$edit_icon.$delete_icon.'</div>';
            })
            ->addColumn('plus-icon',function ($each){
                return null;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function edit($id){
        if(!auth()->user()->can('edit-department')){
            abort(403,'Unauthorized Action');
        }
        $department = Department::find($id);
        return view('department.edit',compact('department'));
    }

    public function update($id,UpdateDepartment $request){
        $department = Department::findOrFail($id);

        $department->title = $request->department_name;

        $department->update();
        toast('Department info is updated','success');
        return redirect()->route('department.index');
    }

    public function destroy($id){
        if(!auth()->user()->can('delete-department')){
            abort(403,'Unauthorized Action');
        }
        $department = Department::findOrFail($id);
        $department->delete();

        return 'success';
    }
}
