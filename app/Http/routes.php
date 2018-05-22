<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', 'HomeController@index');
Route::get('now', function(){
    return date("Y-m-d H:i:s");
});
Route::post('/home', 'HomeController@indexPost');
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'CustomerController@index');
    Route::get('/add', 'CustomerController@add');
    Route::post('/save', 'CustomerController@save');
    Route::post('/delete', 'CustomerController@delete');
    Route::post('/isexistphone', 'CustomerController@isexistphone');
    Route::get('/carindex', 'CarController@index');
});


//Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
//    Route::get('/', 'HomeController@index');
//});
//Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
//    Route::get('/', 'HomeController@index');
//});
