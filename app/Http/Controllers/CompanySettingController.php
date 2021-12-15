<?php

namespace App\Http\Controllers;

use App\CompanySetting;
use Illuminate\Http\Request;

class CompanySettingController extends Controller
{
    public function show($id){
        $setting = CompanySetting::findOrFail($id);
        return view('company_setting.show',compact('setting'));
    }
}
