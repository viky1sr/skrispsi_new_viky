<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'master-spa'], function (){
    Route::post('/store','Api\HomeCare\MasterSpaController@store');
    Route::delete('/delete/{id}','Api\HomeCare\MasterSpaController@destroy');
    Route::get('/dataTables','Api\HomeCare\MasterSpaController@dataTables');
});

Route::group(['prefix' => 'v1'], function() {
    Route::get('/pending','Api\Datatable\ListBookingApi@pending')->name('pending');
    Route::get('/on-progress','Api\Datatable\ListBookingApi@onProgress')->name('on-progress');
    Route::get('/success','Api\Datatable\ListBookingApi@success')->name('success');
    Route::get('/reject','Api\Datatable\ListBookingApi@reject')->name('reject');
});

Route::group(['prefix' => 'general', 'as' => 'general.'], function () {
    Route::get('/list/homecare','Api\General\MasterController@masterHomeCare')->name('listhomecare');
    Route::get('/list/babyspa','Api\General\MasterController@masterBabySpa')->name('listbabyspa');
});
