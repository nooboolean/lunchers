<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    //
    public function logout(){
        if(Session::has('id')){
            Session::flush();
        }
        return redirect('/login');
    }
}
