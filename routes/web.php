<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/
Route::get('/', 'DashboardController@index');

Route::get('/products/create', 'ProductController@create');
Route::post('/products', 'ProductController@store');

Route::get('/products/{id}/edit', 'ProductController@edit');
Route::put('/products/{id}', 'ProductController@update');

Route::delete('/products/{id}', 'ProductController@destroy');

Route::get('/products/{id}', 'ProductController@show');

Route::get('/sales', function () {
    return view('crud_sales');
});
