<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Translation\Dumper\DumperInterface;

class DashboardController extends Controller
{
    public function index() {
        if(Auth::user()->hasRole('user')) {
            return view('userdash');
        }
        if(Auth::user()->hasRole('blogwriters')) {
            return view('blogwritterdash');
        }
        if(Auth::user()->hasRole('admin')) {
            return view('dashboard');
        }
    }

    public function myprofile() {
        return view('myprofile');
    }    


    public function postcreate() {
        return view('postcreate');
    }      
}
