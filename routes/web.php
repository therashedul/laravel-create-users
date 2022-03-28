<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['middleware' => ['auth']], function() {
    Route::get('users', 'App\Http\Controllers\UserController@index')->name('users.index');
     Route::get('/create', 'App\Http\Controllers\UserController@create')->name('users.create');
    Route::post('store', 'App\Http\Controllers\UserController@store')->name('users.store');
    Route::get('users.{id}', 'App\Http\Controllers\UserController@show')->name('users.show');
    Route::get('edit.{id}', 'App\Http\Controllers\UserController@edit')->name('users.edit');
    Route::patch('users.update.{id}', 'App\Http\Controllers\UserController@update')->name('users.update');
    Route::delete('destroy.{id}', 'App\Http\Controllers\UserController@destroy')->name('users.destroy');
});
// Site url
// Route::resource('url', App\Http\Controllers\SiteurlController::class);
Route::group(['prefix' => 'url','middleware' => ['auth']], function (){ 
	  Route::get('/', 'App\Http\Controllers\SiteurlController@index')->name('index');
	  Route::get('/create', 'App\Http\Controllers\SiteurlController@create')->name('create');
	  Route::post('/store', 'App\Http\Controllers\SiteurlController@store')->name('url.store');
	  Route::get('/show.{id}', 'App\Http\Controllers\SiteurlController@show')->name('show');
	  Route::get('/edit.{id}', 'App\Http\Controllers\SiteurlController@edit')->name('edit');
	  Route::patch('/url.update.{id}', 'App\Http\Controllers\SiteurlController@update')->name('update');
	  Route::delete('/destroy.{id}', 'App\Http\Controllers\SiteurlController@destroy')->name('destroy');

	
 });



