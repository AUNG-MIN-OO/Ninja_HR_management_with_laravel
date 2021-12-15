<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public  function profile(){
        if(!auth()->user()->can('view-profile')){
            abort(403,'Unauthorized Action');
        }
        $ninja = Auth::user();
        return view('profile.profile',compact('ninja'));
    }
}
