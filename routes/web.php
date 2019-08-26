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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])
    ->group(function() {
        Route::get('/home', 'HomeController@index')->name('home');

    });

Route::middleware(['auth'])
    ->prefix('Erp/Cotizacion')
    ->namespace('Erp\Cotizacion')
    ->group(function() {

        // Rutas para controlar la creacion de Cotizaciones
        Route::get('/index',                          'QuotationController@index')->name('QuotationIndex');
        Route::get('/getIndex',                       'QuotationController@getIndex')->name('QuotationGetIndex');
        Route::post('/store',                         'QuotationController@store')->name('QuotationStore');
        Route::post('/destroy',                       'QuotationController@destroy')->name('QuotationDestroy');

    });

Route::middleware(['auth'])
    ->prefix('Erp/Cotizacion/CotizacionAddProduct')
    ->namespace('Erp\Cotizacion')
    ->group(function() {

        //Rutas para controlar la adicion de productos a las cotizaciones
        Route::get('/{id}/index',                     'QuotationAddProduct@index')->name('QuotationAddProductIndex');
        Route::post('/store',                         'QuotationAddProduct@store')->name('QuotationAddProductStore');

    });

Route::middleware(['auth'])
    ->prefix('Pdf/Cotizacion')
    ->namespace('Pdf\Cotizacion')
    ->group(function() {

        //Rutas para controlar la adicion de productos a las cotizaciones
        Route::get('/{id}/cotizacion',                     'PdfQuotationController@request')->name('QuotationPdfIndex');

    });

