<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>Laporan Asset - DND-AMS</title>

    <style>

        @page {
            size: A4 landscape;
            margin: 10mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;

            font-family: DejaVu Sans, Arial, sans-serif;

            font-size: 8px;

            color: #1f2937;
        }


        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 100%;

            border-bottom: 2px solid #0891b2;

            padding-bottom: 7px;

            margin-bottom: 10px;
        }


        .header-table {
            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;
        }


        .header-table td {
            border: none;

            padding: 0;

            vertical-align: middle;
        }


        .brand {
            font-size: 16px;

            font-weight: bold;

            color: #0f172a;
        }


        .system {
            margin-top: 2px;

            font-size: 9px;

            font-weight: bold;

            color: #0891b2;
        }


        .company {
            margin-top: 2px;

            font-size: 7px;

            color: #64748b;
        }


        .header-right {
            text-align: right;
        }


        .report-label {
            font-size: 13px;

            font-weight: bold;

            color: #0f172a;
        }


        .print-date {
            margin-top: 3px;

            font-size: 7px;

            color: #64748b;
        }


        /* =====================================================
           TITLE
        ===================================================== */

        .title {
            margin: 0 0 2px 0;

            font-size: 12px;

            font-weight: bold;

            color: #0f172a;
        }


        .subtitle {
            margin: 0 0 8px 0;

            font-size: 7px;

            color: #64748b;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {
            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

            margin-bottom: 8px;
        }


        .summary td {
            width: 25%;

            border: 1px solid #dbe3ea;

            padding: 5px;

            background: #f8fafc;
        }


        .summary-label {
            font-size: 6px;

            color: #64748b;

            text-transform: uppercase;
        }


        .summary-value {
            margin-top: 2px;

            font-size: 9px;

            font-weight: bold;

            color: #0f172a;
        }


        /* =====================================================
           ASSET TABLE
        ===================================================== */

        .asset-table {
            width: 100%;

            border-collapse: collapse;

            table-layout: fixed;

            margin: 0;
        }


        .asset-table thead {
            display: table-header-group;
        }


        .asset-table tr {
            page-break-inside: avoid;
        }


        .asset-table th {
            background: #0891b2;

            color: #ffffff;

            border: 1px solid #0e7490;

            padding: 5px 3px;

            font-size: 6.5px;

            font-weight: bold;

            text-align: center;

            vertical-align: middle;

            line-height: 1.15;
        }


        .asset-table td {
            border: 1px solid #cbd5e1;

            padding: 4px 3px;

            font-size: 6.5px;

            line-height: 1.2;

            vertical-align: middle;

            word-wrap: break-word;

            overflow-wrap: break-word;
        }


        .asset-table tbody tr:nth-child(even) td {
            background: #f8fafc;
        }


        .center {
            text-align: center;
        }


        .left {
            text-align: left;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 8px;

            padding-top: 5px;

            border-top: 1px solid #cbd5e1;

            font-size: 6.5px;

            color: #64748b;
        }


    </style>

</head>


<body>


    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="header">

        <table class="header-table">

            <tr>

                <td style="width: 70%;">

                    <div class="brand">
                        DND-AMS
                    </div>

                    <div class="system">
                        ASSET MANAGEMENT SYSTEM
                    </div>

                    <div class="company">
                        CV. Mitra Parama Indonesia | Site Semarang
                    </div>

                </td>


                <td
                    style="width: 30%;"
                    class="header-right"
                >

                    <div class="report-label">
                        LAPORAN ASSET
                    </div>

                    <div class="print-date">

                        Dicetak:
                        {{ now()->format('d/m/Y H:i') }}

                    </div>

                </td>

            </tr>

        </table>

    </div>



    {{-- =====================================================
         TITLE
    ====================================================== --}}

    <div class="title">
        Daftar Asset
    </div>

    <div class="subtitle">
        Daftar seluruh asset yang terdaftar pada sistem DND-AMS.
    </div>



    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <table class="summary">

        <tr>

            <td>

                <div class="summary-label">
                    Total Asset
                </div>

                <div class="summary-value">
                    {{ $assets->count() }}
                </div>

            </td>


            <td>

                <div class="summary-label">
                    Tanggal
                </div>

                <div class="summary-value">
                    {{ now()->format('d/m/Y') }}
                </div>

            </td>


            <td>

                <div class="summary-label">
                    Waktu
                </div>

                <div class="summary-value">
                    {{ now()->format('H:i') }}
                </div>

            </td>


            <td>

                <div class="summary-label">
                    Sistem
                </div>

                <div class="summary-value">
                    DND-AMS
                </div>

            </td>

        </tr>

    </table>



    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <table class="asset-table">

        <thead>

            <tr>

                <th style="width: 4%;">
                    No
                </th>

                <th style="width: 15%;">
                    Asset Name
                </th>

                <th style="width: 15%;">
                    Serial Number
                </th>

                <th style="width: 7%;">
                    Brand
                </th>

                <th style="width: 12%;">
                    Model
                </th>

                <th style="width: 15%;">
                    Company
                </th>

                <th style="width: 7%;">
                    Category
                </th>

                <th style="width: 10%;">
                    Location
                </th>

                <th style="width: 7%;">
                    Status
                </th>

                <th style="width: 8%;">
                    Purchase Date
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($assets as $index => $asset)

                <tr>

                    <td class="center">
                        {{ $index + 1 }}
                    </td>


                    <td class="left">
                        {{ $asset->asset_name ?? '-' }}
                    </td>


                    <td class="left">
                        {{ $asset->serial_number ?? '-' }}
                    </td>


                    <td class="center">
                        {{ $asset->brand ?? '-' }}
                    </td>


                    <td class="left">
                        {{ $asset->model ?? '-' }}
                    </td>


                    <td class="left">
                        {{ $asset->company->company_name ?? '-' }}
                    </td>


                    <td class="center">
                        {{ $asset->category->category_name ?? '-' }}
                    </td>


                    <td class="center">
                        {{ $asset->location->location_name ?? '-' }}
                    </td>


                    <td class="center">
                        {{ $asset->status ?? '-' }}
                    </td>


                    <td class="center">

                        @if($asset->purchase_date)

                            {{ \Carbon\Carbon::parse(
                                $asset->purchase_date
                            )->format('d/m/Y') }}

                        @else

                            -

                        @endif

                    </td>

                </tr>


            @empty

                <tr>

                    <td
                        colspan="10"
                        class="center"
                    >

                        Tidak ada data asset.

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>



    {{-- =====================================================
         FOOTER
    ====================================================== --}}

    <div class="footer">

        DND-AMS | Asset Management System

        &nbsp;&nbsp;|&nbsp;&nbsp;

        CV. Mitra Parama Indonesia - Site Semarang

        &nbsp;&nbsp;|&nbsp;&nbsp;

        Total Asset: {{ $assets->count() }}

    </div>


</body>

</html>