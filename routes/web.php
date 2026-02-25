<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\adminController;

    route::group(['middleware' => 'guest'], function () {

        route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
        route::get('/registerPage', [CustomerController::class, 'registerPage'])->name('customer.register');
        route::post('accRegister', [CustomerController::class, 'accRegister'])->name('customer.accRegister');
        route::post('accLogin', [CustomerController::class, 'accLogin'])->name('customer.accLogin');

    });

    route::group(['middleware' => 'auth'], function () {

        route::post('buyNow/{id}', [CustomerController::class, 'buyNow'])->name('customer.buyNow');
        route::post('addToCart/{id}', [CustomerController::class, 'addToCart'])->name('customer.addToCart');
        route::get('cart', [CustomerController::class, 'cart'])->name('customer.cart');
        route::post('removeCart/{id}', [CustomerController::class, 'removeCart'])->name('customer.removeCart');
        route::get('cancelOrder/{id}', [CustomerController::class, 'cancelOrder'])->name('customer.cancelOrder');
        route::post('orderConfirmation', [CustomerController::class, 'orderConfirmation'])->name('customer.orderConfirmation');
        route::get('myOrders', [CustomerController::class, 'myOrders'])->name('customer.myOrders');
        route::post('review/{id}', [CustomerController::class, 'review'])->name('customer.review');
        route::post('/products/{product}/rate', [CustomerController::class, 'rate'])->name('customer.rate');
        route::post('receivedConfirm/{id}', [CustomerController::class, 'receivedConfirm' ])->name('customer.receivedConfirm');
        route::get('profile', [CustomerController::class, 'profile'])->name('customer.profile');
        route::get('history', [CustomerController::class, 'history'])->name('customer.history');
        route::get('changeEmail', [CustomerController::class, 'changeEmail'])->name('customer.changeEmail');
        route::post('newEmail', [CustomerController::class, 'newEmail'])->name('customer.newEmail');

    });

    route::group(['middleware' => 'admin'], function() {

        
        route::get('adminDashboard', [adminController::class, 'adminDashboard'])->name('admin.dashboard');
        route::get('addProduct', [adminController::class, 'viewProduct'])->name('admin.viewProduct');
        route::get('addCategory', [adminController::class, 'viewCategory'])->name('admin.viewCategory');
        route::post('addCategory', [adminController::class, 'addCategory'])->name('admin.addCategory');
        route::post('addProduct', [adminController::class, 'addProduct'])->name('admin.addProduct');
        route::get('manageProduct', [adminController::class, 'manageProduct'])->name('admin.manageProduct');
        route::get('editProduct/{id}', [adminController::class, 'editProduct'])->name('admin.editProduct');
        route::post('editProductConfirm/{id}', [adminController::class, 'editProductConfirm'])->name('admin.editProductConfirm');
        route::get('deleteProduct/{id}', [adminController::class, 'deleteProduct'])->name('admin.deleteProduct');
        route::get('orders', [adminController::class, 'orders'])->name('admin.orders');
        route::get('sales', [adminController::class, 'sales'])->name('admin.sales');
        route::post('action/{id}', [adminController::class, 'action'])->name('admin.action');
        route::post('orderDone/{id}', [adminController::class, 'orderDone'])->name('admin.orderDone');
        route::post('deleteCategory/{id}', [adminController::class, 'deleteCategory'])->name('admin.deleteCategory');
        

    });

    // route::get('shop', [CustomerController::class, 'shop'])->name('customer.shop');
    route::get('logout', [CustomerController::class, 'logout'])->name('logout');
    route::get('/', [CustomerController::class, 'index'])->name('customer.dashboard');
    route::get('shopHistory', [CustomerController::class, 'shopHistory'])->name('shop.history');
    












