<?php

namespace App\Http\Controllers;

use Socialite;

class SnsBaseController extends Controller
{
   /**
   * OAuth認証 リクエスト
   * @return mixed
   */
  public function getAuth() {
    $provider = $this->getProviderName();
    return Socialite::driver($provider)->redirect();
  }

   /**
   * OAuth認証　コールバック
   */
  public function authCallback() {
    $provider    = $this->getProviderName();
    $exists_user = $this->ExistsSnsUser($provider);
    if (!$exists_user){
      //なんとかtwitterの情報をリダイレクト先に送りたい
      
      return redirect('sns/regist');
    }
    $this->snsLogin($provider);
  }

  private function getProviderName(){
    return basename(parse_url($this->getUrl(), PHP_URL_PATH));
  }
  private function getUrl() {
    return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  }
}
