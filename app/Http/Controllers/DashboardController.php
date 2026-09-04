<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use App\Models\Maintenance;
use App\Models\AssetTransaction;
use App\Models\Employee;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman Dashboard
     */
    public function index()
    {
        // =====================================================
        // STATISTIK MASTER DATA
        // =====================================================

        $totalAssets = Asset::count();

        $totalCompanies = Company::count();

        $totalCategories = Category::count();

        $totalLocations = Location::count();

        $totalEmployees = Employee::count();

        $totalMaintenances = Maintenance::count();


        // =====================================================
        // STATISTIK STATUS ASSET
        // =====================================================

        $totalReady = Asset::where('status', 'Ready')->count();

        $totalCheckout = Asset::where('status', 'Checked Out')->count();

        $totalMaintenanceAsset = Asset::where('status', 'Maintenance')->count();

        $totalReturned = Asset::where('status', 'Returned')->count();

        $totalRetired = Asset::where('status', 'Retired')->count();


        // =====================================================
        // ASSET TERBARU
        // =====================================================

        $latestAssets = Asset::with([
            'company',
            'category',
            'location',
            'employee'
        ])
        ->latest()
        ->take(5)
        ->get();


        // =====================================================
        // TRANSAKSI TERBARU
        // =====================================================

        $latestTransactions = AssetTransaction::with('asset')
            ->latest()
            ->take(5)
            ->get();


        // =====================================================
        // MAINTENANCE TERBARU
        // =====================================================

        $latestMaintenances = Maintenance::with('asset')
            ->latest()
            ->take(5)
            ->get();


        // =====================================================
        // KIRIM DATA KE DASHBOARD
        // =====================================================

        return view('dashboard.index', compact(

            // Master Data
            'totalAssets',
            'totalCompanies',
            'totalCategories',
            'totalLocations',
            'totalEmployees',
            'totalMaintenances',

            // Status Asset
            'totalReady',
            'totalCheckout',
            'totalMaintenanceAsset',
            'totalReturned',
            'totalRetired',

            // Data terbaru
            'latestAssets',
            'latestTransactions',
            'latestMaintenances'

        ));
    }
}