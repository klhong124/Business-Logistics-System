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

// Route::get('/', function () {
//     return view('pages/dashboard');
// });

Route::get('/', 'DataController@index');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');

// auth
Auth::routes();

// sign out
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
