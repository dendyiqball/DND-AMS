@extends('layouts.app')

@section('title', 'Asset Management')

@section('content')

<div class="container-fluid asset-page">

{{-- =====================================================
     HEADER
====================================================== --}}
<div class="d-flex justify-content-between align-items-center mb-4 asset-header">

    <div>

        <h2 class="fw-bold mb-1 asset-title">
            <i class="fas fa-laptop me-2 text-primary"></i>
            Asset Management
        </h2>

        <small class="text-muted">
            Kelola seluruh data aset perusahaan
        </small>

    </div>

    <a
        href="{{ route('master-assets.create') }}"
        class="btn btn-primary shadow-sm"
    >
        <i class="fas fa-plus-circle me-2"></i>
        Add Asset
    </a>

</div>


{{-- =====================================================
     ALERT SUCCESS
====================================================== --}}
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        <i class="fas fa-check-circle me-2"></i>

        {{ session('success') }}

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="alert">
        </button>

    </div>

@endif


{{-- =====================================================
     CARD
====================================================== --}}
<div class="card shadow-sm border-0 asset-card">


    {{-- =================================================
         CARD HEADER
    ================================================== --}}
    <div class="card-header bg-white asset-card-header">

        <div class="row align-items-center g-3">

            {{-- TITLE --}}
            <div class="col-12 col-lg-6">

                <h5 class="fw-bold mb-0">
                    Asset List
                </h5>

                <small class="text-muted d-lg-none">
                    Geser tabel ke kanan/kiri untuk melihat seluruh data
                </small>

            </div>


            {{-- SEARCH --}}
            <div class="col-12 col-lg-6">

                <form
                    action="{{ route('master-assets.index') }}"
                    method="GET"
                >

                    <div class="input-group">

                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search asset..."
                            value="{{ request('search') }}"
                        >

                        <button
                            type="submit"
                            class="btn btn-primary"
                        >

                            <i class="fas fa-search"></i>

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- =================================================
         TABLE
    ================================================== --}}
    <div class="card-body p-0">

        <div class="asset-table-wrapper">

            <table class="table table-hover align-middle mb-0 asset-table">

                <thead class="table-light">

                    <tr>

                        <th class="col-no">
                            No
                        </th>

                        <th class="col-asset">
                            Asset Name
                        </th>

                        <th class="col-company">
                            Company
                        </th>

                        <th class="col-model">
                            Model
                        </th>

                        <th class="col-ram">
                            RAM
                        </th>

                        <th class="col-storage">
                            SSD / Storage
                        </th>

                        <th class="col-serial">
                            Serial Number
                        </th>

                        <th class="col-category">
                            Category
                        </th>

                        <th class="col-location">
                            Location
                        </th>

                        <th class="col-employee">
                            Employee / Pemakai
                        </th>

                        <th class="col-date">
                            Purchase Date
                        </th>

                        <th class="col-price">
                            Purchase Price
                        </th>

                        <th class="col-status">
                            Status
                        </th>

                        <th class="col-action text-center">
                            Action
                        </th>

                    </tr>

                </thead>


                <tbody>

                    @forelse($assets as $index => $asset)

                    <tr>


                        {{-- =================================
                             NO
                        ================================== --}}
                        <td class="text-center">

                            {{ $assets->firstItem() + $index }}

                        </td>


                        {{-- =================================
                             ASSET NAME
                        ================================== --}}
                        <td>

                            <span class="fw-semibold asset-name">

                                {{ $asset->asset_name }}

                            </span>

                        </td>


                        {{-- =================================
                             COMPANY
                        ================================== --}}
                        <td>

                            <span class="company-name">

                                {{ $asset->company->company_name ?? '-' }}

                            </span>

                        </td>


                        {{-- =================================
                             MODEL
                        ================================== --}}
                        <td>

                            <span class="model-name">

                                {{ $asset->model ?? '-' }}

                            </span>

                        </td>


                        {{-- =================================
                             RAM
                             HANYA LAPTOP & CPU
                        ================================== --}}
                        <td>

                            @if(
                                $asset->category &&
                                in_array(
                                    strtoupper(trim($asset->category->category_name)),
                                    ['CPU', 'LAPTOP']
                                )
                            )

                                @if($asset->ram)

                                    <span class="badge bg-primary specification-badge">

                                        {{ $asset->ram }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             STORAGE
                             HANYA LAPTOP & CPU
                        ================================== --}}
                        <td>

                            @if(
                                $asset->category &&
                                in_array(
                                    strtoupper(trim($asset->category->category_name)),
                                    ['CPU', 'LAPTOP']
                                )
                            )

                                @if($asset->storage)

                                    <span class="badge bg-info text-dark specification-badge">

                                        {{ $asset->storage }}

                                    </span>

                                @else

                                    <span class="text-muted">
                                        -
                                    </span>

                                @endif

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             SERIAL NUMBER
                        ================================== --}}
                        <td>

                            <span class="serial-number">

                                {{ $asset->serial_number ?? '-' }}

                            </span>

                        </td>


                        {{-- =================================
                             CATEGORY
                        ================================== --}}
                        <td>

                            <span class="category-name">

                                {{ $asset->category->category_name ?? '-' }}

                            </span>

                        </td>


                        {{-- =================================
                             LOCATION
                        ================================== --}}
                        <td>

                            <span class="location-name">

                                {{ $asset->location->location_name ?? '-' }}

                            </span>

                        </td>


                        {{-- =================================
                             EMPLOYEE
                        ================================== --}}
                        <td>

                            @if($asset->employee)

                                <div class="fw-semibold employee-name">

                                    {{ $asset->employee->employee_name }}

                                </div>

                                <small class="text-muted employee-code">

                                    {{ $asset->employee->employee_code }}

                                </small>

                            @else

                                <span class="text-muted employee-empty">

                                    Belum ada pemakai

                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             PURCHASE DATE
                        ================================== --}}
                        <td>

                            @if($asset->purchase_date)

                                <span class="purchase-date">

                                    {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d/m/Y') }}

                                </span>

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             PURCHASE PRICE
                        ================================== --}}
                        <td>

                            @if($asset->purchase_price !== null)

                                <span class="fw-semibold text-success purchase-price">

                                    Rp {{ number_format(
                                        $asset->purchase_price,
                                        0,
                                        ',',
                                        '.'
                                    ) }}

                                </span>

                            @else

                                <span class="text-muted">
                                    -
                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             STATUS
                        ================================== --}}
                        <td>

                            @if($asset->status == 'Ready')

                                <span class="badge bg-success status-badge">
                                    Ready
                                </span>


                            @elseif($asset->status == 'Checked Out')

                                <span class="badge bg-warning text-dark status-badge">
                                    Checked Out
                                </span>


                            @elseif($asset->status == 'Maintenance')

                                <span class="badge bg-info text-dark status-badge">
                                    Maintenance
                                </span>


                            @elseif($asset->status == 'Returned')

                                <span class="badge bg-primary status-badge">
                                    Returned
                                </span>


                            @elseif($asset->status == 'Retired')

                                <span class="badge bg-danger status-badge">
                                    Retired
                                </span>


                            @else

                                <span class="badge bg-secondary status-badge">

                                    {{ $asset->status ?? '-' }}

                                </span>

                            @endif

                        </td>


                        {{-- =================================
                             ACTION
                        ================================== --}}
                        <td class="text-center">

                            <div class="asset-actions">


                                {{-- VIEW --}}
                                <a
                                    href="{{ route('master-assets.show', $asset->id) }}"
                                    class="btn btn-sm btn-info text-white"
                                    title="View"
                                >

                                    <i class="fas fa-eye"></i>

                                </a>


                                {{-- EDIT --}}
                                <a
                                    href="{{ route('master-assets.edit', $asset->id) }}"
                                    class="btn btn-sm btn-warning"
                                    title="Edit"
                                >

                                    <i class="fas fa-edit"></i>

                                </a>


                                {{-- DELETE --}}
                                <form
                                    action="{{ route('master-assets.destroy', $asset->id) }}"
                                    method="POST"
                                    class="d-inline"
                                >

                                    @csrf

                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        onclick="return confirm('Delete this asset?')"
                                        class="btn btn-sm btn-danger"
                                        title="Delete"
                                    >

                                        <i class="fas fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>


                    @empty

                    <tr>

                        <td
                            colspan="14"
                            class="text-center"
                        >

                            <div class="py-5">

                                <i class="fas fa-box-open fa-4x text-secondary mb-3"></i>

                                <h5>
                                    Data Asset Belum Ada
                                </h5>

                                <p class="text-muted">
                                    Silakan tambahkan asset baru.
                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =================================================
         PAGINATION
    ================================================== --}}
    <div class="card-footer bg-white">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

            <small class="text-muted">

                Menampilkan
                {{ $assets->firstItem() ?? 0 }}
                -
                {{ $assets->lastItem() ?? 0 }}
                dari
                {{ $assets->total() }}
                asset

            </small>

            <div>

                {{ $assets->links() }}

            </div>

        </div>

    </div>

</div>

</div>

{{-- =====================================================
RESPONSIVE TABLE STYLE
====================================================== --}}

<style>

    /* =====================================================
       MAIN PAGE
    ====================================================== */

    .asset-page {
        width: 100%;
        max-width: 100%;
    }


    /* =====================================================
       HEADER
    ====================================================== */

    .asset-header {
        gap: 20px;
    }

    .asset-title {
        font-size: clamp(1.35rem, 2vw, 2rem);
    }


    /* =====================================================
       CARD
    ====================================================== */

    .asset-card {
        width: 100%;
        overflow: hidden;
    }


    .asset-card-header {
        padding: 1rem 1.1rem;
    }


    /* =====================================================
       TABLE WRAPPER
    ====================================================== */

    .asset-table-wrapper {

        width: 100%;

        overflow-x: auto;
        overflow-y: hidden;

        -webkit-overflow-scrolling: touch;

        scrollbar-width: thin;

    }


    /* =====================================================
       TABLE
    ====================================================== */

    .asset-table {

        width: 100%;

        /*
         * Jangan biarkan browser mengecilkan
         * semua kolom secara berlebihan.
         */
        min-width: 1550px;

        table-layout: auto;

        font-size: 13px;

    }


    /* =====================================================
       TABLE HEADER
    ====================================================== */

    .asset-table thead th {

        white-space: nowrap;

        font-size: 12px;

        font-weight: 700;

        vertical-align: middle;

        padding: 12px 10px;

    }


    /* =====================================================
       TABLE BODY
    ====================================================== */

    .asset-table tbody td {

        vertical-align: middle;

        padding: 10px;

        white-space: nowrap;

    }


    /* =====================================================
       COLUMN WIDTH
    ====================================================== */

    .col-no {
        width: 55px;
        min-width: 55px;
    }

    .col-asset {
        min-width: 180px;
    }

    .col-company {
        min-width: 180px;
    }

    .col-model {
        min-width: 150px;
    }

    .col-ram {
        min-width: 95px;
    }

    .col-storage {
        min-width: 125px;
    }

    .col-serial {
        min-width: 150px;
    }

    .col-category {
        min-width: 100px;
    }

    .col-location {
        min-width: 140px;
    }

    .col-employee {
        min-width: 170px;
    }

    .col-date {
        min-width: 115px;
    }

    .col-price {
        min-width: 145px;
    }

    .col-status {
        min-width: 115px;
    }

    .col-action {
        width: 125px;
        min-width: 125px;
    }


    /* =====================================================
       TEXT
    ====================================================== */

    .asset-name,
    .company-name,
    .model-name,
    .serial-number,
    .category-name,
    .location-name,
    .employee-name,
    .employee-code,
    .employee-empty,
    .purchase-date,
    .purchase-price {

        white-space: nowrap;

    }


    /* =====================================================
       BADGE
    ====================================================== */

    .specification-badge,
    .status-badge {

        white-space: nowrap;

        font-size: 11px;

        padding: 5px 8px;

    }


    /* =====================================================
       ACTION BUTTON
    ====================================================== */

    .asset-actions {

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 4px;

        flex-wrap: nowrap;

    }

    .asset-actions .btn {

        flex: 0 0 auto;

        width: 32px;

        height: 32px;

        padding: 0;

        display: inline-flex;

        align-items: center;

        justify-content: center;

    }


    /* =====================================================
       SCROLLBAR
    ====================================================== */

    .asset-table-wrapper::-webkit-scrollbar {

        height: 8px;

    }

    .asset-table-wrapper::-webkit-scrollbar-track {

        background: #f1f1f1;

    }

    .asset-table-wrapper::-webkit-scrollbar-thumb {

        background: #b8b8b8;

        border-radius: 10px;

    }

    .asset-table-wrapper::-webkit-scrollbar-thumb:hover {

        background: #888;

    }


    /* =====================================================
       RESPONSIVE - TABLET
    ====================================================== */

    @media (max-width: 992px) {

        .asset-header {

            align-items: flex-start !important;

        }

        .asset-header .btn {

            white-space: nowrap;

        }

        .asset-table {

            min-width: 1450px;

        }

    }


    /* =====================================================
       RESPONSIVE - MOBILE
    ====================================================== */

    @media (max-width: 768px) {

        .asset-header {

            flex-direction: column;

            width: 100%;

        }

        .asset-header > div {

            width: 100%;

        }

        .asset-header > a {

            width: 100%;

            text-align: center;

        }


        .asset-title {

            font-size: 1.35rem;

        }


        .asset-card-header {

            padding: 15px;

        }


        .asset-table {

            min-width: 1400px;

            font-size: 12px;

        }


        .asset-table thead th {

            font-size: 11px;

            padding: 10px 8px;

        }


        .asset-table tbody td {

            padding: 9px 8px;

        }

    }


    /* =====================================================
       VERY SMALL SCREEN
    ====================================================== */

    @media (max-width: 480px) {

        .asset-title {

            font-size: 1.2rem;

        }

        .asset-table {

            min-width: 1350px;

        }

    }

</style>

@endsection
