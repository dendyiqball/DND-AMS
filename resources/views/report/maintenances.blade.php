@extends('layouts.app')

@section('title', 'Laporan Maintenance')

@section('content')

<div class="container-fluid report-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="report-header">

        <div class="report-title">

            <h4>
                Laporan Maintenance
            </h4>

            <p>
                Riwayat maintenance asset
            </p>

        </div>

    <div class="no-print report-buttons">

        <a href="{{ route('reports.maintenances.pdf') }}"
        class="btn btn-danger"
        target="_blank">

            <i class="bi bi-file-earmark-pdf"></i>
            PDF

        </a>

        <a href="{{ route('reports.maintenances.excel') }}"
        class="btn btn-success">

            <i class="bi bi-file-earmark-excel"></i>
            Excel

        </a>

        <a href="{{ route('reports.index') }}"
        class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>

    </div>


    {{-- =====================================================
         TABLE
    ====================================================== --}}

    <div class="card report-card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="report-table">

                    <thead>

                        <tr>

                            <th class="col-no">
                                No
                            </th>

                            <th class="col-asset">
                                Asset
                            </th>

                            <th class="col-date">
                                Maintenance Date
                            </th>

                            <th class="col-problem">
                                Problem
                            </th>

                            <th class="col-action">
                                Action Taken / Solution
                            </th>

                            <th class="col-technician">
                                Technician
                            </th>

                            <th class="col-status">
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($maintenances as $maintenance)

                            <tr>

                                {{-- =================================================
                                     NO
                                ================================================== --}}

                                <td class="text-center">

                                    {{ $loop->iteration }}

                                </td>


                                {{-- =================================================
                                     ASSET
                                ================================================== --}}

                                <td>

                                    @php
                                        $assetName = $maintenance->asset->asset_name ?? '';
                                        $assetCode = $maintenance->asset->asset_code ?? '';
                                    @endphp

                                    @if($assetName && $assetCode)

                                        @if(trim($assetName) === trim($assetCode))

                                            {{ $assetName }}

                                        @else

                                            {{ $assetName }}

                                            <br>

                                            <span class="asset-code">
                                                {{ $assetCode }}
                                            </span>

                                        @endif

                                    @elseif($assetName)

                                        {{ $assetName }}

                                    @elseif($assetCode)

                                        {{ $assetCode }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- =================================================
                                     DATE
                                ================================================== --}}

                                <td class="text-center">

                                    @if($maintenance->maintenance_date)

                                        {{ \Carbon\Carbon::parse(
                                            $maintenance->maintenance_date
                                        )->format('d/m/Y') }}

                                    @else

                                        -

                                    @endif

                                </td>


                                {{-- =================================================
                                     PROBLEM
                                ================================================== --}}

                                <td>

                                    {{ $maintenance->problem ?? '-' }}

                                </td>


                                {{-- =================================================
                                     ACTION / SOLUTION
                                ================================================== --}}

                                <td>

                                    {{ $maintenance->action_taken ?? '-' }}

                                </td>


                                {{-- =================================================
                                     TECHNICIAN
                                ================================================== --}}

                                <td>

                                    {{ $maintenance->technician ?? '-' }}

                                </td>


                                {{-- =================================================
                                     STATUS
                                ================================================== --}}

                                <td class="text-center status-cell">

                                    @if($maintenance->status === 'Completed')

                                        <span class="status-label status-completed">
                                            Completed
                                        </span>

                                    @elseif($maintenance->status === 'In Progress')

                                        <span class="status-label status-progress">
                                            In Progress
                                        </span>

                                    @elseif($maintenance->status === 'Pending')

                                        <span class="status-label status-pending">
                                            Pending
                                        </span>

                                    @else

                                        <span class="status-label status-default">
                                            {{ $maintenance->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="empty-data">

                                    Belum ada data maintenance.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>


{{-- =========================================================
     STYLE
========================================================= --}}

<style>

/* =========================================================
   NORMAL SCREEN
========================================================= */

.report-page {
    width: 100%;
}

.report-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.report-title h4 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
    color: #111827;
}

.report-title p {
    margin: 3px 0 0;
    color: #6b7280;
    font-size: 14px;
}

.report-buttons {
    display: flex;
    gap: 6px;
}

.report-card {
    border: 0;
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,.06);
}

.report-card .card-body {
    padding: 14px;
}


/* =========================================================
   TABLE SCREEN
========================================================= */

.report-table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed;
    margin: 0;
}

.report-table th {
    background: #f8fafc;
    color: #111827;
    font-size: 12px;
    font-weight: 700;
    text-align: center;
    vertical-align: middle;
    padding: 9px 7px;
    border: 1px solid #d1d5db;
}

.report-table td {
    color: #1f2937;
    font-size: 12px;
    vertical-align: middle;
    padding: 9px 7px;
    border: 1px solid #d1d5db;
    word-break: normal;
    overflow-wrap: break-word;
}


/* =========================================================
   COLUMN WIDTH
========================================================= */

.col-no {
    width: 5%;
}

.col-asset {
    width: 15%;
}

.col-date {
    width: 13%;
}

.col-problem {
    width: 19%;
}

.col-action {
    width: 23%;
}

.col-technician {
    width: 12%;
}

.col-status {
    width: 13%;
}


/* =========================================================
   ASSET CODE
========================================================= */

.asset-code {
    color: #6b7280;
    font-size: 10px;
}


/* =========================================================
   STATUS
========================================================= */

.status-cell {
    text-align: center;
    vertical-align: middle;
}

.status-label {
    display: inline-block;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 700;
    line-height: 1.2;
    white-space: nowrap;
}


/* COMPLETED */

.status-completed {
    background: #198754 !important;
    color: #ffffff !important;
    border: 1px solid #198754 !important;
}


/* IN PROGRESS */

.status-progress {
    background: #ffc107 !important;
    color: #000000 !important;
    border: 1px solid #ffc107 !important;
}


/* PENDING */

.status-pending {
    background: #dc3545 !important;
    color: #ffffff !important;
    border: 1px solid #dc3545 !important;
}


/* DEFAULT */

.status-default {
    background: #6c757d !important;
    color: #ffffff !important;
    border: 1px solid #6c757d !important;
}


/* EMPTY */

.empty-data {
    text-align: center;
    padding: 25px !important;
    color: #6c757d;
}


/* =========================================================
   PRINT
========================================================= */

@media print {

    /* -----------------------------------------------------
       A4 PORTRAIT
    ------------------------------------------------------ */

    @page {
        size: A4 portrait;
        margin: 10mm;
    }


    /* -----------------------------------------------------
       BODY
    ------------------------------------------------------ */

    html,
    body {
        width: auto !important;
        min-width: 0 !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;

        background: #ffffff !important;

        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }


    /* -----------------------------------------------------
       HILANGKAN NAVBAR
    ------------------------------------------------------ */

    nav,
    header,
    .navbar,
    .topbar,
    .top-navbar,
    .main-navbar,
    .app-header,
    [class*="navbar"],
    [class*="topbar"] {
        display: none !important;
    }


    /* -----------------------------------------------------
       HILANGKAN SIDEBAR
    ------------------------------------------------------ */

    aside,
    .sidebar,
    [class*="sidebar"] {
        display: none !important;
    }


    /* -----------------------------------------------------
       HILANGKAN FOOTER
    ------------------------------------------------------ */

    footer,
    [class*="footer"] {
        display: none !important;
    }


    /* -----------------------------------------------------
       HILANGKAN BUTTON
    ------------------------------------------------------ */

    .no-print,
    .report-buttons,
    .btn {
        display: none !important;
    }


    /* -----------------------------------------------------
       RESET MAIN
    ------------------------------------------------------ */

    main,
    .main,
    .main-content,
    .content,
    .content-wrapper,
    .page-content,
    .app-content {
        width: 100% !important;
        min-width: 0 !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* -----------------------------------------------------
       REPORT PAGE
    ------------------------------------------------------ */

    .report-page {
        width: 100% !important;
        max-width: none !important;
        min-width: 0 !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* -----------------------------------------------------
       HEADER LAPORAN
    ------------------------------------------------------ */

    .report-header {
        display: block !important;

        width: 100% !important;

        margin: 0 0 5mm 0 !important;
        padding: 0 !important;
    }

    .report-title h4 {
        font-size: 17pt !important;
        line-height: 1.2 !important;

        margin: 0 0 1mm 0 !important;

        color: #000000 !important;
        font-weight: 700 !important;
    }

    .report-title p {
        font-size: 9pt !important;
        line-height: 1.2 !important;

        margin: 0 !important;

        color: #555555 !important;
    }


    /* -----------------------------------------------------
       CARD
    ------------------------------------------------------ */

    .report-card {
        width: 100% !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;

        border: none !important;
        border-radius: 0 !important;

        background: #ffffff !important;
        box-shadow: none !important;
    }


    .report-card .card-body {
        width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* -----------------------------------------------------
       TABLE RESPONSIVE
    ------------------------------------------------------ */

    .table-responsive {
        width: 100% !important;
        max-width: none !important;

        overflow: visible !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* -----------------------------------------------------
       TABLE
    ------------------------------------------------------ */

    .report-table {
        width: 100% !important;
        max-width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;

        border-collapse: collapse !important;
        table-layout: fixed !important;

        font-size: 8pt !important;
    }


    /* -----------------------------------------------------
       TABLE HEADER
    ------------------------------------------------------ */

    .report-table thead {
        display: table-header-group !important;
    }


    .report-table th {
        background: #eeeeee !important;
        color: #000000 !important;

        font-size: 8pt !important;
        font-weight: 700 !important;

        text-align: center !important;
        vertical-align: middle !important;

        padding: 5px 4px !important;

        border: 1px solid #555555 !important;
    }


    /* -----------------------------------------------------
       TABLE BODY
    ------------------------------------------------------ */

    .report-table td {
        background: #ffffff !important;
        color: #000000 !important;

        font-size: 8pt !important;

        vertical-align: middle !important;

        padding: 5px 4px !important;

        border: 1px solid #555555 !important;

        overflow-wrap: break-word !important;
        word-break: normal !important;
    }


    /* -----------------------------------------------------
       COLUMN WIDTH PRINT
    ------------------------------------------------------ */

    .report-table .col-no {
        width: 5% !important;
    }

    .report-table .col-asset {
        width: 15% !important;
    }

    .report-table .col-date {
        width: 13% !important;
    }

    .report-table .col-problem {
        width: 19% !important;
    }

    .report-table .col-action {
        width: 23% !important;
    }

    .report-table .col-technician {
        width: 12% !important;
    }

    .report-table .col-status {
        width: 13% !important;
    }


    /* -----------------------------------------------------
       ASSET CODE
    ------------------------------------------------------ */

    .asset-code {
        font-size: 7pt !important;
        color: #555555 !important;
    }


    /* -----------------------------------------------------
       STATUS PRINT
    ------------------------------------------------------ */

    .status-cell {
        text-align: center !important;
        vertical-align: middle !important;
    }

    .status-label {
        display: inline-block !important;

        font-size: 7pt !important;
        font-weight: 700 !important;

        padding: 3px 5px !important;

        border-radius: 3px !important;

        white-space: nowrap !important;
        line-height: 1.2 !important;
    }


    /* COMPLETED HIJAU */

    .status-completed {
        background: #198754 !important;
        color: #ffffff !important;
        border: 1px solid #198754 !important;
    }


    /* IN PROGRESS KUNING */

    .status-progress {
        background: #ffc107 !important;
        color: #000000 !important;
        border: 1px solid #ffc107 !important;
    }


    /* PENDING MERAH */

    .status-pending {
        background: #dc3545 !important;
        color: #ffffff !important;
        border: 1px solid #dc3545 !important;
    }


    /* DEFAULT */

    .status-default {
        background: #6c757d !important;
        color: #ffffff !important;
        border: 1px solid #6c757d !important;
    }


    /* -----------------------------------------------------
       CEGAH BARIS TERPOTONG
    ------------------------------------------------------ */

    .report-table tr {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }


    /* -----------------------------------------------------
       JANGAN BIARKAN ELEmen BOOTSTRAP MEMBUAT LEBAR
    ------------------------------------------------------ */

    .container,
    .container-fluid,
    .row,
    .col,
    [class*="col-"] {
        width: 100% !important;
        max-width: none !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
    }


    /* -----------------------------------------------------
       HILANGKAN SHADOW
    ------------------------------------------------------ */

    * {
        box-shadow: none !important;
    }

}

</style>

@endsection