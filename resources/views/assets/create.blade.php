@extends('layouts.app')

@section('content')

<div class="container-fluid">

{{-- =========================
     HEADER
========================== --}}

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold text-dark mb-1">

            <i class="fas fa-plus-square text-primary me-2"></i>

            Tambah Asset

        </h2>

        <small class="text-muted">
            Tambahkan data asset baru ke sistem
        </small>

    </div>


    <a href="{{ route('master-assets.index') }}"
       class="btn btn-secondary shadow-sm">

        <i class="fas fa-arrow-left me-1"></i>

        Kembali

    </a>

</div>


{{-- =========================
     ERROR VALIDATION
========================== --}}

@if ($errors->any())

    <div class="alert alert-danger">

        <strong>
            Terdapat kesalahan:
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


{{-- =========================
     CARD
========================== --}}

<div class="card border-0 shadow-lg">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            <i class="fas fa-laptop me-2"></i>

            Form Data Asset

        </h5>

    </div>


    <div class="card-body">

        <form
            action="{{ route('master-assets.store') }}"
            method="POST"
            id="assetForm">

            @csrf


            <div class="row">


                {{-- =====================================
                     LEFT COLUMN
                ====================================== --}}

                <div class="col-lg-6">


                    {{-- Asset Name --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Asset Name
                        </label>

                        <input
                            type="text"
                            name="asset_name"
                            class="form-control @error('asset_name') is-invalid @enderror"
                            value="{{ old('asset_name') }}"
                            placeholder="Masukkan Asset Name"
                            required>

                        @error('asset_name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Serial Number --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Serial Number
                        </label>

                        <input
                            type="text"
                            name="serial_number"
                            class="form-control @error('serial_number') is-invalid @enderror"
                            value="{{ old('serial_number') }}"
                            placeholder="Masukkan Serial Number"
                            required>

                        @error('serial_number')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Brand --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Brand
                        </label>

                        <input
                            type="text"
                            name="brand"
                            class="form-control @error('brand') is-invalid @enderror"
                            value="{{ old('brand') }}"
                            placeholder="Contoh : Lenovo"
                            required>

                        @error('brand')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Model --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Model
                        </label>

                        <input
                            type="text"
                            name="model"
                            class="form-control @error('model') is-invalid @enderror"
                            value="{{ old('model') }}"
                            placeholder="Contoh : ThinkPad T14 Gen 2"
                            required>

                        @error('model')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- RAM --}}
                    <div
                        class="mb-3"
                        id="ram-field"
                        style="display: none;">

                        <label class="form-label fw-semibold">
                            RAM
                        </label>

                        <input
                            type="text"
                            name="ram"
                            id="ram"
                            class="form-control @error('ram') is-invalid @enderror"
                            value="{{ old('ram') }}"
                            placeholder="Contoh : 16 GB">

                        @error('ram')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Storage / SSD --}}
                    <div
                        class="mb-3"
                        id="storage-field"
                        style="display: none;">

                        <label class="form-label fw-semibold">
                            Storage / SSD
                        </label>

                        <input
                            type="text"
                            name="storage"
                            id="storage"
                            class="form-control @error('storage') is-invalid @enderror"
                            value="{{ old('storage') }}"
                            placeholder="Contoh : 512 GB SSD">

                        @error('storage')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Company --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Company
                        </label>

                        <select
                            name="company_id"
                            class="form-select @error('company_id') is-invalid @enderror"
                            required>

                            <option value="">
                                -- Pilih Company --
                            </option>

                            @foreach($companies as $company)

                                <option
                                    value="{{ $company->id }}"
                                    {{ old('company_id') == $company->id ? 'selected' : '' }}>

                                    {{ $company->company_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('company_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Category --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Category
                        </label>

                        <select
                            name="category_id"
                            id="category_id"
                            class="form-select @error('category_id') is-invalid @enderror"
                            required>

                            <option value="">
                                -- Pilih Category --
                            </option>

                            @foreach($categories as $category)

                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->category_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('category_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>


                {{-- =====================================
                     RIGHT COLUMN
                ====================================== --}}

                <div class="col-lg-6">


                    {{-- Location --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Location
                        </label>

                        <select
                            name="location_id"
                            class="form-select @error('location_id') is-invalid @enderror"
                            required>

                            <option value="">
                                -- Pilih Location --
                            </option>

                            @foreach($locations as $location)

                                <option
                                    value="{{ $location->id }}"
                                    {{ old('location_id') == $location->id ? 'selected' : '' }}>

                                    {{ $location->location_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('location_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Employee / Pemakai --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Employee / Pemakai
                        </label>

                        <select
                            name="employee_id"
                            class="form-select @error('employee_id') is-invalid @enderror">

                            <option value="">
                                -- Belum Ada Pemakai --
                            </option>

                            @foreach($employees as $employee)

                                <option
                                    value="{{ $employee->id }}"
                                    {{ old('employee_id') == $employee->id ? 'selected' : '' }}>

                                    {{ $employee->employee_code }}
                                    -
                                    {{ $employee->employee_name }}

                                </option>

                            @endforeach

                        </select>

                        @error('employee_id')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                        <small class="text-muted">
                            Pilih employee yang menggunakan asset ini.
                        </small>

                    </div>


                    {{-- Purchase Date --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Purchase Date
                        </label>

                        <input
                            type="date"
                            name="purchase_date"
                            class="form-control @error('purchase_date') is-invalid @enderror"
                            value="{{ old('purchase_date') }}">

                        @error('purchase_date')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- =================================================
                         PURCHASE PRICE
                    ================================================== --}}

                    <div class="mb-3">

                        <label
                            for="purchase_price"
                            class="form-label fw-semibold">

                            Purchase Price

                        </label>

                        <input
                            type="text"
                            name="purchase_price"
                            id="purchase_price"
                            class="form-control @error('purchase_price') is-invalid @enderror"
                            value="{{ old('purchase_price') }}"
                            placeholder="Contoh : Rp 5.000.000"
                            autocomplete="off"
                            inputmode="numeric">

                        @error('purchase_price')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                        <small class="text-muted">
                            Masukkan harga dalam Rupiah.
                            Contoh: Rp 5.000.000
                        </small>

                    </div>


                    {{-- Status --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select @error('status') is-invalid @enderror"
                            required>

                            <option value="">
                                -- Pilih Status --
                            </option>

                            <option
                                value="Ready"
                                {{ old('status') == 'Ready' ? 'selected' : '' }}>

                                Ready

                            </option>

                            <option
                                value="Checked Out"
                                {{ old('status') == 'Checked Out' ? 'selected' : '' }}>

                                Checked Out

                            </option>

                            <option
                                value="Maintenance"
                                {{ old('status') == 'Maintenance' ? 'selected' : '' }}>

                                Maintenance

                            </option>

                            <option
                                value="Returned"
                                {{ old('status') == 'Returned' ? 'selected' : '' }}>

                                Returned

                            </option>

                            <option
                                value="Retired"
                                {{ old('status') == 'Retired' ? 'selected' : '' }}>

                                Retired

                            </option>

                        </select>

                        @error('status')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Notes --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Notes
                        </label>

                        <textarea
                            name="notes"
                            rows="5"
                            class="form-control @error('notes') is-invalid @enderror"
                            placeholder="Tambahkan catatan asset...">{{ old('notes') }}</textarea>

                        @error('notes')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                </div>

            </div>


            <hr>


            {{-- BUTTON --}}

            <div class="text-end">

                <a
                    href="{{ route('master-assets.index') }}"
                    class="btn btn-outline-secondary px-4">

                    <i class="fas fa-times me-1"></i>

                    Batal

                </a>


                <button
                    type="submit"
                    class="btn btn-primary px-4">

                    <i class="fas fa-save me-1"></i>

                    Simpan Asset

                </button>

            </div>


        </form>

    </div>

</div>

</div>

{{-- =====================================================
JAVASCRIPT
RAM + STORAGE + PURCHASE PRICE
====================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =====================================================
       ELEMENT
    ====================================================== */

    const categorySelect =
        document.getElementById('category_id');

    const ramField =
        document.getElementById('ram-field');

    const storageField =
        document.getElementById('storage-field');

    const ramInput =
        document.getElementById('ram');

    const storageInput =
        document.getElementById('storage');

    const purchasePrice =
        document.getElementById('purchase_price');

    const assetForm =
        document.getElementById('assetForm');


    /* =====================================================
       RAM & STORAGE
       Hanya untuk CPU dan LAPTOP
    ====================================================== */

    function toggleRamStorage() {

        if (!categorySelect) {
            return;
        }

        const selectedOption =
            categorySelect.options[
                categorySelect.selectedIndex
            ];

        if (!selectedOption) {
            return;
        }

        const categoryName =
            selectedOption.text
                .trim()
                .toUpperCase();


        const showRamStorage =
            categoryName === 'CPU' ||
            categoryName === 'LAPTOP';


        if (showRamStorage) {

            ramField.style.display = 'block';

            storageField.style.display = 'block';

        } else {

            ramField.style.display = 'none';

            storageField.style.display = 'none';


            if (ramInput) {
                ramInput.value = '';
            }

            if (storageInput) {
                storageInput.value = '';
            }

        }

    }


    /* =====================================================
       FORMAT RUPIAH
       
       Contoh:
       5000       -> Rp 5.000
       500000     -> Rp 500.000
       5500000    -> Rp 5.500.000
       10000000   -> Rp 10.000.000
    ====================================================== */

    function formatRupiah(value) {

        let number =
            value.replace(/[^0-9]/g, '');


        if (number === '') {
            return '';
        }


        return 'Rp ' +
            new Intl.NumberFormat('id-ID')
                .format(Number(number));

    }


    /* =====================================================
       PURCHASE PRICE
       FORMAT SAAT DIKETIK
    ====================================================== */

    if (purchasePrice) {

        purchasePrice.addEventListener(
            'input',
            function () {

                this.value =
                    formatRupiah(this.value);

            }
        );


        /*
         * Jika ada old value setelah
         * validasi gagal, langsung format.
         */

        if (purchasePrice.value !== '') {

            purchasePrice.value =
                formatRupiah(
                    purchasePrice.value
                );

        }

    }


    /* =====================================================
       SEBELUM SUBMIT
       
       Ubah:
       Rp 5.500.000

       menjadi:

       5500000

       Agar Laravel dapat membaca sebagai numeric.
    ====================================================== */

    if (assetForm) {

        assetForm.addEventListener(
            'submit',
            function () {

                if (purchasePrice) {

                    purchasePrice.value =
                        purchasePrice.value
                            .replace(/[^0-9]/g, '');

                }

            }
        );

    }


    /* =====================================================
       JALANKAN SAAT HALAMAN DIBUKA
    ====================================================== */

    toggleRamStorage();


    /* =====================================================
       JALANKAN SAAT CATEGORY BERUBAH
    ====================================================== */

    if (categorySelect) {

        categorySelect.addEventListener(
            'change',
            toggleRamStorage
        );

    }

});

</script>

@endsection
