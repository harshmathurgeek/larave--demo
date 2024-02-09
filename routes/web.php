<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\TaskController;
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

Route::controller(AuthController::class)->group(function () {
    Route::get('/logout', 'logout');
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', 'indexLogin');
        Route::post('/login', 'login')->name("login");
        Route::get('/register', 'indexRegister');
        Route::post('/register', 'register')->name("register");
    });
});
Route::group(['middleware' => 'guest'], function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'indexLogin');
        Route::post('/login', 'login')->name("login");
        Route::get('/register', 'indexRegister');
        Route::post('/register', 'register')->name("register");
    });
});

//auth routes 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::controller(TaskController::class)->group(function () {
        Route::get('index', 'index');
        Route::get('add', 'edit');
        Route::post('add', 'store')->name('add');
        Route::get('edit', 'edit');
        Route::get('delete', 'delete');
        Route::post('update', 'store')->name('update');
        Route::get('detail', 'detail');
        Route::post('changestatus', 'chnageStatus'); //changestatus
        Route::post('comment/post', 'postComment');
    });
});
//public routes
Route::get('/public', [TaskController::class, 'index']);
