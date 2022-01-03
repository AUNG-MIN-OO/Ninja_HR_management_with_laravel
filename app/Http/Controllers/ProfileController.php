<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public  function profile(){
        if(!auth()->user()->can('view-profile')){
            abort(403,'Unauthorized Action');
        }
        $ninja = Auth::user();
        $biometric = DB::table('web_authn_credentials')->where('user_id',$ninja->id)->get();
        return view('profile.profile',compact('ninja','biometric'));
    }

    public function biometricData(){
        $ninja = Auth::user();
        $biometric = DB::table('web_authn_credentials')->where('user_id',$ninja->id)->get();
        return view('components.biometric_data',compact('ninja','biometric'))->render();
    }
}
