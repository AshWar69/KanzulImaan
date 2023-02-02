<?php

use App\Http\Controllers\EcommController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\LibraryController;
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
//Route::view('{slug}','pages.library.qr_read');
Route::get('books/name={slug}', [ LibraryController::class , 'showBook'])->name('books.name=');
Route::get('books/category={slug}', [ LibraryController::class , 'showCategoryBooks'])->name('books.category=');
Route::post('read/book', [ LibraryController::class , 'readBook'])->name('read.book');
Route::get('Kanzuliman/Bookslibrary', [LibraryController::class , 'index'])->name('Kanzuliman.Bookslibrary');

Auth::routes();
Route::middleware(['auth','ecomm'])->group(function(){
    Route::get('Kanzuliman/QuranStore', [EcommController::class, 'showQuranStore']);
    Route::get('Product/id={id}', [EcommController::class, 'showSingleProduct']);
    Route::get('removeItem/{id}', [EcommController::class, 'removeCartItems']);
    Route::get('Kanzuliman/ViewCart', [EcommController::class, 'viewCart']);
    Route::post('addtocart', [EcommController::class, 'AddToCart'])->name('addtocart');
    Route::post('AddCart', [EcommController::class, 'DirectAddcart'])->name('AddCart');
    Route::post('changeQuantity', [EcommController::class, 'changeQuantity'])->name('changeQuantity');
    Route::get('Kanzuliman/Checkout', [EcommController::class, 'viewCheckout']);
    Route::post('PlaceOrder', [EcommController::class, 'placeOrder'])->name('PlaceOrder');
    Route::get('OrderReceived/order_no={id}', [EcommController::class, 'orderReceived']);
});

Route::prefix('admin')->group(function(){
    Route::middleware('admin.guest:admin')->group(function(){
        Route::view('login', 'admin.login')->name('admin.login');
        Route::post('authenticate', [GeneralController::class, 'Authenticate'])->name('admin.authenticate');
    });
    Route::middleware('admin.auth')->group(function(){
        Route::get('Dashboard', function () {
            return view('backend.pages.admin');
        })->name('admin.Dashboard');

        Route::get('AddProduct', function () {
            return view('backend.pages.ecommerce.addProduct');
        })->name('admin.AddProduct');

        Route::get('AddOrganisation', function(){
            return view('backend.pages.addOrg');
        })->name('admin.Organisation');

        Route::get('AddBanner', function(){
            return view('backend.pages.addBanner');
        })->name('admin.AddBanner');

        Route::get('AddSocialLinks', function(){
            return view('backend.pages.addSocial');
        })->name('admin.SocialLinks');

        Route::post('saveProduct',[EcommController::class, 'storeProduct'])->name('admin.saveProduct');
        Route::get('product/destroy/{id}', [EcommController::class, 'destroyProduct']);
        Route::get('edit/{id}/product', [EcommController::class, 'editProduct']);
        Route::post('editProduct',[EcommController::class, 'updateProduct'])->name('admin.editProduct');
        Route::get('ProductsShowcase', [EcommController::class, 'showProducts'])->name('admin.ProductsShowcase');
        Route::get('ShowOrders', [EcommController::class, 'viewOrder'])->name('admin.ShowOrders');
        Route::get('viewDetail/order_no={id}', [EcommController::class, 'OrderDetails'])->name('admin.viewDetail.order_no');;
        Route::get('ManageOrganisation', [GeneralController::class, 'showCompanies'])->name('admin.ManageOrganasitaion');
        Route::post('saveCompany', [GeneralController::class, 'storeCompany'])->name('admin.saveCompany');
        Route::get('company/edit/{id}', [GeneralController::class, 'editCompany']);
        Route::post('editCompany', [GeneralController::class, 'updateCompany'])->name('admin.editCompany');
        Route::get('ManageBanner', [GeneralController::class, 'showBanners'])->name('admin.ManageBanner');
        Route::post('saveBanner', [GeneralController::class, 'storeBanner'])->name('admin.saveBanner');
        Route::get('banner/edit/{id}', [GeneralController::class, 'editBanner']);
        Route::post('editBanner', [GeneralController::class, 'updateBanner'])->name('admin.editBanner');
        Route::get('banner/destroy/{id}', [GeneralController::class, 'destroyBanner']);
        Route::get('ManageSocialPlatform', [GeneralController::class, 'showSocials'])->name('admin.ManageSocialPlatform');
        Route::post('saveSocial', [GeneralController::class, 'storeSocial'])->name('admin.saveSocial');
        Route::get('social/edit/{id}', [GeneralController::class, 'editSocial']);
        Route::post('editSocial', [GeneralController::class, 'updateSocial'])->name('admin.editSocial');
        Route::get('social/destroy/{id}', [GeneralController::class, 'destroySocial']);

        // ============================= Library Backend Part =========================
            Route::get('ShowCategories', [LibraryController::class, 'showCategories'])->name('admin.ShowCategories');
            Route::post('saveCategory', [LibraryController::class, 'storeCategory'])->name('admin.saveCategory');
            Route::post('saveSubCategory', [LibraryController::class, 'storeSubCategory'])->name('admin.saveSubCategory');
            Route::post('delCategory', [LibraryController::class, 'destroyCategory'])->name('admin.delCategory');

            Route::get('LibraryShowcase', [LibraryController::class, 'showLibrary'])->name('admin.LibraryShowcase');
            Route::get('AddBook', [LibraryController::class, 'addBook'])->name('admin.AddBook');
            Route::post('saveBook', [LibraryController::class, 'storeBook'])->name('admin.saveBook');
            Route::get('edit/{id}/book', [LibraryController::class, 'editBook']);
            Route::post('updateBook', [LibraryController::class, 'updateBook'])->name('admin.updateBook');
            Route::get('delBook/{id}', [LibraryController::class, 'destroyBook'])->name('admin.delBook');
            Route::get('showBookLang/{id}', [LibraryController::class, 'showBookLang'])->name('admin.showBookLang');
            Route::get('AddBookLang/{id}', [LibraryController::class, 'addBookLang'])->name('admin.AddBookLang');
            Route::post('saveLanguage', [LibraryController::class, 'storeBookLanguage'])->name('admin.saveLanguage');
            Route::get('language/destroy/{id}', [LibraryController::class, 'destroyLanguage']);
            Route::get('showBookImages/{id}', [LibraryController::class, 'showBookImage'])->name('admin.showBookImages');
            Route::get('AddBookImage/{id}', [LibraryController::class, 'addBookImage'])->name('admin.AddBookImage');
            Route::post('uploadBookImage', [LibraryController::class, 'storeBookImage'])->name('admin.uploadBookImage');
            Route::get('book_image/destroy/{id}', [LibraryController::class, 'destroyBookImage']);
        // ============================= Library Backend Part =========================

    });
});

    //Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
