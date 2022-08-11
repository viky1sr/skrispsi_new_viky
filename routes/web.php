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

Route::get('/home','DashboardController@index')->name('to_home');

Route::group(['prefix' => 'reservation', 'as' => 'reservation.'], function (){
    Route::get('/create','HomeCare\ReservationController@create')->name('create');
});

Route::group(['middleware' => 'role:admin'], function(){
    Route::get('/vikyganteng', function (){
        \Illuminate\Support\Facades\Artisan::call('route:cache');
        \Illuminate\Support\Facades\Artisan::call('optimize');
        \Illuminate\Support\Facades\Artisan::call('algorithm:genetic');
        $data = rand(100,1000);
        return '
        <h1 style="text-align: center">viky memang ganteng 😂😂🙏, sudah running yaaa</h1>
        <p style="text-align: center"><a href="/">back to home</a></p>
        '.$data;
    });
});

Route::group(['prefix' => 'resevation','as' => 'resevation.'],function () {
    Route::get('/','HomeCare\ReservationController@index')->name('index');
    Route::get('/datatable','HomeCare\ReservationController@dataTable')->name('datatable');
    Route::get('/create','HomeCare\ReservationController@create')->name('create');
    Route::post('/create','HomeCare\ReservationController@store')->name('store');
    Route::get('/edit/{id}','HomeCare\ReservationController@edit')->name('edit');
    Route::post('/edit/{id}','HomeCare\ReservationController@update')->name('update');
    Route::get('/detail/{id}','HomeCare\ReservationController@show')->name('show');
    Route::delete('/delete/{id}','HomeCare\ReservationController@destoy')->name('delete');
});


Route::group(['prefix' => 'master-data','as' => 'master-data.'], function(){
    Route::group(['prefix' => 'baby-spa', 'as' => 'baby-spa.'], function (){
        Route::get('/','HomeCare\MasterSpaController@index')->name('index');
        Route::get('/datatable','HomeCare\MasterSpaController@dataTable')->name('datatable');
        Route::match(['get','post'],'/create','HomeCare\MasterSpaController@store')->name('create');
        Route::match(['get','post'],'/edit','HomeCare\MasterSpaController@update')->name('edit');
        Route::get('/show','HomeCare\MasterSpaController@show')->name('show');
        Route::delete('/delete','HomeCare\MasterSpaController@destroy')->name('delete');
    });

    Route::group(['prefix' => 'home-care', 'as' => 'home-care.'], function (){
        Route::get('/','HomeCare\MasterHomeCareController@index')->name('index');
        Route::get('/datatable','HomeCare\MasterHomeCareController@dataTable')->name('datatable');
        Route::match(['get','post'],'/create','HomeCare\MasterHomeCareController@store')->name('create');
        Route::match(['get','post'],'/edit','HomeCare\MasterHomeCareController@update')->name('edit');
        Route::get('/show','HomeCare\MasterHomeCareController@show')->name('show');
        Route::delete('/delete','HomeCare\MasterHomeCareController@destroy')->name('delete');
    });
});

Route::group(['prefix' => 'payment', 'as' => 'payment.'], function() {
    Route::get('/','HomeCare\PaymentController@index')->name('index');
});
