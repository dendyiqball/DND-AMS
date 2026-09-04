@extends('layouts.app')

@section('title', 'Detail Asset')

@section('content')

<div class="container-fluid">

<div class="row">

    <div class="col-lg-10 mx-auto">

        <div class="card shadow border-0">

            {{-- =====================================================
                 HEADER
            ====================================================== --}}
            <div class="card-header bg-info text-white">

                <div class="d-flex justify-content-between align-items-center">

                    <h4 class="mb-0">

                        <i class="fa-solid fa-circle-info me-2"></i>

                        Detail Asset

                    </h4>

                    <a
                        href="{{ route('master-assets.index') }}"
                        class="btn btn-light"
                    >

                        <i class="fa fa-arrow-left me-1"></i>

                        Kembali

                    </a>

                </div>

            </div>


            {{-- =====================================================
                 BODY
            ====================================================== --}}
            <div class="card-body">

                <div class="row">

                    {{-- =================================================
                         DATA UTAMA
                    ================================================== --}}
                    <div class="col-md-6">

                        <table class="table table-borderless">

                            {{-- COMPANY --}}
                            <tr>

                                <th width="180">
                                    Company
                                </th>

                                <td>
                                    :
                                    {{ $asset->company->company_name ?? '-' }}
                                </td>

                            </tr>


                            {{-- CATEGORY --}}
                            <tr>

                                <th>
                                    Category
                                </th>

                                <td>
                                    :
                                    {{ $asset->category->category_name ?? '-' }}
                                </td>

                            </tr>


                            {{-- LOCATION --}}
                            <tr>

                                <th>
                                    Location
                                </th>

                                <td>
                                    :
                                    {{ $asset->location->location_name ?? '-' }}
                                </td>

                            </tr>


                            {{-- EMPLOYEE --}}
                            <tr>

                                <th>
                                    Employee / Pemakai
                                </th>

                                <td>

                                    :

                                    @if($asset->employee)

                                        <span class="fw-semibold">
                                            {{ $asset->employee->employee_name }}
                                        </span>

                                        <small class="text-muted">
                                            ({{ $asset->employee->employee_code }})
                                        </small>

                                    @else

                                        <span class="text-muted">
                                            Belum ada pemakai
                                        </span>

                                    @endif

                                </td>

                            </tr>


                            {{-- ASSET NAME --}}
                            <tr>

                                <th>
                                    Asset Name
                                </th>

                                <td>
                                    :
                                    {{ $asset->asset_name ?? '-' }}
                                </td>

                            </tr>


                            {{-- SERIAL NUMBER --}}
                            <tr>

                                <th>
                                    Serial Number
                                </th>

                                <td>
                                    :
                                    {{ $asset->serial_number ?? '-' }}
                                </td>

                            </tr>

                        </table>

                    </div>


                    {{-- =================================================
                         SPESIFIKASI ASSET
                    ================================================== --}}
                    <div class="col-md-6">

                        <table class="table table-borderless">

                            {{-- BRAND --}}
                            <tr>

                                <th width="180">
                                    Brand
                                </th>

                                <td>
                                    :
                                    {{ $asset->brand ?? '-' }}
                                </td>

                            </tr>


                            {{-- MODEL --}}
                            <tr>

                                <th>
                                    Model
                                </th>

                                <td>
                                    :
                                    {{ $asset->model ?? '-' }}
                                </td>

                            </tr>


                            {{-- RAM --}}
                            <tr>

                                <th>
                                    RAM
                                </th>

                                <td>

                                    :

                                    @if(
                                        $asset->category &&
                                        in_array(
                                            strtoupper(trim($asset->category->category_name)),
                                            ['CPU', 'LAPTOP']
                                        )
                                    )

                                        @if($asset->ram)

                                            <span class="badge bg-primary">
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

                            </tr>


                            {{-- STORAGE --}}
                            <tr>

                                <th>
                                    SSD / Storage
                                </th>

                                <td>

                                    :

                                    @if(
                                        $asset->category &&
                                        in_array(
                                            strtoupper(trim($asset->category->category_name)),
                                            ['CPU', 'LAPTOP']
                                        )
                                    )

                                        @if($asset->storage)

                                            <span class="badge bg-info text-dark">
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

                            </tr>


                            {{-- =================================================
                                 PURCHASE DATE
                            ================================================== --}}
                            <tr>

                                <th>
                                    Purchase Date
                                </th>

                                <td>
                                    :

                                    @if($asset->purchase_date)

                                        {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d/m/Y') }}

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </td>

                            </tr>


                            {{-- =================================================
                                 PURCHASE PRICE
                            ================================================== --}}
                            <tr>

                                <th>
                                    Purchase Price
                                </th>

                                <td>
                                    :

                                    @if($asset->purchase_price !== null)

                                        <span class="fw-bold text-success">

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

                            </tr>


                            {{-- =================================================
                                 STATUS
                            ================================================== --}}
                            <tr>

                                <th>
                                    Status
                                </th>

                                <td>

                                    :

                                    @if($asset->status == 'Ready')

                                        <span class="badge bg-success">
                                            Ready
                                        </span>


                                    @elseif($asset->status == 'Checked Out')

                                        <span class="badge bg-warning text-dark">
                                            Checked Out
                                        </span>


                                    @elseif($asset->status == 'Maintenance')

                                        <span class="badge bg-info text-dark">
                                            Maintenance
                                        </span>


                                    @elseif($asset->status == 'Returned')

                                        <span class="badge bg-primary">
                                            Returned
                                        </span>


                                    @elseif($asset->status == 'Retired')

                                        <span class="badge bg-danger">
                                            Retired
                                        </span>


                                    @else

                                        <span class="badge bg-secondary">
                                            {{ $asset->status ?? '-' }}
                                        </span>

                                    @endif

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>


                {{-- =====================================================
                     NOTES
                ====================================================== --}}

                <hr>

                <h5 class="mb-3">

                    <i class="fa-solid fa-note-sticky me-2"></i>

                    Notes

                </h5>

                <div class="border rounded p-3 bg-light">

                    @if($asset->notes)

                        {{ $asset->notes }}

                    @else

                        <span class="text-muted">
                            Tidak ada catatan.
                        </span>

                    @endif

                </div>

            </div>


            {{-- =====================================================
                 FOOTER BUTTON
            ====================================================== --}}

            <div class="card-footer text-end">

                <a
                    href="{{ route('master-assets.edit', $asset->id) }}"
                    class="btn btn-warning"
                >

                    <i class="fa fa-edit me-1"></i>

                    Edit

                </a>


                <a
                    href="{{ route('master-assets.index') }}"
                    class="btn btn-secondary"
                >

                    <i class="fa fa-arrow-left me-1"></i>

                    Kembali

                </a>

            </div>

        </div>

    </div>

</div>

</div>

@endsection
