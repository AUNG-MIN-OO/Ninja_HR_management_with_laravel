<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function home(){
        $ninja = Auth::user();
        return view('home',compact('ninja'));
    }
}
