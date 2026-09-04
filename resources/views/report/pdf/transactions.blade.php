<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">

    <title>Laporan Asset Transaction</title>

    <style>

        @page {
            size: A4 landscape;
            margin: 12mm 12mm 12mm 12mm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: #17365d;
            font-size: 9px;
        }

        /* =====================================================
           HEADER
        ===================================================== */

        .header {
            width: 100%;
            border-bottom: 2px solid #00a6c7;
            padding-bottom: 8px;
            margin-bottom: 10px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-left {
            width: 65%;
            vertical-align: top;
        }

        .header-right {
            width: 35%;
            text-align: right;
            vertical-align: top;
        }

        .system-name {
            font-size: 17px;
            font-weight: bold;
            color: #17365d;
            margin-bottom: 4px;
        }

        .system-subtitle {
            font-size: 10px;
            font-weight: bold;
            color: #00a6c7;
            margin-bottom: 5px;
        }

        .company {
            font-size: 8px;
            color: #637083;
        }

        .report-title {
            font-size: 15px;
            font-weight: bold;
            color: #17365d;
            margin-top: 4px;
        }

        .print-date {
            font-size: 8px;
            color: #637083;
            margin-top: 7px;
        }


        /* =====================================================
           JUDUL
        ===================================================== */

        .section-title {
            font-size: 12px;
            font-weight: bold;
            color: #17365d;
            margin-bottom: 3px;
        }

        .section-description {
            font-size: 8px;
            color: #637083;
            margin-bottom: 8px;
        }


        /* =====================================================
           SUMMARY
        ===================================================== */

        .summary {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .summary td {
            border: 1px solid #d5dee8;
            background: #f5f8fb;
            padding: 5px 7px;
            vertical-align: middle;
        }

        .summary-label {
            display: block;
            font-size: 6.5px;
            color: #637083;
            text-transform: uppercase;
            margin-bottom: 3px;
        }

        .summary-value {
            display: block;
            font-size: 9px;
            font-weight: bold;
            color: #17365d;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .data-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        .data-table th {
            background: #0f8fad;
            color: white;
            border: 1px solid #0b7891;
            padding: 6px 4px;
            text-align: center;
            font-size: 7.5px;
            font-weight: bold;
            vertical-align: middle;
        }

        .data-table td {
            border: 1px solid #c5d0dc;
            padding: 5px 5px;
            font-size: 7.5px;
            color: #17365d;
            vertical-align: middle;
        }

        .data-table tbody tr:nth-child(even) td {
            background: #f7f9fb;
        }

        .center {
            text-align: center;
        }

        .bold {
            font-weight: bold;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {
            margin-top: 8px;
            padding-top: 6px;
            border-top: 1px solid #c5d0dc;
            font-size: 7px;
            color: #637083;
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

                <td class="header-left">

                    <div class="system-name">
                        DND-AMS
                    </div>

                    <div class="system-subtitle">
                        ASSET MANAGEMENT SYSTEM
                    </div>

                    <div class="company">
                        CV. Mitra Parama Indonesia | Site Semarang
                    </div>

                </td>


                <td class="header-right">

                    <div class="report-title">
                        LAPORAN ASSET TRANSACTION
                    </div>

                    <div class="print-date">
                        Dicetak: {{ now()->format('d/m/Y H:i') }}
                    </div>

                </td>

            </tr>

        </table>

    </div>


    {{-- =====================================================
         JUDUL
    ====================================================== --}}

    <div class="section-title">
        Daftar Asset Transaction
    </div>

    <div class="section-description">
        Daftar seluruh transaksi asset yang tercatat pada sistem DND-AMS.
    </div>


    {{-- =====================================================
         SUMMARY
    ====================================================== --}}

    <table class="summary">

        <tr>

            <td width="25%">

                <span class="summary-label">
                    Total Transaction
                </span>

                <span class="summary-value">
                    {{ $transactions->count() }}
                </span>

            </td>


            <td width="25%">

                <span class="summary-label">
                    Tanggal
                </span>

                <span class="summary-value">
                    {{ now()->format('d/m/Y') }}
                </span>

            </td>


            <td width="25%">

                <span class="summary-label">
                    Waktu
                </span>

                <span class="summary-value">
                    {{ now()->format('H:i') }}
                </span>

            </td>


            <td width="25%">

                <span class="summary-label">
                    Sistem
                </span>

                <span class="summary-value">
                    DND-AMS
                </span>

            </td>

        </tr>

    </table>


    {{-- =====================================================
         DATA TRANSACTION
    ====================================================== --}}

    <table class="data-table">

        <thead>

            <tr>

                <th width="5%">
                    No
                </th>

                <th width="17%">
                    Asset
                </th>

                <th width="13%">
                    Transaction Type
                </th>

                <th width="14%">
                    Employee
                </th>

                <th width="11%">
                    Department
                </th>

                <th width="12%">
                    Transaction Date
                </th>

                <th width="11%">
                    Return Date
                </th>

                <th width="17%">
                    Notes
                </th>

            </tr>

        </thead>


        <tbody>

            @forelse($transactions as $transaction)

                <tr>

                    <td class="center">
                        {{ $loop->iteration }}
                    </td>


                    <td>
                        {{ $transaction->asset->asset_name ?? '-' }}
                    </td>


                    <td class="center bold">

                        {{ $transaction->transaction_type ?? '-' }}

                    </td>


                    <td>
                        {{ $transaction->employee_name ?? '-' }}
                    </td>


                    <td class="center">
                        {{ $transaction->department ?? '-' }}
                    </td>


                    <td class="center">

                        @if($transaction->transaction_date)

                            {{ \Carbon\Carbon::parse(
                                $transaction->transaction_date
                            )->format('d/m/Y') }}

                        @else

                            -

                        @endif

                    </td>


                    <td class="center">

                        @if($transaction->return_date)

                            {{ \Carbon\Carbon::parse(
                                $transaction->return_date
                            )->format('d/m/Y') }}

                        @else

                            -

                        @endif

                    </td>


                    <td>
                        {{ $transaction->notes ?? '-' }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td
                        colspan="8"
                        class="center"
                    >
                        Belum ada data transaksi asset.
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
        Total Transaction: {{ $transactions->count() }}

    </div>


</body>
</html>