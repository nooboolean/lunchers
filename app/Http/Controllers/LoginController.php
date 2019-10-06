<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Kris\LaravelFormBuilder\FormBuilder;
use App\Forms\LoginForm;
use Illuminate\Auth\AuthManager;

class LoginController extends Controller
{
    public function index(FormBuilder $formBuilder){
        $form = $formBuilder->create(LoginForm::class, [
            'method' => 'POST',
            'url' => route('login.login')
        ]);
        return view('login', compact('form'));
    }

    public static function login(Request $request){
        $request_email = $request->email;
        $request_pass = $request->password;
        $user = User::get_all($request_email);
        if(!$user){
            $login_err = "ご指定のメールアドレスのユーザーは存在しません";
            return redirect('/login');
        }
        if(!password_verify($request_pass, $user->pass_hash)){
            $login_err = "パスワードが正しくありません";
            return redirect('/login');
        }
        
        Session::put($user->getAttributes());
        Session::save();
        return redirect('/');
    }
}
