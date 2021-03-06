<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::resource("users", "UserController");
Route::resource("students", "StudentController");

Route::group(['prefix' => 'v1'], function(){
    
        Route::post('/register','AuthApiController@register');
        Route::get('/welcome','WelcomeApiController@index');

        Route::group(['middleware'=>['auth:api']], function(){
            Route::get('/user','AuthApiController@index');
        });
});



