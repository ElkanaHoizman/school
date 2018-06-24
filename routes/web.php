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



Route::get('/','pagescontroller@index');
Route::get('/school','pagescontroller@school');
Route::get('/Administration','pagescontroller@Administration');
Route::resource('/courses','coursesController');
Route::resource('/studeents','StudeentsController');
Route::resource('/Users','UsersController');
 

Auth::routes();
Route::get('/home', 'HomeController@index');



//Route::post('users', 'Auth\RegisterController@register_me')->name('register_me');
//Route::get('/register', 'pagescontroller@Administration');
//Route::get('/home', 'HomeController@index')->name('home');

