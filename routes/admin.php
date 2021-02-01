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
Route::get('lang/{locale}',function ($locale){
    session(['locale' => $locale]);
    return redirect()->back();
});

Route::group(['middleware'=>'checkAdmin','as' =>'admin.'],function () {
    Route::get('/dashboard', 'Admin\DashboardController@index')->name('home');

    Route::get('/user/view','Admin\UserController@index')->name('user.view');
    Route::get('/user/create','Admin\UserController@create')->name('user.create');
    Route::get('/user/{id}/edit','Admin\UserController@edit')->name('user.edit');
    Route::post('/user/delete','Admin\UserController@delete')->name('user.delete');
    Route::post('/user/save','Admin\UserController@update')->name('user.update');

    Route::get('/order/view','Admin\OrderController@index')->name('order.view');
    Route::get('/order/{id}/edit','Admin\OrderController@edit')->name('order.edit');
    Route::post('/order/delete','User\OrderController@delete')->name('order.delete');
});
