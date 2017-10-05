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

Route::get('/catalog', 'CatalogController@index');
Route::get('/catalog/dataTable', 'CatalogController@indexDataTable');

//HomeController
Route::get('/home', 'HomeController@index');

Route::get('/kardex','KardexController@index');
Route::get('/order','OrderController@index');


//ReservationController
Route::get('/reservation', 'ReservationController@index');

//TableController
Route::post('/searchTable', 'TableController@searchTable');
//Tasks Asignment Controller
Route::get('/taskAsignment', 'TaskController@index');
Route::get('/buscarEmpleado', 'TaskController@autocompleteEmpleado');
Route::get('/taskAsignment/dataTable', 'TaskController@indexDataTable');
Route::post('/task/store','TaskController@store');