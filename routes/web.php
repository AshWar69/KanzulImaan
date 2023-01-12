<?php

use App\Http\Controllers\EcommController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GeneralController;
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

Route::get('/', [FrontController::class, 'index']);



Route::get('Dashboard', function () {
    return view('backend.pages.admin');
});

Route::get('AddProduct', function () {
    return view('backend.pages.ecommerce.addProduct');
});

Route::get('AddOrganisation', function(){
    return view('backend.pages.addOrg');
});

Route::get('AddBanner', function(){
    return view('backend.pages.addBanner');
});

Route::get('AddSocialLinks', function(){
    return view('backend.pages.addSocial');
});

Route::post('saveProduct',[EcommController::class, 'storeProduct'])->name('saveProduct');
Route::get('product/destroy/{id}', [EcommController::class, 'destroyProduct']);
Route::get('edit/{id}/product', [EcommController::class, 'editProduct']);
Route::post('editProduct',[EcommController::class, 'updateProduct'])->name('editProduct');
Route::get('ProductsShowcase', [EcommController::class, 'showProducts']);
Route::get('ShowOrders', [EcommController::class, 'viewOrder']);
Route::get('viewDetail/order_no={id}', [EcommController::class, 'OrderDetails']);
Route::get('ManageOrganisation', [GeneralController::class, 'showCompanies']);
Route::post('saveCompany', [GeneralController::class, 'storeCompany'])->name('saveCompany');
Route::get('company/edit/{id}', [GeneralController::class, 'editCompany']);
Route::post('editCompany', [GeneralController::class, 'updateCompany'])->name('editCompany');
Route::get('ManageBanner', [GeneralController::class, 'showBanners']);
Route::post('saveBanner', [GeneralController::class, 'storeBanner'])->name('saveBanner');
Route::get('banner/edit/{id}', [GeneralController::class, 'editBanner']);
Route::post('editBanner', [GeneralController::class, 'updateBanner'])->name('editBanner');
Route::get('banner/destroy/{id}', [GeneralController::class, 'destroyBanner']);
Route::get('ManageSocialPlatform', [GeneralController::class, 'showSocials']);
Route::post('saveSocial', [GeneralController::class, 'storeSocial'])->name('saveSocial');
Route::get('social/edit/{id}', [GeneralController::class, 'editSocial']);
Route::post('editSocial', [GeneralController::class, 'updateSocial'])->name('editSocial');
Route::get('social/destroy/{id}', [GeneralController::class, 'destroySocial']);
Route::get('OurLibrary', []);

Auth::routes();
Route::middleware(['auth','ecomm'])->group(function(){
    Route::get('QuranStore', [EcommController::class, 'showQuranStore']);
    Route::get('Product/id={id}', [EcommController::class, 'showSingleProduct']);
    Route::get('removeItem/{id}', [EcommController::class, 'removeCartItems']);
    Route::get('ViewCart', [EcommController::class, 'viewCart']);
    Route::post('addtocart', [EcommController::class, 'AddToCart'])->name('addtocart');
    Route::post('AddCart', [EcommController::class, 'DirectAddcart'])->name('AddCart');
    Route::post('changeQuantity', [EcommController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('Checkout', [EcommController::class, 'viewCheckout']);
    Route::post('PlaceOrder', [EcommController::class, 'placeOrder'])->name('PlaceOrder');
    Route::get('OrderReceived/order_no={id}', [EcommController::class, 'orderReceived']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
