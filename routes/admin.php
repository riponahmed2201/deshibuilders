<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\BankCash\BankCashController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\Ledger\LedgerGroupController;
use App\Http\Controllers\Backend\Ledger\LedgerNameController;
use App\Http\Controllers\Backend\Ledger\LedgerTypeController;
use App\Http\Controllers\Backend\Project\ProjectController;
use App\Http\Controllers\Backend\Voucher\CreditVoucherController;
use App\Http\Controllers\Backend\Voucher\DebitVoucherController;
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

    //Bank Cash
    Route::group(['prefix' => 'admin/bank-cash'], function () {
        Route::get('/index', [BankCashController::class, 'index'])->name('admin.bankCash.index');
        Route::get('/create', [BankCashController::class, 'create'])->name('admin.bankCash.create');
        Route::post('/store', [BankCashController::class, 'store'])->name('admin.bankCash.store');
        Route::get('/{id}/edit', [BankCashController::class, 'edit'])->name('admin.bankCash.edit');
        Route::put('/{id}/update', [BankCashController::class, 'update'])->name('admin.bankCash.update');
        Route::put('/update-status', [BankCashController::class, 'updateStatus'])->name('admin.bankCash.update.status');
    });

    // Ledger Type, Group and Name
    Route::group(['prefix' => 'admin/ledger'], function () {

        //Ledger Type
        Route::group(['prefix' => 'ledger-type'], function () {
            Route::get('/index', [LedgerTypeController::class, 'index'])->name('admin.ledgerType.index');
            Route::get('/create', [LedgerTypeController::class, 'create'])->name('admin.ledgerType.create');
            Route::post('/store', [LedgerTypeController::class, 'store'])->name('admin.ledgerType.store');
            Route::get('/{id}/edit', [LedgerTypeController::class, 'edit'])->name('admin.ledgerType.edit');
            Route::put('/{id}/update', [LedgerTypeController::class, 'update'])->name('admin.ledgerType.update');
            Route::put('/update-status', [LedgerTypeController::class, 'updateStatus'])->name('admin.ledgerType.update.status');
        });

        //Ledger Group
        Route::group(['prefix' => 'ledger-group'], function () {
            Route::get('/index', [LedgerGroupController::class, 'index'])->name('admin.ledgerGroup.index');
            Route::get('/create', [LedgerGroupController::class, 'create'])->name('admin.ledgerGroup.create');
            Route::post('/store', [LedgerGroupController::class, 'store'])->name('admin.ledgerGroup.store');
            Route::get('/{id}/edit', [LedgerGroupController::class, 'edit'])->name('admin.ledgerGroup.edit');
            Route::put('/{id}/update', [LedgerGroupController::class, 'update'])->name('admin.ledgerGroup.update');
            Route::put('/update-status', [LedgerGroupController::class, 'updateStatus'])->name('admin.ledgerGroup.update.status');
        });

        //Ledger Name
        Route::group(['prefix' => 'ledger-name'], function () {
            Route::get('/index', [LedgerNameController::class, 'index'])->name('admin.ledgerName.index');
            Route::get('/create', [LedgerNameController::class, 'create'])->name('admin.ledgerName.create');
            Route::post('/store', [LedgerNameController::class, 'store'])->name('admin.ledgerName.store');
            Route::get('/{id}/edit', [LedgerNameController::class, 'edit'])->name('admin.ledgerName.edit');
            Route::put('/{id}/update', [LedgerNameController::class, 'update'])->name('admin.ledgerName.update');
            Route::put('/update-status', [LedgerNameController::class, 'updateStatus'])->name('admin.ledgerName.update.status');
        });

    });

    //Voucher Credit and Debit
    Route::group(['prefix' => 'admin/voucher'], function () {

        //Credit Voucher
        Route::group(['prefix' => 'credit'], function () {
            Route::get('/index', [CreditVoucherController::class, 'index'])->name('admin.creditVoucher.index');
            Route::get('/create', [CreditVoucherController::class, 'create'])->name('admin.creditVoucher.create');
            Route::post('/store', [CreditVoucherController::class, 'store'])->name('admin.creditVoucher.store');
            Route::get('/{id}/edit', [CreditVoucherController::class, 'edit'])->name('admin.creditVoucher.edit');
            Route::put('/{id}/update', [CreditVoucherController::class, 'update'])->name('admin.creditVoucher.update');
            Route::put('/update-status', [CreditVoucherController::class, 'updateStatus'])->name('admin.creditVoucher.update.status');
        });

        //Debit Voucher
        Route::group(['prefix' => 'debit'], function () {
            Route::get('/index', [DebitVoucherController::class, 'index'])->name('admin.debitVoucher.index');
            Route::get('/create', [DebitVoucherController::class, 'create'])->name('admin.debitVoucher.create');
            Route::post('/store', [DebitVoucherController::class, 'store'])->name('admin.debitVoucher.store');
            Route::get('/{id}/edit', [DebitVoucherController::class, 'edit'])->name('admin.debitVoucher.edit');
            Route::put('/{id}/update', [DebitVoucherController::class, 'update'])->name('admin.debitVoucher.update');
            Route::put('/update-status', [DebitVoucherController::class, 'updateStatus'])->name('admin.debitVoucher.update.status');
        });
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
