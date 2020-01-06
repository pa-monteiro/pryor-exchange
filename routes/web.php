<?php
use App\Events\PedidoEvent;
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

Route::get('/pedidos', 'HomeController@fetchOrders')->name('fetch.orders');
Route::get('orders/pdf', 'OrdersController@pdf')->name('orders.pdf');
Route::get('orders/excel', 'OrdersController@excel')->name('orders.excel');
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('taxes', 'TaxesController@index')->name('taxes.index');
    Route::get('taxes/{id}', 'TaxesController@edit')->name('taxes.edit');
    Route::patch('taxes/{id}', 'TaxesController@update')->name('taxes.update');

    Route::get('admins', 'AdminsController@index')->name('admins.index');
    Route::get('admins/create', 'AdminsController@create')->name('admins.create');
    Route::get('admins/{id}', 'AdminsController@edit')->name('admins.edit');
    Route::post('admins', 'AdminsController@store')->name('admins.store');
    Route::put('admins/{id}', 'AdminsController@update')->name('admins.update');
    Route::get('admins/delete/{id}', 'AdminsController@destroy')->name('admins.destroy');

    Route::get('cupons', 'CuponsController@index')->name('cupons.index');
    Route::get('cupons/create', 'CuponsController@create')->name('cupons.create');
    Route::get('cupons/{id}', 'CuponsController@edit')->name('cupons.edit');
    Route::post('cupons', 'CuponsController@store')->name('cupons.store');
    Route::put('cupons/{id}', 'CuponsController@update')->name('cupons.update');
    Route::get('cupons/delete/{id}', 'CuponsController@destroy')->name('cupons.destroy');

    Route::get('orders', 'OrdersController@index')->name('orders.index');
    Route::get('orders/{id}', 'OrdersController@edit')->name('orders.edit');
    Route::patch('orders/{id}', 'OrdersController@update')->name('orders.update');
    Route::get('orders/report', 'OrdersController@report')->name('orders.report');
    Route::get('orders/{id}/pendentes', 'OrdersController@pendentes')->name('orders.pendentes');
});