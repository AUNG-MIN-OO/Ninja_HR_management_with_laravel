<?php

namespace App\Http\Controllers;

use App\CompanySetting;
use App\Http\Requests\UpdateCompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function show($id){
        if(!auth()->user()->can('view-companySetting')){
            abort(403,'Unauthorized Action');
        }
        $setting = CompanySetting::findOrFail($id);
        return view('company_setting.show',compact('setting'));
    }

    public function edit($id){
        if(!auth()->user()->can('edit-companySetting')){
            abort(403,'Unauthorized Action');
        }
        $setting = CompanySetting::findOrFail($id);
        return view('company_setting.edit',compact('setting'));
    }

    public function update(UpdateCompanySetting $request, $id){
        if(!auth()->user()->can('edit-companySetting')){
            abort(403,'Unauthorized Action');
        }
        $setting = CompanySetting::findOrFail($id);
        $setting->company_name = $request->company_name;
        $setting->company_phone = $request->company_phone;
        $setting->company_email = $request->company_email;
        $setting->company_address = $request->company_address;
        $setting->break_start_time = $request->break_start_time;
        $setting->break_end_time = $request->break_end_time;
        $setting->office_start_time = $request->office_start_time;
        $setting->office_end_time = $request->office_end_time;
        $setting->update();

        toast('Company setting is updated!','success');
        return redirect()->route('company-setting.show',$id);
    }
}
