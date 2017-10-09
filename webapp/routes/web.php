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
Route::get('/order','KardexController@indexOrders');


//ReservationController
Route::get('/reservation', 'ReservationController@index');
Route::post('/reservation/register', 'ReservationController@registerReservation');
Route::post('/reservation/create', 'ReservationController@store');
Route::get('/reservation/{idReservation}', 'ReservationController@show');

//CustomerController
Route::get('/searchCustomer', 'CustomerController@autocompleCustomerByPhone');
Route::post('/customerHistory', 'CustomerController@customerHistory');

//TableController
Route::post('/searchTable', 'TableController@searchTable');
//Tasks Asignment Controller
Route::get('/taskAsignment', 'TaskController@index');
Route::get('/buscarEmpleado', 'TaskController@autocompleteEmpleado');
Route::get('/taskAsignment/dataTable', 'TaskController@indexDataTable');
Route::post('/task/store','TaskController@store');

//Proveedores
Route::get('/supplier','SupplierController@index');
Route::get('/supplier/dataTable', 'SupplierController@listSupplier');
Route::post('/addsupplier','SupplierController@store');
Route::post('/editsupplier','SupplierController@update');
Route::post('/deletesupplier','SupplierController@destroy');
//Ordenes de compra
Route::get('/order/dataTable', 'SupplierController@listOrder');
Route::get('/createOrder','KardexController@createOrder');
