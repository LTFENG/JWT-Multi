<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// User Authenticate API
// user?token=
Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});

// SignUP
Route::any('signup', 'UserAuthenticateController@signUp');
// SignIN
Route::any('signin', 'UserAuthenticateController@signIn');

// Commercial API
Route::any('commercial/register', 'CommercialsAuthenticateController@register');
Route::any('commercial/login', 'CommercialsAuthenticateController@login');