<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\RegistForm;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\LoginController;

class RegistController extends Controller
{
    //
    public function index(FormBuilder $formBuilder){
        $form = $formBuilder->create(RegistForm::class, [
            'method' => 'POST',
            'url' => route('regist.create')
        ]);
        return view('regist', compact('form'));
    }

    public function create(Request $request){
        User::set_all($request);
        LoginController::login($request);
        return redirect('/');
    }
}
