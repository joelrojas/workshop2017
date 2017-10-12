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

Route::get('/api/v1/catalogs', 'APIController@getCatalogs')->name('api.catalogs.index');

Route::get('/api/v1/reservations', 'APIController@getReservations')->name('api.reservations.index');

Route::get('/api/v1/tasks', 'APIController@getTasks')->name('api.tasks.index');

Route::get('/api/v1/users', 'APIController@getUsers')->name('api.users.index');

Route::get('/api/v1/orders', 'APIController@getOrders')->name('api.orders.index');

Route::get('/api/v1/kardex', 'APIController@getKardex')->name('api.kardex.index');
