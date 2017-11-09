<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/v1/catalogs', 'APIController@getCatalogs')->name('api.catalogs');

Route::get('/v1/reservations', 'APIController@getReservations')->name('api.reservations.index');

Route::get('/api/v1/tasks', 'APIController@getTasks')->name('api.tasks.index');

Route::get('/api/v1/users', 'APIController@getUsers')->name('api.users.index');

Route::get('/api/v1/orders', 'APIController@getOrders')->name('api.orders.index');

Route::get('/api/v1/kardex', 'APIController@getKardex')->name('api.kardex.index');

Route::get('/order/{id}/levels','KardexController@bySupplier');
Route::get('/api/v1/sells', 'APIController@getSells')->name('api.sells.index');
Route::get('/v1/suppliers','APIController@getSuppliers')->name('api.suppliers');
Route::get('/supplier/{id}/edit','KardexController@edit');
Route::get('/supplier/{id}/delete','SupplierController@destroy');
Route::get('/order/{id}/edit','KardexController@OrderState');
Route::get('/detailsorders/show','APIController@getDetailsSells')->name('api.details.sells');
Route::get('/sell/{id}/delete','KardexController@destroySell');