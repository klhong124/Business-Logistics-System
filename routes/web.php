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
    Route::group(['prefix' => 'admin'], function(){
    	// main activities
        Route::get('/processing-orders', 'DataController@processing');
        Route::get('/orders', 'DataController@orders');
        Route::post('/order-post', 'DataController@orderPost');
        Route::get('/order-details/{invoice_id}', 'DataController@details');
        Route::get('/confirm-order/{invoice_id}', 'DataController@confirmOrder');
        Route::get('/query', 'DataController@query');

        // Account
        Route::get('/profile', 'DataController@profile');
        Route::post('change-profile', 'DataController@changeProfile');
        Route::get('/change-password', 'DataController@changePassword');
        Route::post('/reset-password', 'DataController@resetPassword');
        Route::get('/retailer/{id}', 'DataController@viewRetailer');
        Route::post('/post-retailer-info', 'DataController@postRetailerInfo');
    });
});

Route::get('/test', 'BaseController@test');


Route::get('/service', 'BaseController@service');

Route::get('/help', 'BaseController@help');
Route::get('/query', 'BaseController@query');
Route::get('/about-us', 'BaseController@aboutUs');

// auth
Auth::routes();
// sign out
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
