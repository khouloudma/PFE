<?php
use App\testomonial;

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
Route::POST('contactcontroller','ContactController@index');
Route::post('pay','PaymentController@Paywithpaypal')->name('pay');
Route::get('/Status','PaymentController@Status')->name('Status');
Route::get('/cancelled','PaymentController@cancelled')->name('cancelled');


Route::get('/','WelcomeController@index');
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/features', function () {
    return view('features');
});
Route::get('/privacy', function () {
    return view('privacy'); //front not fixedyet
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/visitor', 'HomeController@visitor')->name('visitor');
Route::get('/history', 'HomeController@history')->name('history');
Route::get('/checkin', 'HomeController@checkin')->name('checkin');
Route::POST('/checkinadd','VisitorController@add')->name('visitor.add');
Route::POST('/checkoutsucess','HomeController@checkoutsuccess')->name('visitor.checkout');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');




