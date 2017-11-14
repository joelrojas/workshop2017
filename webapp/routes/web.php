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
Route::get('/order','KardexController@getOrders');

//CatalogController
Route::resource('catalog', 'CatalogController');


//ReservationController
Route::get('/reservation', 'ReservationController@index');
Route::get('/reservation/create', 'ReservationController@create');
Route::post('/reservation/store', 'ReservationController@store');
Route::get('/reservation/{idReservation}', 'ReservationController@show');
Route::put('/reservationEdit', 'ReservationController@update');
Route::get('/getReservation', 'ReservationController@getReservation');
Route::get('/reservation/{id}/edit', 'ReservationController@edit');
Route::patch('/reservation/{id}', 'ReservationController@update');
Route::get('/reservations/today', 'ReservationController@today')->name('reservations.today');
Route::post('/search/reservation/available', 'ReservationController@searchCatalogTables')->name('search.tables.available');
//CustomerController
Route::get('/search/customer/phone', 'CustomerController@autocompleteCustomerByPhone')->name('search.customer.phone');
Route::get('/search/customer/name', 'CustomerController@autocompleteCustomerByName')->name('search.customer.name');
Route::get('/search/customer/ci', 'CustomerController@autocompleteCustomerByCi')->name('search.customer.ci');

Route::post('/customerHistory', 'CustomerController@customerHistory');

//TableController
Route::post('/searchTable', 'TableController@searchTable');
//Tasks Asignment Controller
Route::get('/taskCreate', 'TaskController@create');
Route::get('/taskAsignment', 'TaskController@index');
Route::get('/buscarEmpleado', 'TaskController@autocompleteEmpleado');
Route::get('/taskAsignment/dataTable', 'TaskController@indexDataTable');
Route::post('/addtask','TaskController@store');
Route::put('/edittask','TaskController@update');
Route::post('/deletetask','TaskController@destroy');

//Proveedores
Route::get('/supplier','SupplierController@index');
Route::get('/supplier/dataTable', 'SupplierController@listSupplier');
Route::post('/addsupplier','SupplierController@store');
Route::post('/editsupplier','SupplierController@update');
Route::post('/deletesupplier','SupplierController@destroy');
Route::get('/supplier/search/product', 'ProductController@searchProduct')->name('search.product');
//Ordenes de compra
Route::get('/order/dataTable', 'SupplierController@listOrder');
Route::post('/createOrder','KardexController@createOrder');
Route::post('/EditStateOrder','KardexController@StateUpdate');

//Users
Route::get('/users', 'UserController@index');
Route::get('/userCreate', 'UserController@create');
Route::post('/adduser','UserController@store');
Route::put('/edituser','UserController@update');
Route::get('/viewProfile','UserController@show');
Route::get('/editProfile','UserController@edit');
Route::put('/edituserprofile','UserController@updateProfile');
//Reportes
Route::get('/taskReport', 'ReportController@task');


//Auth LARAVEL
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//pdf
Route::get('/download-pdf','TaskController@downloadPDF');
//Ventas
Route::get('/sell','KardexController@indexSells');
//#66615b
//dashboards
Route::get('listado_graficas', 'GraficasController@index');
Route::get('grafica_registros/{anio}/{mes}', 'GraficasController@registros_mes');
/*Route::get('grafica_publicaciones', 'GraficasController@total_publicaciones');*/