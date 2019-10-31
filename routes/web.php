<?php

use App\General;

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

Route::get('/','WelcomeController@index')->name('index');

Auth::routes();
Route::post('registeruser',"Auth\RegisterController@register")->name('registeruser');
Route::post('userlogin','Auth\LoginController@login')->name('userlogin');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/user/logout', 'Auth\LoginController@userlogout')->name('user.logout');
Route::prefix('admin')->group(function(){
	Route::get('/login','Auth\AdminLoginController@showloginform')->name('admin.login');
	Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/logout', 'Auth\AdminLoginController@adminlogout')->name('admin.logout');
	Route::get('/', 'AdminController@index')->name('admin');	
});
Route::resource('admin','AdminController')->except('index','show','destroy','create','store');
Route::get('general','GeneralController@index')->name('general.index');
Route::post('general/update','GeneralController@update')->name('general.update');
Route::get('board','BoardController@index')->name('board.index');
Route::get('board/show/{id}','BoardController@show')->name('board.show');
Route::post('board','BoardController@store')->name('board.store');
Route::post('board/update','BoardController@update')->name('board.update');
Route::get('board/delete/{id}','BoardController@destroy')->name('board.delete');

Route::get("admin/{any}", "AdminController@index")->where("any", ".*");
Route::get("{any}", "WelcomeController@index")->where("any", ".*");