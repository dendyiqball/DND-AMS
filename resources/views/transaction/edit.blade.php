@extends('layouts.app')

@section('title', 'Edit Asset Transaction')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                <i class="fas fa-pen-to-square text-warning me-2"></i>

                Edit Asset Transaction

            </h2>

            <small class="text-muted">
                Perbarui data transaksi asset
            </small>

        </div>


        {{-- KEMBALI KE LIST --}}

        <a
            href="{{ route('asset-transactions.index') }}"
            class="btn btn-secondary shadow-sm"
        >

            <i class="fas fa-arrow-left me-1"></i>

            Kembali

        </a>

    </div>


    {{-- =====================================================
         ERROR VALIDATION
    ====================================================== --}}

    @if ($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <strong>

                <i class="fas fa-circle-exclamation me-1"></i>

                Terjadi Kesalahan

            </strong>

            <hr>

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         FORM CARD
    ====================================================== --}}

    <div class="card shadow border-0">

        {{-- CARD HEADER --}}

        <div class="card-header bg-warning text-dark">

            <h5 class="mb-0">

                <i class="fas fa-right-left me-2"></i>

                Form Edit Asset Transaction

            </h5>

        </div>


        {{-- CARD BODY --}}

        <div class="card-body">

            <form
                action="{{ route('asset-transactions.update', $transaction->id) }}"
                method="POST"
            >

                @csrf

                @method('PUT')


                {{-- =================================================
                     FORM TRANSACTION
                     Semua field + tombol sudah ada di partial
                ================================================== --}}

                @include('transaction.partials.form')


            </form>

        </div>

    </div>

</div>

@endsection