<?php

namespace App\Exports;

use App\Models\Asset;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AssetsExport implements FromView, ShouldAutoSize, WithStyles, WithColumnWidths
{
    /**
     * Export data asset ke Excel
     */
    public function view(): View
    {
        $assets = Asset::with([
            'company',
            'category',
            'location'
        ])
        ->orderBy('asset_name')
        ->get();

        return view(
            'report.excel.assets',
            compact('assets')
        );
    }

    /**
     * Styling Excel
     */
    public function styles(Worksheet $sheet)
    {
        // Judul utama
        $sheet->mergeCells('A1:J1');
        $sheet->mergeCells('A2:J2');
        $sheet->mergeCells('A3:J3');

        $sheet->getStyle('A1:J3')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A1:J3')->getAlignment()->setVertical('center');

        $sheet->getStyle('A1:J1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A2:J2')->getFont()->setBold(true)->setSize(14);
        $sheet->getStyle('A3:J3')->getFont()->setItalic(true)->setSize(11);

        // Header tabel
        $sheet->getStyle('A5:J5')->getFont()->setBold(true);

        $sheet->getStyle('A5:J5')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('A5:J5')->getAlignment()->setVertical('center');

        // Border tabel
        $lastRow = $sheet->getHighestRow();

        $sheet->getStyle('A5:J' . $lastRow)
            ->getBorders()
            ->getAllBorders()
            ->setBorderStyle(
                \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            );

        // Isi tabel
        $sheet->getStyle('A6:J' . $lastRow)
            ->getAlignment()
            ->setVertical('center');

        $sheet->getStyle('A6:A' . $lastRow)
            ->getAlignment()
            ->setHorizontal('center');

        $sheet->getStyle('C6:C' . $lastRow)
            ->getAlignment()
            ->setHorizontal('center');

        $sheet->getStyle('I6:I' . $lastRow)
            ->getAlignment()
            ->setHorizontal('center');

        $sheet->getStyle('J6:J' . $lastRow)
            ->getAlignment()
            ->setHorizontal('center');

        // Tinggi baris
        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(23);
        $sheet->getRowDimension(3)->setRowHeight(20);
        $sheet->getRowDimension(5)->setRowHeight(25);

        return [];
    }

    /**
     * Lebar kolom
     */
    public function columnWidths(): array
    {
        return [
            'A' => 7,   // No
            'B' => 25,  // Asset Name
            'C' => 25,  // Serial Number
            'D' => 15,  // Brand
            'E' => 20,  // Model
            'F' => 25,  // Company
            'G' => 20,  // Category
            'H' => 25,  // Location
            'I' => 18,  // Status
            'J' => 18,  // Purchase Date
        ];
    }
}