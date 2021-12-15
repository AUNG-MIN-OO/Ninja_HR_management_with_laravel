<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermission;
use App\Http\Requests\UpdatePermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    public function index(){
        if(!auth()->user()->can('view-permission')){
            abort(403,'Unauthorized Action');
        }
        $ninja = Auth::user();
        $permission = Permission::all();
        return view('permission.index',compact('permission','ninja'));
    }

    public function create(){
        if(!auth()->user()->can('create-permission')){
            abort(403,'Unauthorized Action');
        }
        return view('permission.create');
    }

    public function store(StorePermission $request){
        $permission = new Permission();
        $permission->name = $request->permission_name;

        $permission->save();
        toast('New permission is created','success');
        return redirect()->route('permission.index');
    }

    public function ssd(Request $request){
        $permission = Permission::query();
        return DataTables::of($permission)

            ->addColumn('action',function ($each){

                $edit_icon = '';
                $delete_icon = '';
                if(auth()->user()->can('edit-permission')){
                    $edit_icon = '<a href="'.route('permission.edit',$each->id).'" class="btn btn-warning btn-sm mr-2"><i class="fas fa-edit"></i></a>';
                }

                if(auth()->user()->can('delete-permission')){
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
        if(!auth()->user()->can('edit-permission')){
            abort(403,'Unauthorized Action');
        }
        $permission = Permission::find($id);
        return view('permission.edit',compact('permission'));
    }

    public function update($id,UpdatePermission $request){
        $permission = Permission::findOrFail($id);

        $permission->name = $request->permission_name;

        $permission->update();
        toast('Permission info is updated','success');
        return redirect()->route('permission.index');
    }

    public function destroy($id){
        if(!auth()->user()->can('delete-permission')){
            abort(403,'Unauthorized Action');
        }
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return 'success';
    }
}
