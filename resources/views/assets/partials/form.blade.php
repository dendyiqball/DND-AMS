```blade
{{-- =========================================================
     FORM DATA ASSET
========================================================= --}}

<div class="row">

    {{-- =====================================================
         COMPANY
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="company_id" class="form-label">
            Company
        </label>

        <select
            name="company_id"
            id="company_id"
            class="form-select @error('company_id') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Company --
            </option>

            @foreach($companies as $company)

                <option
                    value="{{ $company->id }}"
                    {{ old('company_id', $asset->company_id ?? '') == $company->id ? 'selected' : '' }}
                >
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


    {{-- =====================================================
         CATEGORY
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="category_id" class="form-label">
            Category
        </label>

        <select
            name="category_id"
            id="category_id"
            class="form-select @error('category_id') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Category --
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    {{ old('category_id', $asset->category_id ?? '') == $category->id ? 'selected' : '' }}
                >
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


    {{-- =====================================================
         LOCATION
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="location_id" class="form-label">
            Location
        </label>

        <select
            name="location_id"
            id="location_id"
            class="form-select @error('location_id') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Location --
            </option>

            @foreach($locations as $location)

                <option
                    value="{{ $location->id }}"
                    {{ old('location_id', $asset->location_id ?? '') == $location->id ? 'selected' : '' }}
                >
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


    {{-- =====================================================
         EMPLOYEE / PEMAKAI
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="employee_id" class="form-label">
            Employee / Pemakai
        </label>

        <select
            name="employee_id"
            id="employee_id"
            class="form-select @error('employee_id') is-invalid @enderror"
        >

            <option value="">
                -- Belum Ada Pemakai --
            </option>

            @foreach($employees as $employee)

                <option
                    value="{{ $employee->id }}"
                    {{ old('employee_id', $asset->employee_id ?? '') == $employee->id ? 'selected' : '' }}
                >
                    {{ $employee->employee_code }} - {{ $employee->employee_name }}
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


    {{-- =====================================================
         ASSET NAME
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="asset_name" class="form-label">
            Asset Name
        </label>

        <input
            type="text"
            name="asset_name"
            id="asset_name"
            class="form-control @error('asset_name') is-invalid @enderror"
            value="{{ old('asset_name', $asset->asset_name ?? '') }}"
            placeholder="Masukkan nama asset"
            required
        >

        @error('asset_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         SERIAL NUMBER
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="serial_number" class="form-label">
            Serial Number
        </label>

        <input
            type="text"
            name="serial_number"
            id="serial_number"
            class="form-control @error('serial_number') is-invalid @enderror"
            value="{{ old('serial_number', $asset->serial_number ?? '') }}"
            placeholder="Masukkan Serial Number"
            required
        >

        @error('serial_number')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         MODEL
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="model" class="form-label">
            Model
        </label>

        <input
            type="text"
            name="model"
            id="model"
            class="form-control @error('model') is-invalid @enderror"
            value="{{ old('model', $asset->model ?? '') }}"
            placeholder="Contoh : ThinkPad T14 Gen 2"
            required
        >

        @error('model')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         BRAND
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="brand" class="form-label">
            Brand
        </label>

        <input
            type="text"
            name="brand"
            id="brand"
            class="form-control @error('brand') is-invalid @enderror"
            value="{{ old('brand', $asset->brand ?? '') }}"
            placeholder="Contoh : Lenovo"
            required
        >

        @error('brand')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         RAM
         HANYA UNTUK LAPTOP DAN CPU
    ====================================================== --}}
    <div
        class="col-md-6 mb-3"
        id="ram-wrapper"
    >

        <label for="ram" class="form-label">
            RAM
        </label>

        <input
            type="text"
            name="ram"
            id="ram"
            class="form-control @error('ram') is-invalid @enderror"
            value="{{ old('ram', $asset->ram ?? '') }}"
            placeholder="Contoh : 16 GB"
        >

        @error('ram')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         STORAGE
         MENGGUNAKAN KOLOM DATABASE: storage
         HANYA UNTUK LAPTOP DAN CPU
    ====================================================== --}}
    <div
        class="col-md-6 mb-3"
        id="storage-wrapper"
    >

        <label for="storage" class="form-label">
            SSD / Storage
        </label>

        <input
            type="text"
            name="storage"
            id="storage"
            class="form-control @error('storage') is-invalid @enderror"
            value="{{ old('storage', $asset->storage ?? '') }}"
            placeholder="Contoh : 512 GB SSD"
        >

        @error('storage')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         PURCHASE DATE
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="purchase_date" class="form-label">
            Purchase Date
        </label>

        <input
            type="date"
            name="purchase_date"
            id="purchase_date"
            class="form-control @error('purchase_date') is-invalid @enderror"
            value="{{ old(
                'purchase_date',
                isset($asset->purchase_date) && $asset->purchase_date
                    ? $asset->purchase_date->format('Y-m-d')
                    : ''
            ) }}"
        >

        @error('purchase_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         PURCHASE PRICE
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="purchase_price" class="form-label">
            Purchase Price
        </label>

        <div class="input-group">

            <span class="input-group-text">
                Rp
            </span>

            <input
                type="text"
                name="purchase_price"
                id="purchase_price"
                class="form-control @error('purchase_price') is-invalid @enderror"
                value="{{ old(
                    'purchase_price',
                    isset($asset->purchase_price) && $asset->purchase_price !== null
                        ? number_format((float) $asset->purchase_price, 0, ',', '.')
                        : ''
                ) }}"
                placeholder="5.000.000"
                autocomplete="off"
                inputmode="numeric"
            >

        </div>

        @error('purchase_price')
            <div class="invalid-feedback d-block">
                {{ $message }}
            </div>
        @enderror

        <small class="text-muted">
            Masukkan harga pembelian asset.
        </small>

    </div>


    {{-- =====================================================
         STATUS
    ====================================================== --}}
    <div class="col-md-6 mb-3">

        <label for="status" class="form-label">
            Status
        </label>

        <select
            name="status"
            id="status"
            class="form-select @error('status') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Status --
            </option>

            <option
                value="Ready"
                {{ old('status', $asset->status ?? '') == 'Ready' ? 'selected' : '' }}
            >
                Ready
            </option>

            <option
                value="Checked Out"
                {{ old('status', $asset->status ?? '') == 'Checked Out' ? 'selected' : '' }}
            >
                Checked Out
            </option>

            <option
                value="Maintenance"
                {{ old('status', $asset->status ?? '') == 'Maintenance' ? 'selected' : '' }}
            >
                Maintenance
            </option>

            <option
                value="Returned"
                {{ old('status', $asset->status ?? '') == 'Returned' ? 'selected' : '' }}
            >
                Returned
            </option>

            <option
                value="Retired"
                {{ old('status', $asset->status ?? '') == 'Retired' ? 'selected' : '' }}
            >
                Retired
            </option>

        </select>

        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- =====================================================
         NOTES
    ====================================================== --}}
    <div class="col-md-12 mb-3">

        <label for="notes" class="form-label">
            Notes
        </label>

        <textarea
            name="notes"
            id="notes"
            rows="4"
            class="form-control @error('notes') is-invalid @enderror"
            placeholder="Masukkan catatan asset jika diperlukan"
        >{{ old('notes', $asset->notes ?? '') }}</textarea>

        @error('notes')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>


{{-- =========================================================
     BUTTON
========================================================= --}}

<div class="d-flex justify-content-between mt-4">

    <a
        href="{{ route('master-assets.index') }}"
        class="btn btn-secondary"
    >
        <i class="fas fa-arrow-left me-1"></i>
        Kembali
    </a>

    <button
        type="submit"
        class="btn btn-primary"
    >
        <i class="fas fa-save me-1"></i>

        {{ isset($asset) ? 'Update Asset' : 'Simpan Asset' }}

    </button>

</div>


{{-- =========================================================
     SCRIPT RAM & STORAGE + PURCHASE PRICE
========================================================= --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |----------------------------------------------------------------------
    | ELEMENT
    |----------------------------------------------------------------------
    */

    const categorySelect =
        document.getElementById('category_id');

    const ramWrapper =
        document.getElementById('ram-wrapper');

    const storageWrapper =
        document.getElementById('storage-wrapper');

    const ramInput =
        document.getElementById('ram');

    const storageInput =
        document.getElementById('storage');

    const purchasePrice =
        document.getElementById('purchase_price');


    /*
    |----------------------------------------------------------------------
    | RAM & STORAGE
    |----------------------------------------------------------------------
    | Hanya tampil untuk kategori:
    |
    | LAPTOP
    | CPU
    |---------------------------------------------------------------------- 
    */

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
            categoryName === 'LAPTOP' ||
            categoryName === 'CPU';


        if (showRamStorage) {

            if (ramWrapper) {
                ramWrapper.style.display = '';
            }

            if (storageWrapper) {
                storageWrapper.style.display = '';
            }

        } else {

            if (ramWrapper) {
                ramWrapper.style.display = 'none';
            }

            if (storageWrapper) {
                storageWrapper.style.display = 'none';
            }

            /*
            |--------------------------------------------------------------
            | Kosongkan RAM dan Storage apabila kategori
            | bukan Laptop / CPU.
            |--------------------------------------------------------------
            */

            if (ramInput) {
                ramInput.value = '';
            }

            if (storageInput) {
                storageInput.value = '';
            }

        }

    }


    /*
    |----------------------------------------------------------------------
    | FORMAT RUPIAH
    |----------------------------------------------------------------------
    |
    | 5000000
    |      ↓
    | 5.000.000
    |
    | Karena "Rp" sudah ada di input-group,
    | yang ditampilkan pada field adalah:
    |
    | Rp | 5.000.000
    |
    |---------------------------------------------------------------------- 
    */

    function formatRupiah(value) {

        let number =
            value
                .toString()
                .replace(/\D/g, '');


        if (number === '') {
            return '';
        }


        return new Intl.NumberFormat(
            'id-ID'
        ).format(number);

    }


    /*
    |----------------------------------------------------------------------
    | FORMAT PURCHASE PRICE SAAT HALAMAN DIBUKA
    |----------------------------------------------------------------------
    |
    | Berguna untuk halaman EDIT.
    |
    | Database:
    | 5500000.00
    |
    | Menjadi:
    | 5.500.000
    |---------------------------------------------------------------------- 
    */

    if (purchasePrice && purchasePrice.value) {

        purchasePrice.value =
            formatRupiah(
                purchasePrice.value
            );

    }


    /*
    |----------------------------------------------------------------------
    | PURCHASE PRICE SAAT DIKETIK
    |----------------------------------------------------------------------
    */

    if (purchasePrice) {

        purchasePrice.addEventListener(
            'input',
            function () {

                const cursorPosition =
                    this.selectionStart;

                const oldValue =
                    this.value;


                /*
                | Ambil hanya angka
                */

                const number =
                    oldValue.replace(
                        /\D/g,
                        ''
                    );


                /*
                | Format menjadi:
                | 5.000.000
                */

                this.value =
                    formatRupiah(number);


                /*
                | Cursor diletakkan di akhir
                | supaya nyaman saat mengetik.
                */

                this.setSelectionRange(
                    this.value.length,
                    this.value.length
                );

            }
        );

    }


    /*
    |----------------------------------------------------------------------
    | SEBELUM FORM DI-SUBMIT
    |----------------------------------------------------------------------
    |
    | User melihat:
    |
    | 5.500.000
    |
    | Tetapi Laravel menerima:
    |
    | 5500000
    |
    |---------------------------------------------------------------------- 
    */

    const form =
        purchasePrice
            ? purchasePrice.closest('form')
            : null;


    if (form) {

        form.addEventListener(
            'submit',
            function () {

                if (purchasePrice) {

                    purchasePrice.value =
                        purchasePrice.value
                            .replace(/\D/g, '');

                }

            }
        );

    }


    /*
    |----------------------------------------------------------------------
    | JALANKAN SAAT HALAMAN PERTAMA DIBUKA
    |----------------------------------------------------------------------
    */

    toggleRamStorage();


    /*
    |----------------------------------------------------------------------
    | JALANKAN SAAT CATEGORY BERUBAH
    |----------------------------------------------------------------------
    */

    if (categorySelect) {

        categorySelect.addEventListener(
            'change',
            toggleRamStorage
        );

    }

});

</script>
```
