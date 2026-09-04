<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetTransaction;
use App\Models\Maintenance;

use Barryvdh\DomPDF\Facade\Pdf;

use App\Exports\AssetsExport;
use App\Exports\MaintenancesExport;

use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    /**
     * =========================================================
     * HALAMAN UTAMA REPORT
     * =========================================================
     */
    public function index()
    {
        $totalAssets = Asset::count();

        $readyAssets = Asset::where('status', 'Ready')->count();

        $checkedOutAssets = Asset::where('status', 'Checked Out')->count();

        $maintenanceAssets = Asset::where('status', 'Maintenance')->count();

        $retiredAssets = Asset::where('status', 'Retired')->count();

        $totalTransactions = AssetTransaction::count();

        $totalMaintenances = Maintenance::count();

    $processMaintenances = Maintenance::where('status', 'In Progress')->count();

    $finishedMaintenances = Maintenance::where('status', 'Completed')->count();

        return view('report.index', compact(
            'totalAssets',
            'readyAssets',
            'checkedOutAssets',
            'maintenanceAssets',
            'retiredAssets',
            'totalTransactions',
            'totalMaintenances',
            'processMaintenances',
            'finishedMaintenances'
        ));
    }


    /**
     * =========================================================
     * LAPORAN ASSET
     * =========================================================
     */
    public function assets()
    {
        $assets = Asset::with([
            'company',
            'category',
            'location'
        ])
        ->orderBy('asset_name')
        ->get();

        return view('report.assets', compact('assets'));
    }


    /**
     * =========================================================
     * EXPORT ASSET KE PDF
     * =========================================================
     */
    public function assetsPdf()
    {
        $assets = Asset::with([
            'company',
            'category',
            'location'
        ])
        ->orderBy('asset_name')
        ->get();


        $pdf = Pdf::loadView(
            'report.pdf.assets',
            compact('assets')
        );


        /*
        |--------------------------------------------------------------------------
        | Ukuran PDF
        |--------------------------------------------------------------------------
        |
        | A4 Landscape supaya tabel asset lebih lebar dan rapi.
        |
        */

        $pdf->setPaper('a4', 'landscape');


        return $pdf->download(
            'Laporan-Asset-DND-AMS-' .
            now()->format('Y-m-d') .
            '.pdf'
        );
    }


    /**
     * =========================================================
     * EXPORT ASSET KE EXCEL
     * =========================================================
     */
    public function assetsExcel()
    {
        return Excel::download(
            new AssetsExport,
            'Laporan-Asset-DND-AMS-' .
            now()->format('Y-m-d') .
            '.xlsx'
        );
    }


    /**
     * =========================================================
     * LAPORAN TRANSAKSI ASSET
     * =========================================================
     */
    public function transactions()
    {
        $transactions = AssetTransaction::with('asset')
            ->latest()
            ->get();

        return view(
            'report.transactions',
            compact('transactions')
        );
    }

    /**
     * =========================================================
     * EXPORT TRANSAKSI ASSET KE PDF
     * =========================================================
     */
    public function transactionsPdf()
    {
        $transactions = AssetTransaction::with('asset')
            ->latest()
            ->get();

        $pdf = Pdf::loadView(
            'report.pdf.transactions',
            compact('transactions')
        );

        $pdf->setPaper('a4', 'landscape');

        return $pdf->download(
            'Laporan-Asset-Transaction-DND-AMS-' .
            now()->format('Y-m-d') .
            '.pdf'
        );
    }

    /**
     * =========================================================
     * EXPORT TRANSAKSI ASSET KE EXCEL
     * =========================================================
     */
    public function transactionsExcel()
    {
        return Excel::download(
            new \App\Exports\TransactionsExport,
            'Laporan-Asset-Transaction-DND-AMS-' .
            now()->format('Y-m-d') .
            '.xlsx'
        );
    }


    /**
     * =========================================================
     * LAPORAN MAINTENANCE
     * =========================================================
     */
    public function maintenances()
    {
        $maintenances = Maintenance::with('asset')
            ->latest()
            ->get();

        return view(
            'report.maintenances',
            compact('maintenances')
        );
    }

    /**
 * =========================================================
 * EXPORT MAINTENANCE KE PDF
 * =========================================================
 */
public function maintenancesPdf()
{
    $maintenances = Maintenance::with('asset')
        ->latest('maintenance_date')
        ->get();

    $pdf = Pdf::loadView(
        'report.pdf.maintenances',
        compact('maintenances')
    );

    $pdf->setPaper('a4', 'landscape');

    return $pdf->download(
        'Laporan-Maintenance-DND-AMS-' .
        now()->format('Y-m-d') .
        '.pdf'
    );
}


    /**
     * =========================================================
     * EXPORT MAINTENANCE KE EXCEL
     * =========================================================
     */
    public function maintenancesExcel()
    {
        return Excel::download(
            new MaintenancesExport,
            'Laporan-Maintenance-DND-AMS-' .
            now()->format('Y-m-d') .
            '.xlsx'
        );
    }
}