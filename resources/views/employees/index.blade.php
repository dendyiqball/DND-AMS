@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-title mb-1">
                <i class="fa-solid fa-users me-2"></i>
                Employees
            </h2>

            <p class="text-muted mb-0">
                Kelola data employee pengguna asset
            </p>
        </div>

        <a href="{{ route('master-employees.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-2"></i>
            Tambah Employee

        </a>

    </div>


    {{-- Alert Success --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fa-solid fa-circle-check me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Alert Error --}}
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <i class="fa-solid fa-circle-exclamation me-2"></i>

            {{ session('error') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Validation Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- Card --}}
    <div class="card">

        <div class="card-body">


            {{-- Table Header --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Data Employees
                    </h5>

                    <small class="text-muted">
                        Daftar employee pengguna asset
                    </small>

                </div>


                <span class="badge bg-primary rounded-pill px-3 py-2">

                    {{ $employees->total() }} Employees

                </span>

            </div>


            {{-- Table --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="60">
                                No
                            </th>

                            <th>
                                Employee
                            </th>

                            <th>
                                Department
                            </th>

                            <th>
                                Position
                            </th>

                            <th>
                                Email
                            </th>

                            <th>
                                Status
                            </th>

                            <th width="150" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($employees as $employee)

                            <tr>

                                {{-- No --}}
                                <td>
                                    {{ $employees->firstItem() + $loop->index }}
                                </td>


                                {{-- Employee --}}
                                <td>

                                    <div class="d-flex align-items-center">

                                        <div
                                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                            style="width:40px;height:40px;">

                                            <i class="fa-solid fa-user"></i>

                                        </div>


                                        <div>

                                            <div class="fw-semibold">

                                                {{ $employee->employee_name }}

                                            </div>

                                            <small class="text-muted">

                                                {{ $employee->employee_code }}

                                            </small>

                                        </div>

                                    </div>

                                </td>


                                {{-- Department --}}
                                <td>

                                    {{ $employee->department ?? '-' }}

                                </td>


                                {{-- Position --}}
                                <td>

                                    {{ $employee->position ?? '-' }}

                                </td>


                                {{-- Email --}}
                                <td>

                                    {{ $employee->email ?? '-' }}

                                </td>


                                {{-- Status --}}
                                <td>

                                    @if($employee->status === 'Active')

                                        <span class="badge bg-success">
                                            Active
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- Action --}}
                                <td class="text-center">

                                    {{-- Detail --}}
                                    <a
                                        href="{{ route('master-employees.show', $employee->id) }}"
                                        class="btn btn-sm btn-info text-white"
                                        title="Detail">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>


                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('master-employees.edit', $employee->id) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Edit">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('master-employees.destroy', $employee->id) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus employee ini?');">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="7"
                                    class="text-center py-5">

                                    <i class="fa-solid fa-users fa-3x text-muted mb-3"></i>

                                    <h6 class="fw-bold">
                                        Belum ada data employee
                                    </h6>

                                    <p class="text-muted mb-3">
                                        Silakan tambahkan employee terlebih dahulu.
                                    </p>

                                    <a
                                        href="{{ route('master-employees.create') }}"
                                        class="btn btn-primary">

                                        <i class="fa-solid fa-plus me-2"></i>

                                        Tambah Employee

                                    </a>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($employees->hasPages())

                <div class="d-flex justify-content-between align-items-center mt-3">

                    <small class="text-muted">

                        Showing
                        {{ $employees->firstItem() }}
                        to
                        {{ $employees->lastItem() }}
                        of
                        {{ $employees->total() }}
                        results

                    </small>


                    <div>

                        {{ $employees->links('pagination::bootstrap-5') }}

                    </div>

                </div>

            @endif


        </div>

    </div>

</div>

@endsection