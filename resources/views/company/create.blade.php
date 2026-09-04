@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">Tambah Company</h2>

        <small class="text-muted">
            Tambahkan perusahaan baru ke sistem
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

        Form Data Company

    </div>


    <div class="card-body">

        <form action="{{ route('master-companies.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label class="form-label">
                    Nama Company
                </label>

                <input type="text"
                       name="company_name"
                       class="form-control @error('company_name') is-invalid @enderror"
                       value="{{ old('company_name') }}"
                       placeholder="Masukkan nama company"
                       required>

                @error('company_name')

                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <div class="d-flex justify-content-end gap-2">

                <a href="{{ route('master-companies.index') }}"
                   class="btn btn-secondary">

                    Batal

                </a>

                <button type="submit"
                        class="btn btn-primary">

                    <i class="fa-solid fa-save"></i>
                    Simpan

                </button>

            </div>

        </form>

    </div>

</div>

@endsection