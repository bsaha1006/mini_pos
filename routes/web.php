<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventsController;
use App\Http\Controllers\UserGroupController;
use App\Http\Controllers\UserSalesController;
use App\Models\Product;
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

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login/authenticate',[LoginController::class,'authenticate'])->name('login.auth');


Route::group(['middleware' => 'auth'],function(){

    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    
    //Users
    Route::resource('users',Usercontroller::class);

    Route::get('users/{id}/sales',[UserEventsController::class,'sales'])->name('users.sales');
    Route::get('users/{id}/purchase',[UserEventsController::class,'purchase'])->name('users.purchase');

    Route::get('users/{id}/payment',[UserEventsController::class,'payment'])->name('users.payment');

    Route::post('users/{id}/payment',[UserEventsController::class,'storePayment'])->name('users.storePayment');
    
    Route::delete('users/{id}/payment/{pid}',[UserEventsController::class,'destroyPayment'])->name('users.destroyPayment');

    Route::get('users/{id}/receipts',[UserEventsController::class,'receipts'])->name('users.receipts');
    Route::post('users/{id}/receipts',[UserEventsController::class,'saveReceipts'])->name('users.saveReceipts');

    Route::delete('users/{id}/receipts/{rid}',[UserEventsController::class,'destroyReceipts'])->name('users.destroyReceipts');
    
    //user groups
    Route::get('groups',[UserGroupController::class,'index'])->name('groups');
    Route::get('groups/create',[UserGroupController::class,'create']);
    Route::post('groups/',[UserGroupController::class,'store'])->name('groups.store');
    Route::delete('groups/{id}',[UserGroupController::class,'destroy'])->name('groups.destroy');
    
    //categories
    Route::resource('categories',CategoryController::class);
    
    //products
    Route::resource('products',ProductController::class);
    
});

