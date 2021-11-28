<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\StoreDepartment;
use App\Http\Requests\StoreRole;
use App\Http\Requests\UpdateDepartment;
use App\Http\Requests\UpdateRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index(){
        $ninja = Auth::user();
        $role = Role::all();
        return view('role.index',compact('role','ninja'));
    }

    public function create(){
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function store(StoreRole $request){
        $role = new Role();
        $role->name = $request->role_name;
        $role->save();

        $role->givePermissionTo($request->permissions);
        toast('New role is created','success');
        return redirect()->route('role.index');
    }

    public function ssd(Request $request){
        $role = Role::query();
        return DataTables::of($role)

            ->addColumn('permission',function ($each){
                $permission_output = '';
                foreach ($each->permissions->pluck('name') as $p){
                    $permission_output .= '<span class="badge badge-pill badge-success px-2 py-1 mr-2">'.$p.'</span>';
                }
                return $permission_output;
            })
            ->addColumn('action',function ($each){
                $edit_icon = '<a href="'.route('role.edit',$each->id).'" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                $delete_icon = '<a href="#" class="btn btn-danger btn-sm delete-btn"  data-id="'. $each->id .'"><i class="fas fa-trash-alt"></i></a>';
                return '<div>'.$edit_icon.$delete_icon.'</div>';
            })
            ->addColumn('plus-icon',function ($each){
                return null;
            })
            ->rawColumns(['action','permission'])
            ->make(true);
    }

    public function edit($id){
        $role = Role::find($id);
        $permissions = Permission::all();
        return view('role.edit',compact('role','permissions'));
    }

    public function update($id,UpdateRole $request){
        $role = Role::findOrFail($id);

        $role->name = $request->role_name;

        $role->update();
        $role->revokePermissionTo($role->permissions->pluck('name')->toArray());
        $role->givePermissionTo($request->permissions);

        toast('Role info is updated','success');
        return redirect()->route('role.index');
    }

    public function destroy($id){
        $role = Role::findOrFail($id);
        $role->delete();

        return 'success';
    }
}
