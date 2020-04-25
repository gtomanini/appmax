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
    return redirect()->route('login');
    // return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [
    'as' => 'dashboard',
    'middleware' => ['auth'],
    'uses' => 'ProductsController@index',
]);

Route::get('/products/create', [
    'as' => 'products.create',
    'middleware' => ['auth'],
    'uses' => 'ProductsController@create',
]);

Route::get('/products/edit/{id}', [
    'as' => 'products.edit',
    'middleware' => ['auth'],
    'uses' => 'ProductsController@edit',
]);

Route::post('/products', [
    'as' => 'products.store',
    'middleware' => ['auth'],
    'uses' => 'ProductsController@store',
]);

Route::put('/products', [
    'as' => 'products.update',
    'middleware' => ['auth'],
    'uses' => 'ProductsController@update',
]);

Route::get('/stock', [
    'as' => 'stock.list',
    'middleware' => ['auth'],
    'uses' => 'StockMovesController@index',
]);

Route::get('/stock/create', [
    'as' => 'stock.create',
    'middleware' => ['auth'],
    'uses' => 'StockMovesController@create',
]);

Route::post('/stock', [
    'as' => 'stock.store',
    'middleware' => ['auth'],
    'uses' => 'StockMovesController@store',
]);