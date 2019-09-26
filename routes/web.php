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
Route::get('/logout', 'AuthController@logout');


Route::group(['middleware'=>['checkauth']],function(){
    //Dashboard
    Route::match(['get', 'post'],'/dashboard', 'DashboardController@index');

    //Account
    Route::get('/account', 'AccountController@index');
    Route::match(['get', 'post'],'account.insert', 'AccountController@insert');
    Route::match(['get', 'post'],'account.fetch_data', 'AccountController@fetch_data');

    //Profile
    Route::get('/profile', 'ProfileController@index');

    //Users
    Route::get('/users', 'UsersController@index');
});


