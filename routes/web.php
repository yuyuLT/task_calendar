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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//認証していない場合遷移不可

Route::group(['middleware' => ['auth']], function() {
    Route::get('/current{ym}', 'CalendarController@index')->name('current');
    Route::get('/select', 'CalendarController@show')->name('select');
    Route::post('/update{ym}', 'CalendarController@update')->name('update');
});