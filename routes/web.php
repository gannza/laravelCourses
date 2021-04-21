<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//sendMail
Route::get('/send-mail', 'ContactController@sendMail');
Route::get('/send-mail-with-markdown', 'ContactController@sendMailWithMarkDown');

Route::get('/redirect', 'Auth\LoginController@redirectToProvider');

Route::get('/google/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/collection', 'CollectionController@rejectInactiveUser');

Route::get('/sendSimpleSms', 'CustumerApi@sendSimpleSms');
Route::get('/guzzleSendSimpleSms', 'CustumerApi@guzzleSendSimpleSms');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
