<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;

class OAuthLoginController extends Controller
{
   /**
   * OAuth認証 リクエスト
   * @return mixed
   */
  public function getAuth() {
    $provider = basename(parse_url($this->getUrl(), PHP_URL_PATH));
    return Socialite::driver($provider)->redirect();
  }

   /**
   * OAuth認証　コールバック
   */
  public function authCallback(Request $request) {
    $provider = basename(parse_url($this->getUrl(), PHP_URL_PATH));
    $user = $this->getProviderUser($provider);
    
    // デバッグ（デモンストレーション用）
    echo'<pre>'; print_r($user); echo'<pre>'; exit;
  }

  // user情報取得関数
  private function getProviderUser($provider){
    switch($provider){
      case "twitter":
      $user = Socialite::driver($provider)->userFromTokenAndSecret(env('TWITTER_ACCESS_TOKEN'), env('TWITTER_ACCESS_TOKEN_SECRET'));
      break;
      case "google":
      $user = Socialite::driver($provider)->stateless()->user();
      break;
      default:
      echo "未対応なプロバイダーです";
      break;
    };
    return $user;
  }

  private function getUrl() {
    return (empty($_SERVER["HTTPS"]) ? "http://" : "https://") . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
  }
}
