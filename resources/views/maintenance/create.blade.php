@extends('layouts.app')

@section('title', 'Tambah Maintenance')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Tambah Maintenance
            </h4>

            <p class="text-muted mb-0">
                Tambahkan data maintenance asset
            </p>

        </div>

        <a
            href="{{ route('maintenances.index') }}"
            class="btn btn-secondary"
        >
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>



    {{-- ERROR --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- FORM --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white py-3">

            <h5 class="mb-0 fw-semibold">

                <i class="bi bi-tools text-primary me-2"></i>

                Form Maintenance

            </h5>

        </div>


        <div class="card-body">

            <form
                action="{{ route('maintenances.store') }}"
                method="POST"
            >

                @csrf

                @include(
                    'maintenance.partials.form'
                )


                <div class="d-flex justify-content-end gap-2 mt-4">

                    <a
                        href="{{ route('maintenances.index') }}"
                        class="btn btn-secondary"
                    >

                        <i class="bi bi-x-circle"></i>

                        Batal

                    </a>


                    <button
                        type="submit"
                        class="btn btn-primary"
                    >

                        <i class="bi bi-save"></i>

                        Simpan Maintenance

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection