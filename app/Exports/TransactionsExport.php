<?php

namespace App\Exports;

use App\Models\AssetTransaction;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;

class TransactionsExport implements FromView, WithStyles, WithColumnWidths
{
    /**
     * =========================================================
     * DATA EXCEL
     * =========================================================
     */
    public function view(): View
    {
        $transactions = AssetTransaction::with('asset')
            ->latest()
            ->get();

        return view(
            'report.excel.transactions',
            compact('transactions')
        );
    }


    /**
     * =========================================================
     * LEBAR KOLOM
     * =========================================================
     */
    public function columnWidths(): array
    {
        return [

            'A' => 7,   // No

            'B' => 25,  // Asset

            'C' => 20,  // Transaction Type

            'D' => 22,  // Employee

            'E' => 18,  // Department

            'F' => 18,  // Transaction Date

            'G' => 18,  // Return Date

            'H' => 35,  // Notes

        ];
    }


    /**
     * =========================================================
     * STYLE EXCEL
     * =========================================================
     */
    public function styles(Worksheet $sheet)
    {
        /*
        |--------------------------------------------------------------------------
        | MERGE JUDUL
        |--------------------------------------------------------------------------
        */

        $sheet->mergeCells('A1:H1');
        $sheet->mergeCells('A2:H2');
        $sheet->mergeCells('A3:H3');
        $sheet->mergeCells('A4:H4');


        /*
        |--------------------------------------------------------------------------
        | JUDUL UTAMA
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle('A1:H1')->applyFromArray([

            'font' => [
                'bold' => true,
                'size' => 16,
                'name' => 'Calibri',
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '1F4E79',
                ],
            ],

            'font' => [
                'bold' => true,
                'size' => 16,
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | JUDUL LAPORAN
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle('A2:H2')->applyFromArray([

            'font' => [
                'bold' => true,
                'size' => 14,
                'color' => [
                    'rgb' => '1F4E79',
                ],
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | NAMA PERUSAHAAN
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle('A3:H3')->applyFromArray([

            'font' => [
                'bold' => true,
                'size' => 11,
                'color' => [
                    'rgb' => '666666',
                ],
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | TANGGAL CETAK
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle('A4:H4')->applyFromArray([

            'font' => [
                'italic' => true,
                'size' => 10,
                'color' => [
                    'rgb' => '666666',
                ],
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | HEADER TABEL
        |--------------------------------------------------------------------------
        */

        $sheet->getStyle('A5:H5')->applyFromArray([

            'font' => [
                'bold' => true,
                'size' => 10,
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
            ],

            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '1F4E79',
                ],
            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],

            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => [
                        'rgb' => 'B8C2CC',
                    ],
                ],
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | DATA TABLE
        |--------------------------------------------------------------------------
        */

        $lastRow = $sheet->getHighestRow();

        if ($lastRow >= 6) {

            $sheet->getStyle(
                'A6:H' . $lastRow
            )->applyFromArray([

                'font' => [
                    'size' => 10,
                    'color' => [
                        'rgb' => '1F2937',
                    ],
                ],

                'alignment' => [
                    'vertical' => Alignment::VERTICAL_CENTER,
                    'wrapText' => true,
                ],

                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => [
                            'rgb' => 'D1D5DB',
                        ],
                    ],
                ],

            ]);


            /*
            |--------------------------------------------------------------------------
            | NOMOR & TANGGAL CENTER
            |--------------------------------------------------------------------------
            */

            $sheet->getStyle(
                'A6:A' . $lastRow
            )->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);


            $sheet->getStyle(
                'C6:C' . $lastRow
            )->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);


            $sheet->getStyle(
                'F6:G' . $lastRow
            )->getAlignment()
                ->setHorizontal(Alignment::HORIZONTAL_CENTER);


            /*
            |--------------------------------------------------------------------------
            | ZEBRA TABLE
            |--------------------------------------------------------------------------
            */

            for ($row = 6; $row <= $lastRow; $row++) {

                if ($row % 2 == 0) {

                    $sheet->getStyle(
                        'A' . $row . ':H' . $row
                    )->getFill()->setFillType(
                        Fill::FILL_SOLID
                    );

                    $sheet->getStyle(
                        'A' . $row . ':H' . $row
                    )->getFill()->getStartColor()
                        ->setRGB('F5F7FA');
                }
            }

        }


        /*
        |--------------------------------------------------------------------------
        | TINGGI BARIS
        |--------------------------------------------------------------------------
        */

        $sheet->getRowDimension(1)->setRowHeight(28);
        $sheet->getRowDimension(2)->setRowHeight(24);
        $sheet->getRowDimension(3)->setRowHeight(20);
        $sheet->getRowDimension(4)->setRowHeight(20);
        $sheet->getRowDimension(5)->setRowHeight(28);


        /*
        |--------------------------------------------------------------------------
        | FREEZE HEADER
        |--------------------------------------------------------------------------
        */

        $sheet->freezePane('A6');


        /*
        |--------------------------------------------------------------------------
        | FILTER
        |--------------------------------------------------------------------------
        */

        if ($lastRow >= 5) {

            $sheet->setAutoFilter(
                'A5:H' . $lastRow
            );

        }
    }
}