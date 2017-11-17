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

Route::group(['middleware' => 'guest'], function () {
    
    Route::get('/register',['as'=>'show_register','uses'=>'HomeController@showRegister']);
    Route::post('/register',['as'=>'do_register','uses'=>'HomeController@doRegister']);

    Route::get('/login',['as'=>'show_login','uses'=>'HomeController@showLogin']);
    Route::post('/login',['as'=>'do_login','uses'=>'HomeController@doLogin']);


});
Route::group(['middleware'=>'login'],function (){
    Route::resource('task','TaskController');
    Route::get('/logout',['as'=>'logout','uses'=>'HomeController@logout']);
    Route::get('/task/{task}/delete',['as'=>'task.delete','uses'=>'TaskController@delete']);
});

Route::get('/create', function () {
    return view('todo.create');
});

Route::get('/list', function () {
    return view('todo.list');
});

