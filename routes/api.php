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

//Tables
Route::get('/get-tables', 'App\Http\Controllers\MappingController@get')->name('get_table_mapping');
Route::get('/get-outside', 'App\Http\Controllers\MappingController@getOutside')->name('get_outside_tables');
Route::post('/save-tables', 'App\Http\Controllers\MappingController@store')->name('save-tables');
Route::post('/assign-tables', 'App\Http\Controllers\MappingController@assign')->name('assign-tables');

