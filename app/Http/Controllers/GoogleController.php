<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class GoogleController extends SnsBaseController
{
    //
    public function ExistsSnsUser($provider){
        $user = Socialite::driver($provider)->stateless()->user();
        dd($user);
        return $user;
      }
}
