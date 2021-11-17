<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SmsController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\RequisitionController;
use App\Http\Controllers\Admin\SectionSaleController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\ContactCompanyController;
use App\Http\Controllers\Admin\ContactContactController;
use App\Http\Controllers\Admin\SystemCalendarController;



Route::post('/signin', [App\Http\Controllers\AuthController::class, 'login'])->name('signin');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
Route::get('/', function(){
    return view('welcome');
});
Route::post('/item-ready', [App\Http\Controllers\OrderController::class, 'item_ready'])->name('item-ready');
//Mapping
Route::get('/assign-tables', function(){
    return view('mapping.assign');
})->name('assign-tables');
//Point Of Sale
Route::get('/pos', function (){
    return view('orders.create');
})->name('pos');
//Point Of Cashier
Route::get('/cashier', function (){
    return view('orders.cashier');
})->name('cashier');
//Return Section Choices Page
Route::get('/section/{section}',function($section){
    return view('section-choices', [
        'section' => $section
    ]);
});
Route::get('/order/{id}', function($id){
    return view('orderdetails', [
        "id" => $id
    ]);
});

Route::post('store-order',[App\Http\Controllers\OrderController::class, 'store'])->name('store-order');
Route::get('/check-receipt', function(){
    $products = Product::all();
    $orders = Order::all();
    //Last order details
    $lastID = OrderDetail::max('order_id');
    $order_receipt = OrderDetail::where('order_id', $lastID)->get();
    return view('reports.receipt', [
        'products' => $products,
        'orders' => $orders,
        'order_receipt' => $order_receipt,
    ]);
});
Route::get('/receipt/{id}',function($id){
    return view('receipt', [
        'order' => $id,
    ]);
});
//Inventory
Route::post('/update-happy',  [App\Http\Controllers\HappyHourController::class, 'update']);
//Mapping
Route::post('/new-inside-table', [App\Http\Controllers\MappingController::class, 'create_inside'])->name('new-inside-table');
Route::post('/new-outside-table', [App\Http\Controllers\MappingController::class, 'create_outside'])->name('new-outside-table');
Route::post('/reset-table', [App\Http\Controllers\MappingController::class, 'reset'])->name('reset-table');
// Route::post('/delete-table', [App\Http\Controllers\MappingController::class, 'delete'])->name('delete-table');

Route::post('/clear-assign', [App\Http\Controllers\MappingController::class, 'clear_assign'])->name('clear-assign');

});

// Super Admin Routes

Auth::routes(['register' => true]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // System Calendar
    Route::resource('system-calendars', SystemCalendarController::class, ['except' => ['store', 'update', 'destroy', 'create', 'edit', 'show']]);

    // Contact Company
    Route::resource('contact-companies', ContactCompanyController::class, ['except' => ['store', 'update', 'destroy']]);

    // Contact Contacts
    Route::resource('contact-contacts', ContactContactController::class, ['except' => ['store', 'update', 'destroy']]);

    // Staff
    Route::resource('staff', StaffController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::resource('products', ProductController::class, ['except' => ['store', 'update', 'destroy']]);

    // Cart
    Route::resource('carts', CartController::class, ['except' => ['store', 'update', 'destroy']]);

    // Transaction
    Route::resource('transactions', TransactionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Order Details
    Route::resource('order-details', OrderDetailController::class, ['except' => ['store', 'update', 'destroy']]);

    // Order
    Route::resource('orders', OrderController::class, ['except' => ['store', 'update', 'destroy']]);

    // Section
    Route::resource('sections', SectionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Table
    Route::resource('tables', TableController::class, ['except' => ['store', 'update', 'destroy']]);

    // Notifications
    Route::resource('notifications', NotificationController::class, ['except' => ['store', 'update', 'destroy']]);

    // Requisition
    Route::resource('requisitions', RequisitionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Sms
    Route::resource('sms', SmsController::class, ['except' => ['store', 'update', 'destroy']]);

    // Discount
    Route::resource('discounts', DiscountController::class, ['except' => ['store', 'update', 'destroy']]);

    // Customer
    Route::post('customers/csv', [CustomerController::class, 'csvStore'])->name('customers.csv.store');
    Route::put('customers/csv', [CustomerController::class, 'csvUpdate'])->name('customers.csv.update');
    Route::resource('customers', CustomerController::class, ['except' => ['store', 'update', 'destroy']]);

    // Booking
    Route::resource('bookings', BookingController::class, ['except' => ['store', 'update', 'destroy']]);

    // Section Sales
    Route::resource('section-sales', SectionSaleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Category
    Route::resource('categories', CategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Type
    Route::resource('types', TypeController::class, ['except' => ['store', 'update', 'destroy']]);

    // Messages
    Route::get('messages', [MessageController::class, 'index'])->name('messages.index');
    Route::post('messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('messages/inbox', [MessageController::class, 'inbox'])->name('messages.inbox');
    Route::get('messages/outbox', [MessageController::class, 'outbox'])->name('messages.outbox');
    Route::get('messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::get('messages/{conversation}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('messages/{conversation}', [MessageController::class, 'update'])->name('messages.update');
    Route::post('messages/{conversation}/destroy', [MessageController::class, 'destroy'])->name('messages.destroy');
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});
