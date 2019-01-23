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
Route::get('/tickets', 'TicketsController@index')->name('tickets');
Route::get('/tickets/create', 'TicketsController@create')->name('tickets_create');
Route::post('/tickets/store', 'TicketsController@store')->name('tickets_store');
Route::get('/tickets/{id}', 'TicketsController@read')->where('id', '[0-9]+')->name('tickets_read');
Route::post('/comments/store', 'CommentsController@store')->name('comments_store');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'admin'], function() {
	Route::get('/tickets', 'AdminTicketsController@tickets')->name('admin_tickets');
	Route::get('/users', 'AdminTicketsController@users')->name('admin_users');
	Route::get('/edit/{id}', 'AdminTicketsController@edit')->where('id', '[0-9]+')->name('admin_edit');
	Route::put('/update/{id}', 'AdminTicketsController@update')->where('id', '[0-9]+')->name('admin_update');
});

