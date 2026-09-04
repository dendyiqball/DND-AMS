@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">Detail Company</h2>

        <small class="text-muted">
            Informasi detail company
        </small>
    </div>

    <a href="{{ route('master-companies.index') }}"
       class="btn btn-secondary">

        <i class="fa-solid fa-arrow-left"></i>
        Kembali

    </a>

</div>


<div class="card">

    <div class="card-header bg-primary text-white">

        <i class="fa-solid fa-building"></i>

        Detail Company

    </div>


    <div class="card-body">

        <div class="row mb-3">

            <div class="col-md-3 fw-bold">
                ID Company
            </div>

            <div class="col-md-9">
                {{ $company->id }}
            </div>

        </div>


        <div class="row mb-3">

            <div class="col-md-3 fw-bold">
                Nama Company
            </div>

            <div class="col-md-9">
                {{ $company->company_name }}
            </div>

        </div>


        <div class="row mb-3">

            <div class="col-md-3 fw-bold">
                Dibuat
            </div>

            <div class="col-md-9">
                {{ $company->created_at?->format('d-m-Y H:i') }}
            </div>

        </div>


        <div class="row mb-3">

            <div class="col-md-3 fw-bold">
                Terakhir diperbarui
            </div>

            <div class="col-md-9">
                {{ $company->updated_at?->format('d-m-Y H:i') }}
            </div>

        </div>


        <div class="mt-4">

            <a href="{{ route('master-companies.edit', $company->id) }}"
               class="btn btn-warning">

                <i class="fa-solid fa-pen"></i>
                Edit

            </a>

        </div>

    </div>

</div>

@endsection