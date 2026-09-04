@extends('layouts.app')

@section('title', 'Laporan Asset Transaction')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Laporan Asset Transaction
            </h4>

            <p class="text-muted mb-0">
                Riwayat transaksi asset
            </p>
        </div>

        <div>

    {{-- PDF --}}
    <a href="{{ route('reports.transactions.pdf') }}"
       class="btn btn-danger"
       target="_blank">

        <i class="bi bi-file-earmark-pdf"></i>
        PDF

    </a>


    {{-- EXCEL --}}
    <a href="{{ route('reports.transactions.excel') }}"
       class="btn btn-success">

        <i class="bi bi-file-earmark-excel"></i>
        Excel

    </a>
    

    {{-- KEMBALI --}}
    <a href="{{ route('reports.index') }}"
       class="btn btn-secondary">

        <i class="bi bi-arrow-left"></i>
        Kembali

    </a>

</div>

    </div>


    {{-- TABLE --}}
    <div class="card border-0 shadow-sm">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center">
                                No
                            </th>

                            <th>
                                Asset
                            </th>

                            <th>
                                Transaction Type
                            </th>

                            <th>
                                Employee
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Transaction Date
                            </th>

                            <th>
                                Return Date
                            </th>

                            <th>
                                Notes
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($transactions as $transaction)

                            <tr>

                                {{-- NO --}}
                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>


                                {{-- ASSET --}}
                                <td>

                                    {{ $transaction->asset->asset_name ?? '-' }}

                                </td>


                                {{-- TRANSACTION TYPE --}}
                                <td>

                                    @if($transaction->transaction_type === 'Checkout')

                                        <span class="badge bg-primary">
                                            Checkout
                                        </span>

                                    @elseif($transaction->transaction_type === 'Return')

                                        <span class="badge bg-success">
                                            Return
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ $transaction->transaction_type ?? '-' }}
                                        </span>

                                    @endif

                                </td>


                                {{-- EMPLOYEE --}}
                                <td>

                                    {{ $transaction->employee_name ?? '-' }}

                                </td>


                                {{-- DEPARTMENT --}}
                                <td>

                                    {{ $transaction->department ?? '-' }}

                                </td>


                                {{-- TRANSACTION DATE --}}
                                <td>

                                    {{ $transaction->transaction_date
                                        ? \Carbon\Carbon::parse($transaction->transaction_date)->format('d/m/Y')
                                        : '-'
                                    }}

                                </td>


                                {{-- RETURN DATE --}}
                                <td>

                                    {{ $transaction->return_date
                                        ? \Carbon\Carbon::parse($transaction->return_date)->format('d/m/Y')
                                        : '-'
                                    }}

                                </td>


                                {{-- NOTES --}}
                                <td>

                                    {{ $transaction->notes ?? '-' }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center py-4">

                                    <div class="text-muted">

                                        <i class="bi bi-inbox fs-3 d-block mb-2"></i>

                                        Belum ada data transaksi asset.

                                    </div>

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
     PRINT STYLE
     PATOKAN SAMA DENGAN LAPORAN ASSET
========================================================= --}}
<style>

@media print {

    /* =========================
       HALAMAN A4 LANDSCAPE
    ========================= */
    @page {
        size: A4 landscape;
        margin: 8mm;
    }


    /* =========================
       RESET BODY
    ========================= */
    html,
    body {
        width: 100% !important;
        min-width: 0 !important;
        max-width: none !important;

        margin: 0 !important;
        padding: 0 !important;

        background: #fff !important;

        overflow: visible !important;
    }


    /* =========================
       HILANGKAN LAYOUT WEBSITE
    ========================= */
    .sidebar,
    .navbar,
    nav,
    footer,
    .btn,
    button {
        display: none !important;
    }


    /* =========================
       MAIN CONTENT
    ========================= */
    main,
    .main-content,
    .content,
    .container,
    .container-fluid {

        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        margin-left: 0 !important;
        margin-right: 0 !important;

        padding-left: 0 !important;
        padding-right: 0 !important;

        position: static !important;

        transform: none !important;
    }


    /* =========================
       HEADER LAPORAN
    ========================= */
    .container-fluid > .d-flex {

        width: 100% !important;

        margin: 0 0 12px 0 !important;

        padding: 0 !important;

        display: flex !important;

        justify-content: space-between !important;

        align-items: flex-start !important;
    }


    /* =========================
       JUDUL
    ========================= */
    h4 {
        font-size: 16px !important;

        margin: 0 0 3px 0 !important;

        padding: 0 !important;

        font-weight: 700 !important;
    }


    /* =========================
       SUBJUDUL
    ========================= */
    p {
        font-size: 9px !important;

        margin: 0 0 8px 0 !important;

        padding: 0 !important;
    }


    /* =========================
       CARD
    ========================= */
    .card {

        width: 100% !important;
        max-width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;

        border: none !important;

        box-shadow: none !important;
    }


    .card-body {

        width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* =========================
       TABLE RESPONSIVE
    ========================= */
    .table-responsive {

        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        overflow: visible !important;

        margin: 0 !important;
        padding: 0 !important;
    }


    /* =========================
       TABLE
    ========================= */
    table {

        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        margin: 0 !important;
        padding: 0 !important;

        border-collapse: collapse !important;

        table-layout: fixed !important;

        font-size: 7.5px !important;
    }


    /* =========================
       CELL
    ========================= */
    table th,
    table td {

        box-sizing: border-box !important;

        border: 1px solid #999 !important;

        padding: 3px 4px !important;

        vertical-align: middle !important;

        word-break: break-word !important;

        overflow-wrap: anywhere !important;

        white-space: normal !important;
    }


    /* =========================
       HEADER TABLE
    ========================= */
    table thead {

        display: table-header-group !important;
    }


    table thead th {

        text-align: center !important;

        font-weight: bold !important;

        vertical-align: middle !important;
    }


    /* =========================
       KOLOM
       TOTAL = 100%
    ========================= */

    /* NO */
    table th:nth-child(1),
    table td:nth-child(1) {

        width: 4% !important;

        text-align: center !important;
    }


    /* ASSET */
    table th:nth-child(2),
    table td:nth-child(2) {

        width: 18% !important;
    }


    /* TRANSACTION TYPE */
    table th:nth-child(3),
    table td:nth-child(3) {

        width: 13% !important;

        text-align: center !important;
    }


    /* EMPLOYEE */
    table th:nth-child(4),
    table td:nth-child(4) {

        width: 14% !important;
    }


    /* DEPARTMENT */
    table th:nth-child(5),
    table td:nth-child(5) {

        width: 11% !important;
    }


    /* TRANSACTION DATE */
    table th:nth-child(6),
    table td:nth-child(6) {

        width: 12% !important;

        text-align: center !important;
    }


    /* RETURN DATE */
    table th:nth-child(7),
    table td:nth-child(7) {

        width: 12% !important;

        text-align: center !important;
    }


    /* NOTES */
    table th:nth-child(8),
    table td:nth-child(8) {

        width: 16% !important;
    }


    /* =========================
       BADGE
    ========================= */
    .badge {

        background: transparent !important;

        color: inherit !important;

        padding: 0 !important;

        font-size: inherit !important;
    }


    /* =========================
       BARIS
    ========================= */
    table tr {

        page-break-inside: avoid !important;

        break-inside: avoid !important;
    }


    /* =========================
       SHADOW
    ========================= */
    .shadow,
    .shadow-sm,
    .shadow-lg {

        box-shadow: none !important;
    }

}

</style>

@endsection