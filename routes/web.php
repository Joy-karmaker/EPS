<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProgrammeController;
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
Route::post('/admin/store', [AdminController::class, 'store'])->name('admins.store');
//Admin
Route::middleware(['admin.auth:admin','is_admin'])->group(function(){
    Route::get('/admin/index', [AdminController::class, 'index'])->name('admins.index');



    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admins.profile');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::post('/admin/updateAdmin/{id}', [AdminController::class, 'updateAdmin'])->name('admins.updateAdmin');

    Route::get('/admin/allAdminProfile', [AdminController::class, 'allAdminProfile'])->name('admins.allAdminProfile');
    Route::get('/admin/allAdminActive/{id}', [AdminController::class, 'allAdminActive'])->name('admins.allAdminActive');
    Route::get('/admin/allAdminDelete/{id}', [AdminController::class, 'allAdminDelete'])->name('admins.allAdminDelete');
    Route::get('/programme/programmeList', [ProgrammeController::class, 'programmeList'])->name('programmes.programmeList');
    Route::get('/programme/createProgramme', [ProgrammeController::class, 'createProgramme'])->name('programmes.createProgramme');
    Route::post('/programme/storeProgramme', [ProgrammeController::class, 'saveProgramme'])->name('programmes.storeProgramme');
    Route::get('/programme/editProgramme/{id}', [ProgrammeController::class, 'editProgramme'])->name('programmes.editProgramme');
    Route::post('/programme/updateProgramme/{id}', [ProgrammeController::class, 'updateProgramme'])->name('programmes.updateProgramme');
    Route::get('/programme/deleteProgramme/{id}', [ProgrammeController::class, 'deleteProgramme'])->name('programmes.deleteProgramme');
});

Route::get('/users/login', [UsersController::class, 'login'])->name('users.login');
Route::post('/users/SaveLogin', [App\Http\Controllers\UsersController::class, 'SaveLogin'])->name('users.SaveLogin');
Route::post('/users/storeUser', [UsersController::class, 'storeUser'])->name('users.storeUser');
Route::get('/users/createUser', [UsersController::class, 'createUser'])->name('users.createUser');

Route::middleware(['auth:user','is_user'])->group(function(){

    Route::get('/users/userProfile/{id?}', [UsersController::class, 'userProfile'])->name('users.userProfile');
    Route::get('/users/editUser/{id}', [UsersController::class, 'editUser'])->name('users.editUser');
    Route::get('/users/allUserDelete/{id}', [UsersController::class, 'allUserDelete'])->name('users.allUserDelete');
    Route::get('/users/allUserActive/{id}', [UsersController::class, 'allUserActive'])->name('users.allUserActive');
    Route::post('/users/updateUser/{id}', [UsersController::class, 'updateUser'])->name('users.updateUser');
    Route::get('/users/allUserProfile', [UsersController::class, 'allUserProfile'])->name('users.allUserProfile');
});

Auth::routes();



