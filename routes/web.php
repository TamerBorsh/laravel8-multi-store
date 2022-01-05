<?php

use App\Http\Controllers\Account\AdminController;
use App\Http\Controllers\Account\SellerController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Front\ShopController;
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
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function(){
    
    define('paginate_number', 5);


    Route::group(['prefix'=>'auth'], function()
    {
        Route::get('{guard}/login', [LoginController::class, 'index'])->name('login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('auth.authenticate');
        Route::get('logout', [LoginController::class, 'logout'])->name('auth.logout');
    });


    Route::group(['prefix'=>'dashboard'], function()
    {
        
        require __DIR__.('/spatie.php');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

        //Accounts
        Route::resource('admins', AdminController::class);
        Route::resource('sellers', SellerController::class);
        Route::resource('users', UserController::class);


    });
    Route::group(['prefix'=>'/'], function()
    {
        Route::get('/', [IndexController::class, 'index'])->name('front.index');
        
        Route::get('product', [ShopController::class, 'index'])->name('front.shop');
        Route::get('product/{slug}', [ShopController::class, 'show'])->name('front.product.show');

    });
 

});