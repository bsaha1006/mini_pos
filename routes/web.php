<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserGroupController;
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

