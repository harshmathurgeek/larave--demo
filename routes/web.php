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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'guest'], function () {

    Route::get('/login', [authController::class, ('indexLogin')])->name("login");
    Route::post('/login', [authController::class, 'login'])->name("login");
    Route::get('/register', [authController::class, ('indexRegister')])->name("register");
    Route::post('/register', [authController::class, ('register')])->name("register");
});
Route::get('/task/show', [TaskController::class, ('show')])->name('show-task');
Route::get('/task/detail', [TaskController::class, ('detail')])->name('detail-task');

//make group
Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard',[AuthController::class, ('dashboard')]);
    Route::get('task/add', [TaskController::class, ('index')]);
    Route::post('/task/add', [TaskController::class, ('add')])->name('add');
    Route::get('/task/edit', [TaskController::class, ('index')]);
    Route::get('/task/delete', [TaskController::class, ('delete')]);
    Route::post('/task/update', [TaskController::class, ('update')])->name('update');
    Route::get('/task/my-task', [TaskController::class, ('myTask')]);
    Route::post('/make-public', [TaskController::class, ('makePublic')]); //changestatus
    Route::post('/comment/post', [TaskController::class, ('postComment')]);
});
