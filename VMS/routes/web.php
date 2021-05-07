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

Route::get('/', function () {      
    $testomonial = testomonial::get();

    return view("welcome",compact('testomonial'));
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/features', function () {
    return view('features');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
