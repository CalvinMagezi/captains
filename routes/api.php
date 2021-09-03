<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//Search
Route::get('/get-products', 'App\Http\Controllers\SearchController@autocomplete_product')->name('get-products');

//Orders
Route::post('/save-order', 'App\Http\Controllers\OrderController@store')->name('save-order');
Route::post('/close-order', 'App\Http\Controllers\OrderController@close_order')->name('close-order');
Route::post('/item-ready', 'App\Http\Controllers\OrderController@item_ready')->name('item-ready');
Route::get('/get-order-details', 'App\Http\Controllers\OrderController@get_details')->name('get-details');

Route::get('/get-mainbar-items', 'App\Http\Controllers\OrderController@get_mainbar_items')->name('get-mainbar-items');
Route::get('/get-kitchen-items', 'App\Http\Controllers\OrderController@get_kitchen_items')->name('get-kitchen-items');
Route::get('/get-cocktailbar-items', 'App\Http\Controllers\OrderController@get_cocktailbar_items')->name('get-cocktailbar-items');


//Tables
Route::get('/get-tables', 'App\Http\Controllers\MappingController@get')->name('get_table_mapping');
Route::get('/get-outside', 'App\Http\Controllers\MappingController@getOutside')->name('get_outside_tables');
Route::post('/save-tables', 'App\Http\Controllers\MappingController@store')->name('save-tables');
Route::post('/assign-tables', 'App\Http\Controllers\MappingController@assign')->name('assign-tables');

Route::get('/get-orders', 'App\Http\Controllers\AjaxController@orders');

