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
Route::get('/services','WelcomeController@services');
Route::POST('contactcontroller','ContactController@index');
Route::post('pay','PaymentController@Paywithpaypal')->name('pay');
Route::get('/cancelled','PaymentController@cancelled')->name('cancelled');

Route::get('/features','WelcomeController@features');
Route::get('/','WelcomeController@index');
Route::get('/contact', 'WelcomeController@contact'); // tha3tly lpage bch n3awdha


Route::get('/privacy','WelcomeController@privacy');
Auth::routes();
//fullcalender routes//
Route::get('/full-calender','HomeController@calender');
Route::post('store','EventController@store')->name('eventStore');
Route::get('index','EventController@index')->name('allEvent');
Route::get('Service/remove/{id}','EventController@destroy');

//end fullcalender//
//start pre-appointment//
Route::get('/pre_appointment','HomeController@pre_appointment');
Route::post('/appointment','HomeController@appointmentAdd')->name('/appointment');

//end pre-appointment//

Route::get('close','HomeController@close')->name('close');


Route::post('/remove_visitor/{id}','HomeController@removeVisitor');
Route::post('/remove_user/{id}','HomeController@removeUser');
Route::get('/Status','PaymentController@Status')->name('Status');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::get('/visitor', 'HomeController@visitor')->name('visitor');
Route::get('/history', 'HomeController@history')->name('history');
Route::get('/checkin', 'HomeController@checkin')->name('checkin');
Route::POST('/checkinadd','VisitorController@add')->name('visitor.add');
Route::POST('/visitor_edit/{id}','VisitorController@edit')->name('visitor.edit');
Route::POST('/visitor_add','VisitorController@add_visitor')->name('visitor.addManually');
Route::POST('/parametrage','HomeController@parametrage')->name('parametrage');
Route::POST('/checkoutsucess','HomeController@checkoutsuccess')->name('visitor.checkout');
Route::get('/checkout', 'HomeController@checkout')->name('checkout');
Route::post('/feedback','VisitorController@feedback');
Route::get('/forms','HomeController@forms');

Route::get('/search-record','HomeController@search');
Route::get('/search-recordvisitor','HomeController@searchvisitor');
Route::POST('/ServiceAdd','HomeController@ServiceAdd')->name('/ServiceAdd');
Route::POST('/ServiceConfigure','ServiceController@ServiceConfigure')->name('ServiceConfigure');
Route::post('/remove_department/{id}','ServiceController@DeleteDepartment');
Route::get('/evacuation','HomeController@evacuation');
Route::get('/pre_appointment_checkin','HomeController@pre_appointment_checkin');
Route::POST('/pre_appointment_checkin_add','HomeController@pre_appointment_checkin_add');
Route::POST('/checkoutsuccess2','HomeController@checkoutsuccess2');
?>

