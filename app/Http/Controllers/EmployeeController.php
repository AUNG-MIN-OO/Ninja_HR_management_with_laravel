<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreEmployee;
use App\Http\Requests\UpdateEmployee;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function index(){
        $ninja = Auth::user();
        return view('employee.index',compact('ninja'));
    }

    public function create(){
        $departments = Department::orderBy('title')->get();
        $roles = Role::all();
        return view('employee.create',compact('departments','roles'));
    }

    public function store(StoreEmployee $request){
        $profile_img_name = null;
        if ($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $profile_img_name = uniqid()."_".time()."_"."profile.".$request->file('profile_img')->getClientOriginalExtension();
            Storage::disk('public')->put('employee/'.$profile_img_name,file_get_contents($profile_img));
        }

        $employee = new User();
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = Hash::make($request->password);
        $employee->address = $request->address;
        $employee->nrc_number = $request->nrc_number;
        $employee->is_present = $request->is_present;
        $employee->birthday = $request->birthday;
        $employee->date_of_join = $request->date_of_join;
        $employee->choices = $request->gender;
        $employee->profile_img = $profile_img_name;
        $employee->department_id = $request->department;

        $employee->save();

        $employee->syncRoles($request->roles);
        toast('New employee is added','success');
        return redirect()->route('employee.index');
    }

    public function ssd(Request $request){
        $employeeData = User::with('department');
        return DataTables::of($employeeData)
            ->filterColumn('department_name',function ($query, $keyword){
                $query->whereHas('department',function ($q1) use($keyword){
                    $q1->where('title','like',"%$keyword%");
                });
            })
            ->editColumn('profile_img',function ($each){
                if ($each->profile_img){
                    return '<img src="'.$each->profilePath().'" class="profile_thumbnail"/>';
                }else{
                    return "";
                }
            })
            ->addColumn('department_name',function ($each){
                return $each->department ? $each->department->title : '-';
            })
            ->addColumn('role_name',function ($each){
                $output= "";
                foreach ($each->roles as $role){
                    $output .= '<span class="badge badge-pill badge-success mr-2">'.$role->name.'</span>';
                }
                return $output;
            })
            ->editColumn('is_present',function ($each){
                if ($each->is_present == 1){
                    return '<span class="badge btn-theme">Present</span>';
                }else{
                    return '<span class="badge badge-danger">Absent</span>';
                }
            })
            ->addColumn('action',function ($each){
                $edit_icon = '<a href="'.route('employee.edit',$each->id).'" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                $show_icon = '<a href="'.route('employee.show',$each->id).'" class="btn btn-info btn-sm mr-2"><i class="fas fa-info"></i></a>';
                $delete_icon = '<a href="#" class="btn btn-danger btn-sm delete-btn"  data-id="'. $each->id .'"><i class="fas fa-trash-alt"></i></a>';
                return '<div>'.$edit_icon.$show_icon.$delete_icon.'</div>';
            })
            ->editColumn('updated_at',function ($each){
                return Carbon::parse($each->updated_at)->format('Y-m-d h:i A');
            })
            ->addColumn('plus_icon',function ($each){
                return null;
            })
            ->rawColumns(['profile_img','is_present','action','role_name'])
            ->make(true);
    }

    public function edit($id){
        $ninja = User::find($id);
        $roles = Role::all();
        $departments = Department::orderBy('title')->get();
        return view('employee.edit',compact('ninja','departments','roles'));
    }

    public function update($id,UpdateEmployee $request){
        $employee = User::findOrFail($id);

        $profile_img_name = $employee->profile_image;
        if ($request->hasFile('profile_img')){
            $profile_img = $request->file('profile_img');
            $profile_img_name = uniqid()."_".time()."_"."profile.".$request->file('profile_img')->getClientOriginalExtension();
            Storage::disk('public')->delete('employee/'.$employee->profile_img);
            Storage::disk('public')->put('employee/'.$profile_img_name,file_get_contents($profile_img));
        }

        if ($request->password != null){
            $request->validate([
                "password"=>"required|min:8|max:12"
            ]);
        }
        $employee->employee_id = $request->employee_id;
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->email = $request->email;
        $employee->password = $request->password? Hash::make($request->password):$employee->password;
        $employee->address = $request->address;
        $employee->nrc_number = $request->nrc_number;
        $employee->is_present = $request->is_present;
        $employee->birthday = $request->birthday;
        $employee->date_of_join = $request->date_of_join;
        $employee->choices = $request->gender;
        $employee->profile_img = $profile_img_name;
        $employee->department_id = $request->department;

        $employee->update();

        $employee->syncRoles($request->roles);
        toast('Employee info is updated','success');
        return redirect()->route('employee.index');
    }

    public function show($id){
        $ninja = User::findOrFail($id);
        $roles = $ninja->roles->pluck('name');
        return view('employee.show',compact('ninja','roles'));
    }

    public function destroy($id){
        $employee = User::findOrFail($id);
        $employee->delete();

        return 'success';
    }
}
