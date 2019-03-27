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
Route::get('/logout', 'logincontroller@logout');
Route::post('/login', 'logincontroller@loginsession');

Route::group(['middleware'=>['pullback']],function (){
    Route::get('/', 'logincontroller@loginview');
    Route::get('/login', 'logincontroller@loginview');
});

Route::group(['middleware'=>['logcheck','temp']],function () {

    Route::get('/dashboard', 'basicviewcontroller@dashboard')->name('Dashboard');
    Route::get('/upload', 'basicviewcontroller@upload')->name('Upload_source_data');
    Route::post('/upload', 'basicviewcontroller@store');

});
