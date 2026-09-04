<?php

namespace App\Exports;

use App\Models\Maintenance;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class MaintenancesExport implements FromView, WithColumnWidths, WithEvents
{
    /**
     * =========================================================
     * EXPORT LAPORAN MAINTENANCE
     * =========================================================
     */
    public function view(): View
    {
        $maintenances = Maintenance::with('asset')
            ->latest('maintenance_date')
            ->get();

        return view(
            'report.excel.maintenances',
            compact('maintenances')
        );
    }


    /**
     * =========================================================
     * UKURAN KOLOM EXCEL
     * =========================================================
     */
    public function columnWidths(): array
    {
        return [

            'A' => 7,

            'B' => 25,

            'C' => 18,

            'D' => 32,

            'E' => 42,

            'F' => 18,

            'G' => 18,

        ];
    }


    /**
     * =========================================================
     * EXCEL EVENTS
     * =========================================================
     */
    public function registerEvents(): array
    {
        return [

            AfterSheet::class => function (AfterSheet $event) {

                /*
                |--------------------------------------------------------------------------
                | AUTO FILTER
                |--------------------------------------------------------------------------
                |
                | Header tabel berada pada baris 6.
                | Kolom A sampai G merupakan tabel maintenance.
                |
                */

                $event->sheet
                    ->getDelegate()
                    ->setAutoFilter('A6:G6');

            },

        ];
    }
}