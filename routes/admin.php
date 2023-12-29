<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Project\ProjectController;
use Illuminate\Support\Facades\Route;


//Login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('login/check', [LoginController::class, 'login'])->name('admin.login');

//Private Routes
Route::middleware(['preventBackHistory', 'admin'])->group(function () {

    //Dashboard
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    //Logout
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');

    //Project
    Route::group(['prefix' => 'admin/project'], function () {
        Route::get('/index', [ProjectController::class, 'index'])->name('admin.project.index');
        Route::get('/create', [ProjectController::class, 'create'])->name('admin.project.create');
        Route::post('/store', [ProjectController::class, 'store'])->name('admin.project.store');
        Route::get('/{project_id}/edit', [ProjectController::class, 'edit'])->name('admin.project.edit');
        Route::put('/{project_id}/update', [ProjectController::class, 'update'])->name('admin.project.update');
        Route::put('/update-status', [ProjectController::class, 'updateStatus'])->name('admin.project.update.status');
    });

//    //password change
//    Route::get('/user-password-change', [PasswordChangeController::class, 'showPasswordChangeForm'])->name('user.showPasswordChangeForm');
//    Route::put('/user-password/update',  [PasswordChangeController::class, 'updateUserPassword'])->name('user.updateUserPassword');
//
//    //Access Control Routes
//    Route::group(['prefix' => 'access-control'], function () {
//
//        //Role
//        Route::controller(RoleController::class)->group(function () {
//            Route::get('/role/index', 'index')->name('role.index');
//            Route::get('/role/create', 'create')->name('role.create');
//            Route::post('/role/store', 'store')->name('role.store');
//            Route::get('/role/{role_id}/edit', 'edit')->name('role.edit');
//            Route::put('/role/{role_id}/update', 'update')->name('role.update');
//            Route::put('/role/update-status', 'updateStatus')->name('role.update.status');
//        });
//
//        //Admin User
//        Route::controller(UserController::class)->group(function () {
//            Route::get('/user/index', 'index')->name('user.index');
//            Route::get('/user/create', 'create')->name('user.create');
//            Route::post('/user/store', 'store')->name('user.store');
//            Route::get('/user/{user_id}/edit', 'edit')->name('user.edit');
//            Route::put('/user/{user_id}/update', 'update')->name('user.update');
//            Route::put('/user/update-status', 'updateStatus')->name('user.update.status');
//        });
//    });
//
});
