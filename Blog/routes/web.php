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

// Trang chu
Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@index');

// Dang nhap
Route::match(['get','post'],'Login', ['as' => 'Login', 'uses' =>'LoginController@Login']);

// Dang ki
Route::match(['get','post'],'Register', ['as' => 'Register', 'uses' =>'LoginController@Register']);
// Dang ki nhan thong bao qua mail
Route::post('/RegistEmail', 'LoginController@sendMail');

// Sau khi dang nhap
Route::group(['middleware' => 'auth' ], function() {
    Route::get('/Logout', 'LoginController@Logout');
});

// Lay bai viet thuoc cat
Route::get('/Category/Travel', 'CatController@getPost');