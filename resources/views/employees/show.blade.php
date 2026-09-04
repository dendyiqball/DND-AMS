@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title mb-1">
                <i class="fa-solid fa-circle-info me-2"></i>
                Detail Employee
            </h2>

            <p class="text-muted mb-0">
                Informasi detail employee.
            </p>

        </div>

        <a href="{{ route('master-employees.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>
            Kembali

        </a>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-body p-4">


                    {{-- Icon --}}
                    <div class="text-center mb-4">

                        <div
                            class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:80px;height:80px;">

                            <i class="fa-solid fa-user fa-2x"></i>

                        </div>

                    </div>


                    {{-- Title --}}
                    <div class="text-center mb-4">

                        <h4 class="fw-bold mb-1">
                            {{ $employee->employee_name }}
                        </h4>

                        <span class="badge bg-primary">
                            {{ $employee->employee_code }}
                        </span>

                    </div>


                    <hr>


                    {{-- Employee Code --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-id-card me-2"></i>
                            Employee Code

                        </div>

                        <div class="col-sm-7 fw-semibold">

                            {{ $employee->employee_code }}

                        </div>

                    </div>


                    {{-- Name --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-user me-2"></i>
                            Nama Employee

                        </div>

                        <div class="col-sm-7 fw-semibold">

                            {{ $employee->employee_name }}

                        </div>

                    </div>


                    {{-- Department --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-building me-2"></i>
                            Department

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->department ?? '-' }}

                        </div>

                    </div>


                    {{-- Position --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-briefcase me-2"></i>
                            Position

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->position ?? '-' }}

                        </div>

                    </div>


                    {{-- Email --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-envelope me-2"></i>
                            Email

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->email ?? '-' }}

                        </div>

                    </div>


                    {{-- Phone --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-phone me-2"></i>
                            Phone

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->phone ?? '-' }}

                        </div>

                    </div>


                    {{-- Status --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-circle-check me-2"></i>
                            Status

                        </div>

                        <div class="col-sm-7">

                            @if($employee->status === 'Active')

                                <span class="badge bg-success">
                                    Active
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Inactive
                                </span>

                            @endif

                        </div>

                    </div>


                    {{-- Created --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-calendar-plus me-2"></i>
                            Dibuat

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->created_at
                                ? $employee->created_at->format('d M Y H:i')
                                : '-' }}

                        </div>

                    </div>


                    {{-- Updated --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-clock-rotate-left me-2"></i>
                            Terakhir Diperbarui

                        </div>

                        <div class="col-sm-7">

                            {{ $employee->updated_at
                                ? $employee->updated_at->format('d M Y H:i')
                                : '-' }}

                        </div>

                    </div>


                    <hr>


                    {{-- Action --}}
                    <div class="d-flex justify-content-end gap-2 mt-3">

                        <a href="{{ route('master-employees.index') }}"
                           class="btn btn-secondary">

                            <i class="fa-solid fa-arrow-left me-2"></i>
                            Kembali

                        </a>


                        <a href="{{ route('master-employees.edit', $employee->id) }}"
                           class="btn btn-warning">

                            <i class="fa-solid fa-pen me-2"></i>
                            Edit

                        </a>


                        <form action="{{ route('master-employees.destroy', $employee->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus employee ini?');">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">

                                <i class="fa-solid fa-trash me-2"></i>
                                Hapus

                            </button>

                        </form>

                    </div>


                    {{-- Assets --}}
                    @if($employee->assets->count() > 0)

                        <hr class="my-4">

                        <h5 class="fw-bold mb-3">

                            <i class="fa-solid fa-laptop me-2"></i>
                            Asset yang Digunakan

                        </h5>


                        <div class="table-responsive">

                            <table class="table table-hover align-middle">

                                <thead class="table-light">

                                    <tr>

                                        <th>
                                            Asset
                                        </th>

                                        <th>
                                            Asset Code
                                        </th>

                                        <th>
                                            Serial Number
                                        </th>

                                        <th>
                                            Status
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach($employee->assets as $asset)

                                        <tr>

                                            <td>
                                                {{ $asset->asset_name }}
                                            </td>

                                            <td>
                                                {{ $asset->asset_code }}
                                            </td>

                                            <td>
                                                {{ $asset->serial_number ?? '-' }}
                                            </td>

                                            <td>
                                                {{ $asset->status }}
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="alert alert-light border mt-4 mb-0">

                            <i class="fa-solid fa-circle-info me-2"></i>

                            Employee ini belum menggunakan asset.

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</div>

@endsection