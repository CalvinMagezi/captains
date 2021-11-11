<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Admin\SmsApiController;
use App\Http\Controllers\Api\V1\Admin\BookingApiController;
use App\Http\Controllers\Api\V1\Admin\SectionApiController;
use App\Http\Controllers\Api\V1\Admin\DiscountApiController;
use App\Http\Controllers\Api\V1\Admin\OrderDetailApiController;
use App\Http\Controllers\Api\V1\Admin\RequisitionApiController;
use App\Http\Controllers\Api\V1\Admin\SectionSaleApiController;
use App\Http\Controllers\Api\V1\Admin\TransactionApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Transaction
    Route::apiResource('transactions', TransactionApiController::class);

    // Order Details
    Route::apiResource('order-details', OrderDetailApiController::class);

    // Section
    Route::apiResource('sections', SectionApiController::class);

    // Requisition
    Route::apiResource('requisitions', RequisitionApiController::class);

    // Sms
    Route::apiResource('sms', SmsApiController::class);

    // Discount
    Route::apiResource('discounts', DiscountApiController::class);

    // Booking
    Route::apiResource('bookings', BookingApiController::class);

    // Section Sales
    Route::apiResource('section-sales', SectionSaleApiController::class);
});

Route::post('ussd', [USSDStringController::class, "start"]);
Route::post('ussd_notification', [USSDStringController::class, "ussd_notification"]);

//Tables
Route::get('/get-tables', 'App\Http\Controllers\MappingController@get')->name('get_table_mapping');
Route::get('/get-outside', 'App\Http\Controllers\MappingController@getOutside')->name('get_outside_tables');
Route::post('/save-tables', 'App\Http\Controllers\MappingController@store')->name('save-tables');
Route::post('/assign-tables', 'App\Http\Controllers\MappingController@assign')->name('assign-tables');

Route::get('/get-orders', 'App\Http\Controllers\AjaxController@orders');
