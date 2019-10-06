<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

use App\Models\TwitterUser;

class TwitterController extends SnsBaseController
{
    public $provider = "twitter";
    
    public function ExistsSnsUser($provider){
        $user_info = $this->getProviderUserInfo($provider);
        dd($user_info);
        if(!TwitterUser::ExistsConnectedSnsUser($user_info->id)){
          return false;
        }
        return true;
      }
    public function setSnsUser($provider){
      $user_info = $this->getProviderUserInfo($provider);
      TwitterUser::setUser($user_info);
    }
    public function getProviderUserInfo($provider){
      return Socialite::driver($provider)->user();
      // return Socialite::driver($provider)->userFromTokenAndSecret(env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
    }
    
    public function snsLogin($provider){
      $user_info = $this->getProviderUserInfo($provider);
      $user = TwitterUser::getUser($user_info->id);
      Session::put($user->getAttributes());
      Session::save();
      return redirect('/');
    }
    
}
