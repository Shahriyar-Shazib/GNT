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

Route::get('/as', function () {
    return view('welcome');
});
Route::get('/user-list','YAjraDataTableController@showtable')->name('showtable');
Route::get('/user-list/delete','YAjraDataTableController@deleteUser')->name('deleteuser');
Route::get('/user-list/edit/{key}','YAjraDataTableController@editUser')->name('deleteuser');
Route::get('/user-list/find','YAjraDataTableController@findUser')->name('findeuser');