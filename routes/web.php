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

//user
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//adminuser
Route::get('/adminhome', 'AdminHomeController@index')->name('adminhome')->middleware('admin');

// Authentication Routes...
Route::get('adminlogin', 'AdminAuth\LoginController@showLoginForm')->name('adminlogin');
Route::post('adminlogin', 'AdminAuth\LoginController@login');
Route::post('adminlogout', 'AdminAuth\LoginController@logout')->name('adminlogout')->middleware('admin');

// Registration Routes...
Route::get('adminregister', 'AdminAuth\RegisterController@showRegistrationForm')->name('adminregister')->middleware('admin');
Route::post('adminregister', 'AdminAuth\RegisterController@register')->middleware('admin');

// Password Reset Routes...
/*Route::get('adminpassword/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('adminpassword.request');
Route::post('adminpassword/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('adminpassword.email');
Route::get('adminpassword/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm')->name('adminpassword.reset');
Route::post('adminpassword/reset', 'AdminAuth\ResetPasswordController@reset');*/

//products
Route::resource('product', 'ProductController');

//cart
Route::get('cart/add/{id}', 'CartController@getCartAdd')->name('getCartAdd');

Route::get('cart', 'CartController@index')->name('CartIndex');


Route::delete('cart/delete/{id}', 'CartController@delete')->name('CartDelete');
Route::patch('cart/update/{id}', 'CartController@update')->name('CartUpdate');