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
Route::post('/uploadCSV', 'DataController@uploadCSV');
Route::get('/csv-upload-page', 'DataController@csvUploadPage');

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/complete_invoice/{invoice_id}', 'DataController@complete_invoice');
Route::get('qr-code/examples/url', function () 
{
    return  QRCode::url('http://localhost/complete_invoice/60')
                  ->setSize(8)
                  ->setMargin(2)
                  ->svg();
});    

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

        //upload csv file
        Route::post('/csv_reader', 'DataController@csv_reader');

    });
});

Route::get('/test', 'BaseController@test');


Route::get('/confirm-invoice/{invoice_id}', 'BaseController@confirmInvoice');
Route::get('/print-invoice/{invoice_id}', 'BaseController@printInvoice');

Route::get('/service', 'BaseController@service');

Route::get('/help', 'BaseController@help');
Route::get('/query', 'BaseController@query');
Route::get('/about-us', 'BaseController@aboutUs');

// auth
Auth::routes();
// sign out
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
