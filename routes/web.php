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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');


Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/admin/user/{user}/menu', 'AdminUserControler@menu');
Route::get('/admin/option/create/{padre}', 'OptionMenuController@create');
Route::post('/admin/user/menu', 'AdminUserControler@menuStore');
Route::resource('/admin/user',"AdminUserControler");
Route::resource('/admin/option',"OptionMenuController");
