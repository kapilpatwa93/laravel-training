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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register',['as'=>'show_register','uses'=>'HomeController@showRegister']);
Route::post('/register',['as'=>'do_register','uses'=>'HomeController@doRegister']);


Route::get('/login',['as'=>'show_login','uses'=>'HomeController@showLogin']);
Route::post('/login',['as'=>'do_login','uses'=>'HomeController@doLogin']);