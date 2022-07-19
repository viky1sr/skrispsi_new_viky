<?php

use Illuminate\Support\Facades\Auth;
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


Route::get('/','LadingPageController@index')->name('home');

Auth::routes();

Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function (){
    Route::get('/create','HomeCare\ReservationController@create')->name('create');
});
