<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BillController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Client\BookingController;
use App\Http\Controllers\Client\DetailController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//client
Route::prefix('/')->group(function () {
    Route::get('/',[HomeController::class,'home',])->name('client.home');
    Route::get('/signin', function () {
        return view('client/signin');
    })->name('client.signin');;
    Route::get('/signup', function () {
        return view('client/signup');
    })->name('client.signup');;
    Route::get('/about', function () {
        return view('client/about');
    })->name('client.about');
    Route::get('/contact', function () {
        return view('client/contact');
    });
    Route::get('/rooms',[\App\Http\Controllers\Client\RoomController::class,'show'])->name('client.rooms');
    Route::get('/promotions', [\App\Http\Controllers\Client\DiscountController::class,'index'])->name('client.promotions');
    Route::get('/promotion-detail/{id}',[\App\Http\Controllers\Client\DiscountController::class,'detail'])->name('client.promotion-detail');
    Route::get('/detail/{id}',[DetailController::class,'detail'])->name('client.detail');
    Route::get('/contact', function () {
        return view('client/contact');
    })->name('client.contact');
    Route::get('/type/{id}',[HomeController::class,'type'])->name('client.room_type');
    Route::match(['GET','POST'],'/booking',[BookingController::class,'store'])->name('client.booking');
    Route::get('/send',[BookingController::class,'testMail']);
});


//admin
Route::match(['GET','POST'],'/login',[LoginController::class,'login'])->name('login');
Route::middleware(['auth'])->group(function() {
    Route::prefix('/ad')->group(function() {
        Route::get('/', function () {
            return view('admin/dashboard');
        })->name('dashboard');
        Route::match(['GET'],'/logout',[LoginController::class,'logout'])->name('logout');
        Route::prefix('/type')->group(function() {
            Route::get('/',[TypeController::class,'index'])->name('type.index');
            Route::match(['GET','POST'],'/create',[TypeController::class,'create'])->name('type.create');
            Route::match(['GET','POST'],'/edit/{id}',[TypeController::class,'edit'])->name('type.edit');
            Route::get('/delete/{id}', [TypeController::class, 'delete'])->name('type.delete');
        });
        Route::prefix('/room')->group(function() {
            Route::get('/',[RoomController::class,'index'])->name('room.index');
            Route::match(['GET','POST'],'/create',[RoomController::class,'create'])->name('room.create');
            Route::match(['GET','POST'],'/edit/{id}',[RoomController::class,'edit'])->name('room.edit');
            Route::get('/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');
        });
        Route::prefix('/banner')->group(function() {
            Route::get('/',[BannerController::class,'index'])->name('banner.index');
            Route::match(['GET','POST'],'/create',[BannerController::class,'create'])->name('banner.create');
            Route::match(['GET','POST'],'/edit/{id}',[BannerController::class,'edit'])->name('banner.edit');
            Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('banner.delete');
        });
        Route::prefix('/discount')->group(function() {
            Route::get('/',[DiscountController::class,'index'])->name('discount.index');
            Route::match(['GET','POST'],'/create',[DiscountController::class,'create'])->name('discount.create');
            Route::match(['GET','POST'],'/edit/{id}',[DiscountController::class,'edit'])->name('discount.edit');
            Route::get('/delete/{id}', [DiscountController::class, 'delete'])->name('discount.delete');
        });
        Route::middleware(['check.admin'])->group(function() {
            Route::prefix('/user')->group(function() {
                Route::get('/',[UserController::class,'index'])->name('user.index');
                Route::match(['GET','POST'],'/create',[UserController::class,'create'])->name('user.create');
                Route::match(['GET','POST'],'/edit/{id}',[UserController::class,'edit'])->name('user.edit');
                Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
            });
        });
        Route::get('/profile',[ProfileController::class,'index'])->name('profile');
        Route::prefix('/bill')->group(function() {
            Route::get('/',[BillController::class,'index'])->name('bill.index');
            Route::match(['GET','POST'],'/detail/{id}',[BillController::class,'detail'])->name('bill.detail');
        });
    });
});

