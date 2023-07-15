<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
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
})->name('start');

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
//Route::get('/login', [LoginController::class, 'login']);
Route::get('index', [AdminController::class, 'index'])->name('admins.admin_profile');


Route::resource('admins', AdminController::class);

Auth::routes();
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
