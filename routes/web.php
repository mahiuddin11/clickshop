<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;




Auth::routes();



Route::get('/', [HomeController::class,'index'])->name('home.index');
Route::get('/shop',[ShopController::class,'index'])->name('shop.index');
Route::get('/shop/{product_slug}',[ShopController::class,"product_details"])->name('shop.product.details');

Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::get('/about',[AboutController::class,'index'])->name('about.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');


Route::middleware(['auth'])->group(function()
{
    Route::get('/account-deshbord',[UserController::class,'index'])->name('user.index');
});


Route::middleware(['auth',AuthAdmin::class])->group(function()
{
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');

    //brand route all link

    Route::get('/admin/brands',[AdminController::class,'brand'])->name('admin.brands');
    Route::get('/admin/brand/add',[AdminController::class,'brandAdd'])->name('admin.brand.add');
    Route::post('/admin/brand/stor',[AdminController::class,'brand_stor'])->name('admin.brand.stor');
    Route::get('/admin/brand/edit/{id}',[AdminController::class, 'brand_edit'])->name('admin.brand.edit');
    Route::post('/admin/brand/update',[AdminController::class,'brand_update'])->name('admin.brand.update');
    Route::delete('/admin/brand/delete/{id}',[AdminController::class, 'brand_delete'])->name('admin.brand.delete');


    // catagories route link

    Route::get('/admin/catagories',[AdminController::class,'catagories'])->name('admin.catagoris');
    Route::get('/admin/catagories/add',[AdminController::class,'catagoriesAdd'])->name('admin.catagories.add');
    Route::post('/admin/catagories/store',[AdminController::class,'catagories_store'])->name('admin.catagorie.store');
    Route::get('/admin/catagorie/edit/{id}',[AdminController::class,'catagorie_edit'])->name('admin.catagorie.edit');
    Route::put('/admin/catagorie/update/',[AdminController::class,'catagorie_update'])->name('admin.catagorie.update');
    Route::delete('/admin/catagorie/delete/{id}',[AdminController::class,'catagorie_delete'])->name('admin.catagorie.delete');


    // product Route Link
    Route::get('/admin/product',[ProductController::class,'index'])->name('admin.productlist');
    Route::get('/admin/product/create',[ProductController::class, 'productCreate'])->name('admin.product.create');
    Route::post('/admin/product/store',[ProductController::class, 'store'])->name('admin.product.store');
    Route::get('/admin/product/view/{id}',[ProductController::class,function(){
        return 'Coming Soon ';
    }])->name('admin.product.view');

    Route::get('/admin/product/edit/{id}',[ProductController::class,'edit'])->name('admin.product.edit');
    Route::put('/admin/product/update/{id}',[ProductController::class,'update'])->name('admin.product.update');
    Route::delete('/admin/product/delete/{id}',[ProductController::class,'product_delete'])->name('admin.product.delete');




    //setting route link
    Route::get('/admin/setting',[AdminController::class, 'company_setting'])->name('admin.setting');
});
