@extends('layouts.app')

@section('title','Tambah Asset Transaction')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                <i class="fas fa-right-left text-primary me-2"></i>
                Tambah Asset Transaction
            </h2>

            <small class="text-muted">
                Check In / Check Out Asset
            </small>

        </div>

        <a href="{{ route('asset-transactions.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left me-1"></i>

            Kembali

        </a>

    </div>

    {{-- Validation --}}
    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>

                <i class="fas fa-circle-exclamation"></i>

                Terjadi Kesalahan

            </strong>

            <hr>

            <ul class="mb-0">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <div class="card shadow border-0">

        <div class="card-body">

            <form action="{{ route('asset-transactions.store') }}" method="POST">

                @csrf

                @include('transaction.partials.form')

            </form>

        </div>

    </div>

</div>

@endsection