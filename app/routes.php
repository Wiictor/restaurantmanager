<?php

Route::get('/', function()
{
	return View::make('index');
});


Route::get('/register',  'PagesController@register');
Route::get('/reservation', 'PagesController@reservation');
Route::get('/login', 'SessionsController@create');
Route::get('/logout', 'SessionsController@destroy');
Route::get('/admin', ['before'=> ['auth', 'member'], 'uses'=> 'PagesController@admin']);
Route::post('/sessions/store', ['before' => 'csrf', 'uses'=>'SessionsController@store']);
Route::post('/users/store', ['before' =>'csrf', 'uses' => 'UsersController@store']);
Route::controller('password','RemindersController');


Route::group(['prefix' => 'api/v1/'], function()
{
	Route::get('tables', 'TablesController@index');
	Route::get('tables/{id}', 'TablesController@show');
	Route::post('tables', 'TablesController@store');
	//because Symphony HTTP Foundation can not understand 'Content-Type':'multipart/form-data' when using put
	Route::post('tables/{id}', 'TablesController@update');
	Route::delete('tables/{id}', 'TablesController@destroy');
	Route::get('/users/reservations', 'UsersController@reservations');
	Route::get('/auth', 'SessionsController@index');
	Route::post('/reservations/check', 'ReservationsController@check');
	Route::post('/reservations', 'ReservationsController@store');
	Route::get('/reservations', 'ReservationsController@index');
	Route::get('/reservations/{id}', 'ReservationsController@show');
	Route::put('/reservations/{id}', 'ReservationsController@update');
	Route::delete('/reservations/{id}', 'ReservationsController@destroy');
	Route::get('/users', 'UsersController@index');
	Route::get('/users/{id}', 'UsersController@show');	
	Route::put('/users/{id}', 'UsersController@update');
	Route::post('/users', 'UsersController@store');
	Route::delete('/users/{id}', 'UsersController@destroy');
});

