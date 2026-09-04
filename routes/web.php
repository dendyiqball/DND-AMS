<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ProfileController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\AssetTransactionController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\ReportController;


/*
|--------------------------------------------------------------------------
| DND-AMS
|--------------------------------------------------------------------------
|
| Asset Management System
|
*/


//==========================================================================
// LOGIN
//==========================================================================

Route::get('/', function () {
    return redirect()->route('login');
});


Route::controller(LoginController::class)->group(function () {

    Route::get('/login', 'index')
        ->name('login');

    Route::post('/login', 'authenticate')
        ->name('login.process');

    Route::post('/logout', 'logout')
        ->name('logout');

});


//==========================================================================
// ADMIN AREA
//==========================================================================

Route::middleware('auth')->group(function () {


    //======================================================================
    // DASHBOARD
    //======================================================================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    //======================================================================
    // MASTER DATA
    //======================================================================

    Route::prefix('master')
        ->name('master-')
        ->group(function () {


            //==================================================================
            // MASTER PERUSAHAAN
            //==================================================================

            Route::resource(
                'companies',
                CompanyController::class
            );


            //==================================================================
            // MASTER KATEGORI
            //==================================================================

            Route::resource(
                'categories',
                CategoryController::class
            );


            //==================================================================
            // MASTER LOKASI
            //==================================================================

            Route::resource(
                'locations',
                LocationController::class
            );


            //==================================================================
            // MASTER EMPLOYEE
            //==================================================================

            Route::resource(
                'employees',
                EmployeeController::class
            );


            //==================================================================
            // MASTER ASSET
            //==================================================================

            Route::resource(
                'assets',
                AssetController::class
            );

        });


    //======================================================================
    // TRANSAKSI ASSET
    //======================================================================

    Route::resource(
        'asset-transactions',
        AssetTransactionController::class
    );


    //======================================================================
    // MAINTENANCE
    //======================================================================

    Route::resource(
        'maintenances',
        MaintenanceController::class
    );


    //======================================================================
    // REPORT
    //======================================================================

    // Halaman utama Report

    Route::get(
        '/reports',
        [ReportController::class, 'index']
    )->name('reports.index');


    //======================================================================
    // REPORT ASSET
    //======================================================================

    // Menampilkan daftar asset

    Route::get(
        '/reports/assets',
        [ReportController::class, 'assets']
    )->name('reports.assets');


    //======================================================================
    // EXPORT ASSET PDF
    //======================================================================

    Route::get(
        '/reports/assets/pdf',
        [ReportController::class, 'assetsPdf']
    )->name('reports.assets.pdf');


    //======================================================================
    // EXPORT ASSET EXCEL
    //======================================================================

    Route::get(
        '/reports/assets/excel',
        [ReportController::class, 'assetsExcel']
    )->name('reports.assets.excel');


    //======================================================================
    // REPORT TRANSACTIONS
    //======================================================================

    // Menampilkan daftar transaksi

    Route::get(
        '/reports/transactions',
        [ReportController::class, 'transactions']
    )->name('reports.transactions');


    //======================================================================
    // EXPORT TRANSACTIONS PDF
    //======================================================================

    Route::get(
        '/reports/transactions/pdf',
        [ReportController::class, 'transactionsPdf']
    )->name('reports.transactions.pdf');


    //======================================================================
    // EXPORT TRANSACTIONS EXCEL
    //======================================================================

    Route::get(
        '/reports/transactions/excel',
        [ReportController::class, 'transactionsExcel']
    )->name('reports.transactions.excel');


    //======================================================================
    // REPORT MAINTENANCE
    //======================================================================

    // Menampilkan daftar maintenance

    Route::get(
        '/reports/maintenances',
        [ReportController::class, 'maintenances']
    )->name('reports.maintenances');


    //======================================================================
    // EXPORT MAINTENANCE PDF
    //======================================================================

    Route::get(
        '/reports/maintenances/pdf',
        [ReportController::class, 'maintenancesPdf']
    )->name('reports.maintenances.pdf');


    //======================================================================
    // EXPORT MAINTENANCE EXCEL
    //======================================================================

    Route::get(
        '/reports/maintenances/excel',
        [ReportController::class, 'maintenancesExcel']
    )->name('reports.maintenances.excel');


    //======================================================================
    // PROFILE
    //======================================================================

    Route::get(
        '/profile',
        [ProfileController::class, 'index']
    )->name('profile');


    Route::put(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::put(
        '/profile/password',
        [ProfileController::class, 'password']
    )->name('profile.password');

});


//==========================================================================
// TEST ROUTE
//==========================================================================

Route::get('/test', function () {

    return "Laravel Berjalan";

});


Route::get('/abc123', function () {

    return "ABC BERHASIL";

});