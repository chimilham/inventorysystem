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

Route::get('/', function () {   
     // echo "test";
	return view('welcome');
});
Route::get('/php', function () {   
	return view('PDF');
	//echo phpinfo();
});

//Route::get('/accountinfo','\App\Http\Controllers\PaymentDetailsViewContoller@accountinfo');
Route::post('/cancel','\App\Http\Controllers\PaymentDetailsViewContoller@cancel');
Route::post('/failure','\App\Http\Controllers\PaymentDetailsViewContoller@show'); 
Route::post('/uemail','\App\Http\Controllers\PaymentDetailsViewContoller@edit');

Route::resource('/payment','\App\Http\Controllers\PaymentDetailsViewContoller');
Route::post('/success','\App\Http\Controllers\PaymentController@create');
Route::resource('paynow','\App\Http\Controllers\PaymentController');


//Route::get('pdf/{id}','\App\Http\Controllers\PaymentController@pdf');
Route::get('pdf','\App\Http\Controllers\PaymentController@test1');
Route::get('receiptconfirmed/{id}','\App\Http\Controllers\PaymentController@receiptconfirmed');

Route::post('/Emailupdate/{id}','\App\Http\Controllers\PaymentDetailsViewContoller@update');
?>
