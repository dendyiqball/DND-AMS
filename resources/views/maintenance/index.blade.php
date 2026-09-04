@extends('layouts.app')

@section('title', 'Maintenance')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Maintenance
            </h4>

            <p class="text-muted mb-0">
                Kelola data maintenance asset
            </p>
        </div>

        <a
            href="{{ route('maintenances.create') }}"
            class="btn btn-primary"
        >
            <i class="bi bi-plus-circle me-1"></i>
            Tambah Maintenance
        </a>

    </div>


    {{-- SUCCESS --}}
    @if(session('success'))

        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- TABLE --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-semibold">

                <i class="bi bi-tools text-primary me-2"></i>

                Data Maintenance

            </h5>

        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th class="text-center">
                                No
                            </th>

                            <th>
                                Asset
                            </th>

                            <th>
                                Tanggal
                            </th>

                            <th>
                                Problem
                            </th>

                            <th>
                                Technician
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($maintenances as $maintenance)

                            <tr>

                                {{-- NO --}}
                                <td class="text-center">

                                    {{ $maintenances->firstItem() + $loop->index }}

                                </td>


                                {{-- ASSET --}}
                                <td>

                                    <strong>
                                        {{ $maintenance->asset->asset_name ?? '-' }}
                                    </strong>

                                </td>
                                

                                {{-- TANGGAL --}}
                                <td>

                                    {{ $maintenance->maintenance_date
                                        ? \Carbon\Carbon::parse($maintenance->maintenance_date)->format('d-m-Y')
                                        : '-'
                                    }}

                                </td>


                                {{-- PROBLEM --}}
                                <td>

                                    {{ $maintenance->problem ?? '-' }}

                                </td>


                                {{-- TECHNICIAN --}}
                                <td>

                                    {{ $maintenance->technician ?? '-' }}

                                </td>


                                {{-- STATUS --}}
                                <td class="text-center">

                                    @if($maintenance->status === 'Pending')

                                        <span class="badge status-pending">
                                            Pending
                                        </span>

                                    @elseif($maintenance->status === 'In Progress')

                                        <span class="badge status-progress">
                                            In Progress
                                        </span>

                                    @elseif($maintenance->status === 'Completed')

                                        <span class="badge status-completed">
                                            Completed
                                        </span>

                                    @else

                                        <span class="badge status-default">
                                            {{ $maintenance->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>


                                {{-- AKSI --}}
                                <td class="text-center">

                                    <div class="btn-group">

                                        {{-- DETAIL --}}
                                        <a
                                            href="{{ route('maintenances.show', $maintenance->id) }}"
                                            class="btn btn-sm btn-info text-white"
                                            title="Detail"
                                        >

                                            <i class="bi bi-eye"></i>

                                        </a>


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('maintenances.edit', $maintenance->id) }}"
                                            class="btn btn-sm btn-warning"
                                            title="Edit"
                                        >

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('maintenances.destroy', $maintenance->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data maintenance ini?')"
                                        >

                                            @csrf

                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Hapus"
                                            >

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5 text-muted"
                                >

                                    <i
                                        class="bi bi-tools fs-1 d-block mb-3"
                                    ></i>

                                    Belum ada data maintenance.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}
        @if($maintenances->hasPages())

            <div class="card-footer bg-white">

                {{ $maintenances->links() }}

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     STATUS COLOR
========================================================= --}}

<style>

    /* PENDING - MERAH */
    .status-pending {
        background-color: #dc3545 !important;
        color: #ffffff !important;
        font-weight: 600;
        padding: 5px 9px;
        border-radius: 5px;
    }


    /* IN PROGRESS - KUNING */
    .status-progress {
        background-color: #ffc107 !important;
        color: #000000 !important;
        font-weight: 600;
        padding: 5px 9px;
        border-radius: 5px;
    }


    /* COMPLETED - HIJAU */
    .status-completed {
        background-color: #198754 !important;
        color: #ffffff !important;
        font-weight: 600;
        padding: 5px 9px;
        border-radius: 5px;
    }


    /* STATUS LAIN */
    .status-default {
        background-color: #6c757d !important;
        color: #ffffff !important;
        font-weight: 600;
        padding: 5px 9px;
        border-radius: 5px;
    }

</style>

@endsection