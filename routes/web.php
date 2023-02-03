<?php

use Omnipay\Omnipay;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\SubProductsController;


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
    return view('customers.index');
});

Route::get('/home', function () {
    return view('customers.index');
});


Auth::routes();


Auth::routes();

Route::prefix('staff')->group(function()
{
    Route::get('index',[App\Http\Controllers\StaffController::class, 'index'])->name('index');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/inbox', [InboxController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/{id}', [InboxController::class, 'show'])->name('inbox.show');
});

/*********************STAFF*************************************/

// All Admin Routes
Route::get('staffs/profile/viewProfile', [StaffController::class, 'StaffViewProfile'])->name('staffViewProfile');
Route::get('/staffs/profile/editProfile/{id}', [StaffController::class,'StaffEditProfile'])->name('staffEditProfile');
Route::post('/staffs/profile/updateProfile/{id}', [StaffController::class,'StaffUpdateProfile'])->name('staffUpdateProfile');


Route::get('admin/change/password', [StaffController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('update/change/password', [StaffController::class, 'AdminUpdateChangePassword'])->name('update.change.password');
Route::get('admin/logout', [StaffController::class, 'destroy'])->name('admin.logout');


//Staff Add Product 
Route::post('/staffs/products/staff_AddProduct', [ProductController::class,'AddProducts'])->name('addProducts');
Route::get('/staff/products/staff_AddProduct', [ProductController::class,'ViewProduct'])->name('ViewProduct');
Route::get('/products/edit/{id}', [ProductController::class,'EditProduct'])->name('editProduct');
Route::post('/products/update/{id}', [ProductController::class,'UpdateProduct'])->name('updateProduct');
Route::get('/products/delete/{id}', [ProductController::class,'DeleteProduct']);


//Staff Add Sub Product 
Route::get('/staff/subproducts/all', [SubProductsController::class,'ViewSubProduct'])->name('ViewSubProduct');
Route::get('/staff/subproducts/viewadd', [SubProductsController::class,'ViewAddSubProducts'])->name('viewAddSubProducts');
Route::post('/staff/subproducts/add', [SubProductsController::class,'AddSubProducts'])->name('addSubProducts');
Route::get('/sub/edit/{id}', [SubProductsController::class,'EditSubProduct'])->name('editSubProduct');
Route::post('/sub/update/{id}', [SubProductsController::class,'UpdateSubProduct'])->name('updateSubProduct');
Route::get('/sub/delete/{id}', [SubProductsController::class,'DeleteSubProduct']);

Route::get('/order', [OrderController::class,'StaffViewOrder'])->name('viewOrder');
Route::get('/orderStatus/{id}', [OrderController::class,'UpdateOrderStatus'])->name('updateOrderStatus');
Route::post('/status/{id}', [OrderController::class,'UpdateStatus'])->name('updateStatus');




/*********************CUSTOMERS*************************************/

Route::get('customers/profile/viewProfile', [CustomersController::class, 'CustViewProfile'])->name('custViewProfile');
Route::get('/customers/profile/editProfile/{id}', [CustomersController::class,'CustEditProfile'])->name('custEditProfile');
Route::post('/customers/profile/updateProfile/{id}', [CustomersController::class,'CustUpdateProfile'])->name('custUpdateProfile');

Route::get('/customers/subproduct/cust_viewSubProduct/{id}', [IndexController::class,'ViewCustSubProduct'])->name('viewCustSubProduct');
Route::get('/products/subproductsDetails/{id}', [IndexController::class,'CustViewSubProductsDetails'])->name('custViewSubProductDetails');

Route::group(['middleware' => 'auth'], function () {
    
    //Cust Cart
    Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
    Route::get('viewCartTest', [CartController::class, 'viewCartTest'])->name('viewCartTest');
    Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
    Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');


    //Cust Order
    Route::get('/products/subproducts/checkout', [CartController::class,'CustCheckout'])->name('custCheckout');     //pergi page isi nama

    Route::post('/products/subproducts/checkoutorder', [CartController::class,'CustCheckoutOrder'])->name('checkoutCreateOrder');      //create order lepas paymetn gi page sec

    //Cust Paypal Payment
    Route::get('payment', [PaymentController::class,'index']);
    Route::post('charge', [PaymentController::class,'charge'])->name('charge');
    Route::get('success', [PaymentController::class,'success']);
    Route::get('error', [PaymentController::class,'error']);

    //Cust Create Order
    Route::post('/checkoutStore', [OrderController::class,'CheckoutStore'])->name('checkoutStore');

    Route::get('/cashCheckout', [OrderController::class,'CashCheckout'])->name('cashCheckout');
    Route::get('/paypalCheckout', [OrderController::class,'PaypalCheckout'])->name('paypalCheckout');



    Route::post('createOrder', [OrderController::class,'CreateOrder'])->name('createOrder');
    Route::get('/customers/order/order', [OrderController::class,'ViewOrder'])->name('custViewOrder');
    Route::get('/customers/order/orderTable', [OrderController::class,'ViewOrderTable'])->name('custViewOrderTable');

});



