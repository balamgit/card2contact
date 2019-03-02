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

Route::group(['middleware'=>['logcheck']],function () {
    Route::get('/dashboard', 'basicviewcontroller@productview')->name('All_Product');
    Route::get('/bill/create', 'basicviewcontroller@billformview')->name('Billing');
    Route::get('/reports', 'basicviewcontroller@reportsview')->name('Reports');
    //post put patch delete
    Route::post('/bill/create', 'postbills@store');
    Route::post('/bill/Remark', 'postbills@store');
    Route::delete('/bill/delete', 'postbills@delete');

    Route::post('/product/create', 'postproducts@store');
    Route::put('/product/update', 'postproducts@update');
    Route::delete('/product/delete', 'postproducts@delete');
    Route::post('/product/fetch', 'postproducts@getvalues');

});
