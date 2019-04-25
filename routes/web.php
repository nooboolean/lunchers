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

//Twitter
Route::get('oauth/twitter', 'OAuthLoginController@getAuth');
Route::get('oauth/callback/twitter', 'OAuthLoginController@authCallback');
//Facebook
Route::get('oauth/facebook', 'OAuthLoginController@getAuth');
Route::get('oauth/callback/facebook', 'OAuthLoginController@authCallback');
//Google
Route::get('oauth/google', 'OAuthLoginController@getAuth');
Route::get('oauth/callback/google', 'OAuthLoginController@authCallback');

// //Twitter
// Route::get('oauth/twitter', 'OAuthLoginController@getAuth');
// Route::get('oauth/callback/twitter', 'OAuthLoginController@authCallback');

// //Facebook
// Route::get('oauth/facebook', 'OAuthLoginController@getAuth');
// Route::get('oauth/callback/facebook', 'OAuthLoginController@authCallback');