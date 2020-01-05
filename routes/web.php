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
Route::get('/lent/new', 'KashikariController@new')->name('kashikari.new');
Route::post('/lent/new', 'KashikariController@create');
Route::get('/lent', 'KashikariController@index')->name('kashikari');
Route::get('/lent/{id}/edit', 'KashikariController@edit')->name('kashikari.edit');
Route::post('/lent/{id}/edit', 'KashikariController@update')->name('kashikari.update');
Route::post('/lent/{id}/delete', 'KashikariController@delete')->name('kashikari.delete');
Route::get('/lent/{id}', 'KashikariController@show')->name('kashikari.show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
