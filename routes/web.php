<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/admin/login', [AdminController::class, 'login'])->name('admins.login');
Route::post('/admin/SaveLogin', [AdminController::class, 'SaveLogin'])->name('admin.SaveLogin');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admins.create');
//Admin
Route::middleware(['admin.auth:admin','is_admin'])->group(function(){
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admins.index');


    Route::post('/admin/store', [AdminController::class, 'store'])->name('admins.store');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admins.profile');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::post('/admin/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admins.updateAdmin');
    Route::get('/admin/allAdminProfile', [UsersController::class, 'allAdminProfile'])->name('users.allAdminProfile');
});

//users
Route::get('/users/login', [UsersController::class, 'login'])->name('users.login');
Route::post('/users/SaveLogin', [UsersController::class, 'SaveLogin'])->name('users.SaveLogin');
Route::get('/users/userProfile/{id?}', [App\Http\Controllers\UsersController::class, 'userProfile'])->name('users.userProfile');
Route::get('/users/createUser', [App\Http\Controllers\UsersController::class, 'createUser'])->name('users.createUser');
Route::post('/users/storeUser', [App\Http\Controllers\UsersController::class, 'storeUser'])->name('users.storeUser');
// Route::post('/users/create', [App\Http\Controllers\UsersController::class, 'createUser'])->name('users.create');
Route::get('/users/editUser/{id}', [App\Http\Controllers\UsersController::class, 'editUser'])->name('users.editUser');
Route::get('/users/allUserDelete/{id}', [App\Http\Controllers\UsersController::class, 'allUserDelete'])->name('users.allUserDelete');
Route::get('/users/allUserActive/{id}', [App\Http\Controllers\UsersController::class, 'allUserActive'])->name('users.allUserActive');
Route::post('/users/updateUser/{id}', [App\Http\Controllers\UsersController::class, 'updateUser'])->name('users.updateUser');
// Route::post('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/users/allUserProfile', [App\Http\Controllers\UsersController::class, 'allUserProfile'])->name('users.allUserProfile');
//


Auth::routes();



