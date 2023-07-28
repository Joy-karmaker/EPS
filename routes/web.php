<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [HomeController::class, 'index'])->name('admin.home')->middleware('is_admin');
Route::get('/dashboard', [DashboardController::class, 'dashboard']);
//Route::get('/login', [LoginController::class, 'login']);
Route::get('index', [AdminController::class, 'index'])->name('admins.admin_profile');

//users
Route::get('/users/userProfile', [App\Http\Controllers\UsersController::class, 'userProfile'])->name('users.userProfile');
Route::get('/users/createUser', [App\Http\Controllers\UsersController::class, 'createUser'])->name('users.createUser');
Route::post('/users/storeUser', [App\Http\Controllers\UsersController::class, 'storeUser'])->name('users.storeUser');
// Route::post('/users/create', [App\Http\Controllers\UsersController::class, 'createUser'])->name('users.create');
Route::get('/users/editUser/{userId}', [App\Http\Controllers\UsersController::class, 'editUser'])->name('users.editUser');
Route::post('/users/updateUser', [App\Http\Controllers\UsersController::class, 'updateUser'])->name('users.updateUser');
// Route::post('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');

//


Route::resource('admins', AdminController::class);

Auth::routes();



