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

Auth::routes();

Route::group( ['middleware' => 'auth'], function()
{

    Route::resource('/', 'User\UserController');
    Route::get('/user/create','User\UserController@create');
    Route::get('/home', 'HomeController@index')->name('home');
});

