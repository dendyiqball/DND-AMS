@extends('layouts.app')

@section('title', 'Report')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Report
            </h4>

            <p class="text-muted mb-0">
                Laporan dan ringkasan Asset Management System
            </p>
        </div>

    </div>


    {{-- SUMMARY ASSET --}}
    <div class="row g-3 mb-4">

        {{-- Total Asset --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Total Asset
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $totalAssets }}
                            </h3>
                        </div>

                        <div class="fs-2 text-primary">
                            <i class="bi bi-laptop"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Ready --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Asset Ready
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $readyAssets }}
                            </h3>
                        </div>

                        <div class="fs-2 text-success">
                            <i class="bi bi-check-circle"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Checked Out --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Checked Out
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $checkedOutAssets }}
                            </h3>
                        </div>

                        <div class="fs-2 text-warning">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Maintenance --}}
        <div class="col-xl-3 col-md-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between">

                        <div>
                            <p class="text-muted mb-1">
                                Maintenance
                            </p>

                            <h3 class="fw-bold mb-0">
                                {{ $maintenanceAssets }}
                            </h3>
                        </div>

                        <div class="fs-2 text-danger">
                            <i class="bi bi-tools"></i>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- REPORT MENU --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <h5 class="fw-semibold mb-0">
                Jenis Laporan
            </h5>

        </div>

        <div class="card-body">

            <div class="row g-3">

                {{-- Asset Report --}}
                <div class="col-md-4">

                    <div class="border rounded p-4 h-100">

                        <div class="fs-2 text-primary mb-3">
                            <i class="bi bi-laptop"></i>
                        </div>

                        <h5 class="fw-semibold">
                            Laporan Asset
                        </h5>

                        <p class="text-muted">
                            Menampilkan seluruh data asset yang terdaftar
                            dalam sistem.
                        </p>

                        <a href="{{ route('reports.assets') }}"
                           class="btn btn-primary">

                            <i class="bi bi-eye"></i>
                            Lihat Laporan

                        </a>

                    </div>

                </div>


                {{-- Transaction Report --}}
                <div class="col-md-4">

                    <div class="border rounded p-4 h-100">

                        <div class="fs-2 text-success mb-3">
                            <i class="bi bi-arrow-left-right"></i>
                        </div>

                        <h5 class="fw-semibold">
                            Laporan Transaksi
                        </h5>

                        <p class="text-muted">
                            Menampilkan riwayat transaksi asset.
                        </p>

                        <a href="{{ route('reports.transactions') }}"
                           class="btn btn-success">

                            <i class="bi bi-eye"></i>
                            Lihat Laporan

                        </a>

                    </div>

                </div>


                {{-- Maintenance Report --}}
                <div class="col-md-4">

                    <div class="border rounded p-4 h-100">

                        <div class="fs-2 text-warning mb-3">
                            <i class="bi bi-tools"></i>
                        </div>

                        <h5 class="fw-semibold">
                            Laporan Maintenance
                        </h5>

                        <p class="text-muted">
                            Menampilkan riwayat maintenance asset.
                        </p>

                        <a href="{{ route('reports.maintenances') }}"
                           class="btn btn-warning">

                            <i class="bi bi-eye"></i>
                            Lihat Laporan

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- STATISTIK MAINTENANCE --}}
    <div class="card border-0 shadow-sm mt-4">

        <div class="card-header bg-white py-3">

            <h5 class="fw-semibold mb-0">
                Statistik Maintenance
            </h5>

        </div>

        <div class="card-body">

            <div class="row text-center">

                <div class="col-md-4">

                    <h3 class="fw-bold text-primary">
                        {{ $totalMaintenances }}
                    </h3>

                    <p class="text-muted mb-0">
                        Total Maintenance
                    </p>

                </div>

                <div class="col-md-4">

                    <h3 class="fw-bold text-warning">
                        {{ $processMaintenances }}
                    </h3>

                    <p class="text-muted mb-0">
                        Sedang Diproses
                    </p>

                </div>

                <div class="col-md-4">

                    <h3 class="fw-bold text-success">
                        {{ $finishedMaintenances }}
                    </h3>

                    <p class="text-muted mb-0">
                        Selesai
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection