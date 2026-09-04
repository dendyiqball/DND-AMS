@extends('layouts.app')

@section('title', 'Laporan Asset')

@section('content')

<div class="container-fluid print-area">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Laporan Asset
            </h4>

            <p class="text-muted mb-0">
                Daftar seluruh asset yang terdaftar
            </p>

        </div>

        <div>

            {{-- EXPORT PDF --}}
            <a href="{{ route('reports.assets.pdf') }}"
            class="btn btn-danger"
            target="_blank">

                <i class="bi bi-file-earmark-pdf"></i>
                PDF

            </a>


            {{-- EXPORT EXCEL --}}
            <a href="{{ route('reports.assets.excel') }}"
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
                                Asset Name
                            </th>

                            <th>
                                Serial Number
                            </th>

                            <th>
                                Brand
                            </th>

                            <th>
                                Model
                            </th>

                            <th>
                                Company
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Location
                            </th>

                            <th>
                                Status
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($assets as $asset)

                            <tr>

                                <td class="text-center">
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $asset->asset_name }}
                                </td>

                                <td>
                                    {{ $asset->serial_number }}
                                </td>

                                <td>
                                    {{ $asset->brand }}
                                </td>

                                <td>
                                    {{ $asset->model }}
                                </td>

                                <td>
                                    {{ $asset->company->company_name ?? '-' }}
                                </td>

                                <td>
                                    {{ $asset->category->category_name ?? '-' }}
                                </td>

                                <td>
                                    {{ $asset->location->location_name ?? '-' }}
                                </td>

                                <td>

                                    @if($asset->status == 'Ready')

                                        <span class="badge bg-success">
                                            Ready
                                        </span>

                                    @elseif($asset->status == 'Maintenance')

                                        <span class="badge bg-warning text-dark">
                                            Maintenance
                                        </span>

                                    @elseif($asset->status == 'Checked Out')

                                        <span class="badge bg-primary">
                                            Checked Out
                                        </span>

                                    @elseif($asset->status == 'Retired')

                                        <span class="badge bg-danger">
                                            Retired
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ $asset->status }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center py-4">

                                    <span class="text-muted">
                                        Belum ada data asset.
                                    </span>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

{{-- PRINT STYLE --}}
<style>
@media print {

    /* =========================================
       HALAMAN
    ========================================= */
    @page {
        size: A4 landscape;
        margin: 12mm;
    }

    html,
    body {
        margin: 0 !important;
        padding: 0 !important;
        width: 100% !important;
        min-width: 0 !important;
        background: #fff !important;
        overflow: visible !important;
    }

    /* =========================================
       SEMBUNYIKAN HEADER / NAVIGASI APLIKASI
    ========================================= */

    .sidebar,
    .navbar,
    nav,
    header,
    footer,
    .btn,
    button,
    .topbar,
    .top-header,
    .app-header {
        display: none !important;
    }

    /* =========================================
       MAIN
    ========================================= */

    main {
        display: block !important;

        width: 100% !important;
        max-width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;

        position: static !important;
    }

    /* =========================================
       CONTAINER REPORT
    ========================================= */

    .container-fluid {
        display: block !important;

        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        margin: 0 !important;

        padding: 0 3mm !important;

        box-sizing: border-box !important;
    }

    /* =========================================
       JUDUL LAPORAN
    ========================================= */

    .container-fluid > .d-flex {
        display: flex !important;

        width: 100% !important;

        margin-top: 0 !important;
        margin-bottom: 7mm !important;

        padding: 0 !important;
    }

    .container-fluid h4 {
        display: block !important;

        font-size: 18px !important;
        font-weight: 700 !important;

        margin: 0 0 2px 0 !important;
        padding: 0 !important;
    }

    .container-fluid p {
        display: block !important;

        font-size: 10px !important;

        margin: 0 !important;
        padding: 0 !important;
    }

    /* =========================================
       CARD
    ========================================= */

    .card {
        width: 100% !important;
        max-width: 100% !important;

        margin: 0 !important;
        padding: 0 !important;

        border: none !important;
        box-shadow: none !important;
    }

    /* =========================================
       TABLE RESPONSIVE
    ========================================= */

    .table-responsive {
        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        margin: 0 !important;
        padding: 0 !important;

        overflow: visible !important;
    }

    /* =========================================
       TABLE
    ========================================= */

    table {
        width: 100% !important;
        max-width: 100% !important;
        min-width: 0 !important;

        margin: 0 !important;
        padding: 0 !important;

        border-collapse: collapse !important;
        table-layout: fixed !important;

        font-size: 8px !important;
    }

    table th,
    table td {
        box-sizing: border-box !important;

        border: 1px solid #999 !important;

        padding: 4px !important;

        vertical-align: middle !important;

        white-space: normal !important;
        word-break: break-word !important;
        overflow-wrap: break-word !important;
    }

    /* =========================================
       HEADER TABEL
    ========================================= */

    table thead {
        display: table-header-group !important;
    }

    table thead th {
        text-align: center !important;
        font-weight: 700 !important;
    }

    /* =========================================
       BODY
    ========================================= */

    table tbody {
        display: table-row-group !important;
    }

    table tr {
        page-break-inside: avoid !important;
        break-inside: avoid !important;
    }

    /* =========================================
       LEBAR KOLOM
    ========================================= */

    /* No */
    table th:nth-child(1),
    table td:nth-child(1) {
        width: 4% !important;
        text-align: center !important;
    }

    /* Asset Name */
    table th:nth-child(2),
    table td:nth-child(2) {
        width: 12% !important;
    }

    /* Serial Number */
    table th:nth-child(3),
    table td:nth-child(3) {
        width: 14% !important;
    }

    /* Brand */
    table th:nth-child(4),
    table td:nth-child(4) {
        width: 8% !important;
    }

    /* Model */
    table th:nth-child(5),
    table td:nth-child(5) {
        width: 12% !important;
    }

    /* Company */
    table th:nth-child(6),
    table td:nth-child(6) {
        width: 13% !important;
    }

    /* Category */
    table th:nth-child(7),
    table td:nth-child(7) {
        width: 8% !important;
    }

    /* Location */
    table th:nth-child(8),
    table td:nth-child(8) {
        width: 12% !important;
    }

    /* Status */
    table th:nth-child(9),
    table td:nth-child(9) {
        width: 8% !important;
        text-align: center !important;
    }

    /* Purchase Date */
    table th:nth-child(10),
    table td:nth-child(10) {
        width: 9% !important;
        text-align: center !important;
    }

}
</style>

@endsection