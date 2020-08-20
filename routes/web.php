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

// Sales Routes
Route::get('/sales/create', 'SaleController@create');
Route::post('/sales', 'SaleController@store');

Route::get('/sales/{id}/edit', 'SaleController@edit');
Route::put('/sales/{id}', 'SaleController@update');

Route::delete('/sales/{id}', 'SaleController@destroy');

Route::post('/sales/search', 'SaleController@search');

