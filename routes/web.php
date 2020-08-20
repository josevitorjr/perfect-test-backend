<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/
Route::get('/', 'DashboardController@index');

// Products Routes
Route::get('/products/create', 'ProductController@create');
Route::post('/products', 'ProductController@store');

Route::get('/products/{id}/edit', 'ProductController@edit');
Route::put('/products/{id}', 'ProductController@update');

Route::delete('/products/{id}', 'ProductController@destroy');

// Clients Routes
Route::get('/clients/create', 'ClientController@create');
Route::post('/clients', 'ClientController@store');

Route::get('/clients/{id}/edit', 'ClientController@edit');
Route::put('/clients/{id}', 'ClientController@update');

Route::delete('/clients/{id}', 'ClientController@destroy');

Route::get('/sales', function () {
    return view('crud_sales');
});
