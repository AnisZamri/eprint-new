<?php

use Omnipay\Omnipay;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductController;
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

//Staff Add Product 
Route::post('/staffs/products/staff_AddProduct', [ProductController::class,'AddProducts'])->name('addProducts');
Route::get('/staff/products/staff_AddProduct', [ProductController::class,'ViewProduct'])->name('ViewProduct');
Route::get('/products/edit/{id}', [ProductController::class,'EditProduct'])->name('editProduct');
Route::post('/products/update/{id}', [ProductController::class,'UpdateProduct'])->name('updateProduct');
Route::get('/products/delete/{id}', [ProductController::class,'DeleteProduct']);


//Staff Add Sub Product 
Route::get('/staff/subproducts/viewadd', [SubProductsController::class,'ViewAddSubProducts'])->name('viewAddSubProducts');
Route::post('/staff/subproducts/add', [SubProductsController::class,'AddSubProducts'])->name('addSubProducts');
Route::get('/staff/subproducts/all', [SubProductsController::class,'ViewSubProduct'])->name('ViewSubProduct');
Route::get('/sub/edit/{id}', [SubProductsController::class,'EditSubProduct'])->name('editSubProduct');
Route::post('/sub/update/{id}', [SubProductsController::class,'UpdateSubProduct'])->name('updateSubProduct');
Route::get('/sub/delete/{id}', [SubProductsController::class,'DeleteSubProduct']);

Route::get('/order/', [OrderController::class,'StaffViewOrder'])->name('viewOrder');


/*********************CUSTOMERS*************************************/
Route::get('/customers/subproduct/cust_viewSubProduct/{id}', [IndexController::class,'ViewCustSubProduct'])->name('viewCustSubProduct');
Route::get('/products/subproductsDetails/{id}', [IndexController::class,'CustViewSubProductsDetails'])->name('custViewSubProductDetails');


//Cust Cart
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::get('viewCartTest', [CartController::class, 'viewCartTest'])->name('viewCartTest');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');


//Cust Order
Route::get('/products/subproducts/checkout', [CartController::class,'CustCheckout'])->name('custCheckout');
Route::get('/products/subproducts/checkoutorder', [CartController::class,'CustCheckoutOrder'])->name('checkoutCreateOrder');

//Cust Paypal Payment
Route::get('payment', [PaymentController::class,'index']);
Route::post('charge', [PaymentController::class,'charge']);
Route::get('success', [PaymentController::class,'success']);
Route::get('error', [PaymentController::class,'error']);

//Cust Create Order
Route::post('/customers/order/cust_checkout', [OrderController::class,'CreateOrder'])->name('createOrder');
Route::get('/customers/order/order', [OrderController::class,'CustViewOrder'])->name('custViewOrder');


