<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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



Route::get('/', [LoginController::class,'showLogin'])->name('show.login');


Route::post('/login',[LoginController::class,'doLogin'])->name('auth');
Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::middleware(['auth:web'])->group(function () {
    Route::resource('/task', TaskController::class);
    Route::get('/task/checkstatus/{id}',[TaskController::class,'changeStatus'])->name('changestatus');

});


Route::resource('/register', RegisterController::class);

Route::get('/deadline',[TaskController::class,'deadLineMail']);

