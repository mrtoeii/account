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
//Auth
Route::get('/', 'AuthController@index');
Route::post('/checklogin', 'AuthController@checklogin');


//Dashboard
Route::group(['middleware'=>['checkauth']],function(){
    Route::match(['get', 'post'],'/dashboard', 'DashboardController@index');
    Route::get('/list', 'DashboardController@list');
});

