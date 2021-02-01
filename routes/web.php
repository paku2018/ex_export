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

Route::get('/','HomeController@index')->name('home');
Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/register/{user}','Auth\RegisterController@showRegistrationForm')->name('user.auth.register');

Route::get('/seller/callback','User\SellerController@callback');

Auth::routes();

Route::get('/profile/edit','User\ProfileController@edit')->name('profile.index');
Route::post('/profile/save','User\ProfileController@update')->name('profile.update');

Route::group(['middleware'=>'checkSeller','prefix' => 'seller','as' =>'seller.'],function (){
    Route::get('/dashboard', 'User\SellerController@index')->name('dashboard');
    Route::get('/order/view','User\OrderController@index')->name('order.view');
    Route::get('/order/create','User\OrderController@create')->name('order.create');
    Route::get('/order/{id}/edit','User\OrderController@edit')->name('order.edit');
    Route::post('/order/save','User\OrderController@save')->name('order.save');
    Route::post('/order/delete','User\OrderController@delete')->name('order.delete');
    Route::post('/order/get_list','User\OrderController@getList')->name('order.list');
    Route::post('/order/cancel','User\OrderController@cancel')->name('order.cancel');

});

Route::group(['middleware'=>'checkTransporter','prefix' => 'transporter','as' =>'transporter.'],function (){
    Route::get('/dashboard', 'User\TransporterController@index')->name('dashboard');
    Route::get('/order/view','User\TransporterController@view')->name('order.view');
    Route::get('/order/{id}/edit','User\TransporterController@edit')->name('order.edit');
    Route::post('/order/change','User\TransporterController@change')->name('order.change');
});
