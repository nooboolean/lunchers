<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'TopController@index');

Route::group(['middleware' => ['nakazaway.auth']], function(){
  Route::get('logout', 'LogoutController@logout');
});

Route::group(['middleware' => ['redirect.top']], function(){
  Route::get('regist', 'RegistController@index');
  Route::post('regist', [
      'uses' => 'RegistController@create',
      'as' => 'regist.create'
  ]);
  Route::get('login', 'LoginController@index');
  Route::post('login', [
    'uses' => 'LoginController@login',
    'as' => 'login.login'
  ]);
  //Twitter
  Route::get('sns/twitter', 'TwitterController@getAuth');
  Route::get('sns/callback/twitter', 'TwitterController@authCallback');
  Route::get('sns/twitter/regist', 'TwitterController@snsRegist');
  //Google
  Route::get('sns/google', 'GoogleController@getAuth');
  Route::get('sns/callback/google', 'GoogleController@authCallback');

  Route::get('sns/regist', 'SnsRegistController@index');
});