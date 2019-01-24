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


Route::group(['middleware' => 'auth'], function () {
	// main activities
    Route::get('/orders', 'DataController@orders');
    Route::get('/order-details', 'DataController@details');

    // Account
    Route::get('/profile', 'DataController@profile');
    Route::get('/change-password', 'DataController@changePassword');
    Route::post('/reset-password', 'DataController@resetPassword');
    Route::get('/retailer/{id}', 'DataController@viewRetailer');
});





// auth
Auth::routes();
// sign out
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
