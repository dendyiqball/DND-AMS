@extends('layouts.app')

@section('title', 'Detail Maintenance')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Detail Maintenance
            </h4>

            <p class="text-muted mb-0">
                Informasi detail maintenance asset
            </p>

        </div>


        <div class="d-flex gap-2">

            <a
                href="{{ route(
                    'maintenances.edit',
                    $maintenance->id
                ) }}"
                class="btn btn-warning"
            >

                <i class="bi bi-pencil"></i>

                Edit

            </a>


            <a
                href="{{ route('maintenances.index') }}"
                class="btn btn-secondary"
            >

                <i class="bi bi-arrow-left"></i>

                Kembali

            </a>

        </div>

    </div>



    {{-- DETAIL --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-semibold">

                <i class="bi bi-tools text-primary me-2"></i>

                Informasi Maintenance

            </h5>

        </div>


        <div class="card-body">

            <div class="row g-4">


                {{-- ASSET --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Asset
                    </label>

                    <div class="fw-semibold">

                        {{ $maintenance->asset
                            ? $maintenance->asset->asset_name
                            : '-'
                        }}

                    </div>

                </div>



                {{-- DATE --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Tanggal Maintenance
                    </label>

                    <div class="fw-semibold">

                        {{ $maintenance->maintenance_date
                            ? $maintenance->maintenance_date->format('d-m-Y')
                            : '-'
                        }}

                    </div>

                </div>



                {{-- PROBLEM --}}
                <div class="col-md-12">

                    <label class="text-muted small">
                        Problem / Kerusakan
                    </label>

                    <div>

                        {{ $maintenance->problem }}

                    </div>

                </div>



                {{-- ACTION TAKEN --}}
                <div class="col-md-12">

                    <label class="text-muted small">
                        Action Taken / Tindakan
                    </label>

                    <div>

                        {{ $maintenance->action_taken ?: '-' }}

                    </div>

                </div>



                {{-- TECHNICIAN --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Technician
                    </label>

                    <div class="fw-semibold">

                        {{ $maintenance->technician }}

                    </div>

                </div>



                {{-- COST --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Biaya Maintenance
                    </label>

                    <div class="fw-semibold">

                        Rp
                        {{ number_format(
                            $maintenance->cost ?? 0,
                            0,
                            ',',
                            '.'
                        ) }}

                    </div>

                </div>



                {{-- STATUS --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Status
                    </label>

                    <div>

                        @if ($maintenance->status === 'Pending')

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @elseif ($maintenance->status === 'In Progress')

                            <span class="badge bg-info text-dark">
                                In Progress
                            </span>

                        @elseif ($maintenance->status === 'Completed')

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @else

                            <span class="badge bg-secondary">
                                {{ $maintenance->status }}
                            </span>

                        @endif

                    </div>

                </div>



                {{-- CREATED --}}
                <div class="col-md-6">

                    <label class="text-muted small">
                        Dibuat
                    </label>

                    <div>

                        {{ $maintenance->created_at
                            ? $maintenance->created_at->format('d-m-Y H:i')
                            : '-'
                        }}

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection