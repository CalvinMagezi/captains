<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

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
    return redirect('/dashboard');
});
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('home');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

//=============
//Admin Routes
//=============
Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->middleware('auth')->name('dashboard');

//Search
Route::get('search', [SearchController::class, 'index'])->name('search');
Route::get('autocomplete', [SearchController::class, 'autocomplete_product'])->name('autocomplete');

//Orders
Route::get('/create-order', [App\Http\Controllers\OrderController::class, 'new_order'])->middleware('auth')->name('new-order');
Route::post('/create-order', [App\Http\Controllers\AdminController::class, 'store'])->name('store-order');
Route::get('/new-order', [App\Http\Controllers\OrderController::class, 'new_order'])->middleware('auth')->name('new-order');
Route::get('/ongoing-orders', [App\Http\Controllers\OrderController::class, 'ongoing'])->name('ongoing-orders');
Route::get('/flagged-orders', [App\Http\Controllers\OrderController::class, 'flagged'])->name('flagged-orders');
Route::get('/closed-orders', [App\Http\Controllers\OrderController::class, 'closed'])->name('closed-orders');
Route::get('/main-bar', [App\Http\Controllers\OrderController::class, 'main_bar'])->name('main_bar');
Route::get('/cocktail-bar', [App\Http\Controllers\OrderController::class, 'cocktail_bar'])->name('cocktail_bar');

Route::post('/soft-delete-order',[App\Http\Controllers\OrderController::class, 'soft_delete'])->name('soft-delete-order');
Route::post('/restore-order',[App\Http\Controllers\OrderController::class, 'restore'])->name('restore-order');


//Mapping
Route::get('/show-tables', [App\Http\Controllers\MappingController::class, 'show'])->middleware('auth')->name('show-mapping');
Route::post('/new-inside-table', [App\Http\Controllers\MappingController::class, 'create_inside'])->middleware('auth')->name('new-inside-table');
Route::post('/new-outside-table', [App\Http\Controllers\MappingController::class, 'create_outside'])->middleware('auth')->name('new-outside-table');
Route::post('/reset-table', [App\Http\Controllers\MappingController::class, 'reset'])->middleware('auth')->name('reset-table');
// Route::post('/delete-table', [App\Http\Controllers\MappingController::class, 'delete'])->middleware('auth')->name('delete-table');
Route::get('/assign-tables', [App\Http\Controllers\MappingController::class, 'assign_index'])->middleware('auth')->name('assign-tables');
Route::post('/clear-assign', [App\Http\Controllers\MappingController::class, 'clear_assign'])->middleware('auth')->name('clear-assign');