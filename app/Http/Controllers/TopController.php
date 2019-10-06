<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
class TopController extends Controller
{
    //
    public function index(){
        return view('top');
    }
}
