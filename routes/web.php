<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/overview', [HomeController::class, 'overview'])->name('overview');
    Route::get('/users', [UserController::class, 'getUser']);
    Route::get('/parcels', [ParcelController::class, 'getParcel']);

//Quotes
    Route::get('/quotes', [QuoteController::class, 'adminIndex'])->name('quote.index');
    Route::get('/quote/create', [QuoteController::class, 'create'])->name('quote.create');
    Route::post('/quote/create/{user}', [QuoteController::class, 'store'])->name('quote.store');
    Route::get('/quote/{quote}', [QuoteController::class, 'adminShow'])->name('quote.show');
    //get approve quote modal
    Route::get('/quote/{quote}/modal', [QuoteController::class, 'approveModal'])->name('quote.approve.modal');
    //approve quote route
    Route::get('/quote/{quote}/approve', [QuoteController::class, 'approve'])->name('quote.approve');

//user
    Route::post('/user/{id}/update', [UserController::class, 'user_update'])->name('user.update');

//services
    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('services.index');
    Route::get('/quote/request/form/data', [QuoteController::class, 'formData'])->name('quote.request.form.data');

//services
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{service}', [ServiceController::class, 'show'])->name('service.show');
    Route::post('/service/{service}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::post('/service/{service}/delete', [ServiceController::class, 'destroy'])->name('service.delete');

//branches
    Route::get('/branches', [BranchController::class, 'index'])->name('branch.index');
    Route::get('/branch/create', [BranchController::class, 'create'])->name('branch.create');
    Route::post('/branch/store', [BranchController::class, 'store'])->name('branch.store');
    Route::get('/branch/{branch}', [BranchController::class, 'show'])->name('branch.show');
    Route::post('/branch/{branch}/update', [BranchController::class, 'update'])->name('branch.update');
    Route::post('/branch/{branch}/delete', [BranchController::class, 'destroy'])->name('branch.delete');

//messages
    Route::get('/messages', [MessageController::class, 'index'])->name('message.index');
    Route::post('/message/create', [MessageController::class, 'store'])->name('message.create');
    Route::get('/message/{message}', [MessageController::class, 'show'])->name('message.show');
    Route::post('/message/{message}/update', [MessageController::class, 'update'])->name('message.update');
    Route::post('/message/{message}/delete', [MessageController::class, 'destroy'])->name('message.delete');

//supports
    Route::get('/supports', [SupportController::class, 'index'])->name('support.index');
    Route::post('/support/create', [SupportController::class, 'store'])->name('create.support');
    Route::get('/support/{support}', [SupportController::class, 'show'])->name('show.support');
    Route::post('/support/{support}/update', [SupportController::class, 'update'])->name('update.support');
    Route::post('/support/{support}/delete', [SupportController::class, 'destroy'])->name('delete.support');

//threads
    Route::get('/threads', [ThreadController::class, 'index'])->name('thread.index');
    Route::post('/thread/create', [ThreadController::class, 'store'])->name('thread.create');
    Route::get('/thread/{user_id}', [ThreadController::class, 'show'])->name('thread.show');
    Route::post('/thread/{thread}/update', [ThreadController::class, 'update'])->name('thread.update');
    Route::post('/thread/{thread}/delete', [ThreadController::class, 'destroy'])->name('thread.delete');

//repairs
    Route::get('/repairs', [RepairController::class, 'index'])->name('repair.index');
    Route::get('/repairs/{user_id}', [RepairController::class, 'user_index']);
    Route::post('/repair/create', [RepairController::class, 'store'])->name('repair.create');
    Route::get('/repair/{repair}', [RepairController::class, 'show'])->name('repair.show');
    Route::post('/repair/{repair}/update', [RepairController::class, 'update'])->name('repair.update');
    Route::post('/repair/{repair}/delete', [RepairController::class, 'destroy'])->name('repair.delete');
    //repair statuses
    Route::get('/repair/{repair}/statuses', [RepairController::class, 'statuses'])->name('repair.statuses');
    //repair.update.status
    Route::get('/repair/{repair}/update/status', [RepairController::class, 'updateStatus'])->name('repair.update.status');

//customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/{user_id}', [CustomerController::class, 'user_index']);
    Route::post('/customer/create', [CustomerController::class, 'store'])->name('customer.create');
    Route::get('/customer/{customer}', [CustomerController::class, 'show'])->name('customer.show');
    Route::post('/customer/{customer}/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::post('/customer/{customer}/delete', [CustomerController::class, 'destroy'])->name('customer.delete');

    //Courier
    Route::get('/courier', [CourierController::class, 'index'])->name('courier.index');
    Route::get('/courier/create', [CourierController::class, 'create'])->name('courier.create');
    Route::post('/courier/store', [CourierController::class, 'store'])->name('courier.store');
    Route::get('/courier/{courier}', [CourierController::class, 'show'])->name('courier.show');
    Route::post('/courier/{courier}/update', [CourierController::class, 'update'])->name('courier.update');
    Route::post('/courier/{courier}/delete', [CourierController::class, 'destroy'])->name('courier.delete');

    //book courier collection
    Route::get('/courier/create/collection', [CourierController::class, 'createCollection'])->name('courier.create.collection');
    Route::get('/courier/create/delivery', [CourierController::class, 'createDelivery'])->name('courier.create.delivery');

    //book courier collection
    Route::post('/courier/create/collection', [CourierController::class, 'courierCollectionStore'])->name('courier.store.collection');
    Route::post('/courier/create/delivery', [CourierController::class, 'courierDeliveryStore'])->name('courier.store.delivery');

    //QR code
    Route::get('/qr-code/{repair}', [CourierController::class, 'qrCode'])->name('qr.code');

    //products
    Route::get('/products', [ProductController::class, 'admin_index'])->name('products.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::post('/product/{product}/update', [ProductController::class, 'update']);
    Route::post('/product/{product}/delete', [ProductController::class, 'destroy']);

});

Route::get('/qr-code/{repair}/repair', [CourierController::class, 'qrCodeRepair'])->name('qr.code.repair');
