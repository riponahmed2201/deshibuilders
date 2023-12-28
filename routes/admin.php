<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use Illuminate\Support\Facades\Route;


//Login
Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('admin.showLoginForm');
Route::post('login/check', [LoginController::class, 'login'])->name('admin.login');

Route::get('/admin/dashboard', function () {
    return view('backend.dashboard.admin-dashboard');
});
