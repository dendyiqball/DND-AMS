<div class="row">

    {{-- =====================================================
         ASSET
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="asset_id" class="form-label fw-bold">
            Asset
        </label>

        <select
            name="asset_id"
            id="asset_id"
            class="form-select @error('asset_id') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Asset --
            </option>

            @foreach($assets as $asset)

                <option
                    value="{{ $asset->id }}"
                    {{ old(
                        'asset_id',
                        $transaction->asset_id ?? ''
                    ) == $asset->id ? 'selected' : '' }}
                >

                    {{ $asset->asset_name }}

                    @if($asset->asset_code)
                        - {{ $asset->asset_code }}
                    @endif

                </option>

            @endforeach

        </select>

        @error('asset_id')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =====================================================
         TRANSACTION TYPE
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="transaction_type" class="form-label fw-bold">
            Transaction Type
        </label>

        <select
            name="transaction_type"
            id="transaction_type"
            class="form-select @error('transaction_type') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Transaction Type --
            </option>

            <option
                value="Checkout"
                {{ old(
                    'transaction_type',
                    $transaction->transaction_type ?? ''
                ) == 'Checkout' ? 'selected' : '' }}
            >
                Check Out
            </option>

            <option
                value="Checkin"
                {{ old(
                    'transaction_type',
                    $transaction->transaction_type ?? ''
                ) == 'Checkin' ? 'selected' : '' }}
            >
                Check In
            </option>

        </select>

        @error('transaction_type')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =====================================================
         STATUS ASSET
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="status" class="form-label fw-bold">
            Asset Status
        </label>

        <select
            name="status"
            id="status"
            class="form-select @error('status') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Status Asset --
            </option>

            <option
                value="Ready"
                {{ old(
                    'status',
                    $transaction->status
                    ?? $transaction->asset->status
                    ?? ''
                ) == 'Ready' ? 'selected' : '' }}
            >
                🟢 Ready
            </option>

            <option
                value="Returned"
                {{ old(
                    'status',
                    $transaction->status
                    ?? $transaction->asset->status
                    ?? ''
                ) == 'Returned' ? 'selected' : '' }}
            >
                🔵 Returned
            </option>

            <option
                value="Maintenance"
                {{ old(
                    'status',
                    $transaction->status
                    ?? $transaction->asset->status
                    ?? ''
                ) == 'Maintenance' ? 'selected' : '' }}
            >
                🟡 Maintenance
            </option>

            <option
                value="Retired"
                {{ old(
                    'status',
                    $transaction->status
                    ?? $transaction->asset->status
                    ?? ''
                ) == 'Retired' ? 'selected' : '' }}
            >
                🔴 Retired
            </option>

        </select>

        @error('status')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =====================================================
         EMPLOYEE
         DATA DIAMBIL DARI MENU EMPLOYEE
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="employee_id" class="form-label fw-bold">
            Employee Name
        </label>

        <select
            name="employee_id"
            id="employee_id"
            class="form-select @error('employee_id') is-invalid @enderror"
            required
        >

            <option value="">
                -- Pilih Employee --
            </option>

            @foreach($employees as $employee)

                <option
                    value="{{ $employee->id }}"
                    data-department="{{ $employee->department ?? '' }}"
                    {{ old(
                        'employee_id',
                        $transaction->employee_id ?? ''
                    ) == $employee->id ? 'selected' : '' }}
                >

                    {{ $employee->employee_name }}

                    @if($employee->employee_code)
                        - {{ $employee->employee_code }}
                    @endif

                </option>

            @endforeach

        </select>

        @error('employee_id')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

        <small class="text-muted">
            Pilih employee dari data Employee.
        </small>

    </div>


    {{-- =====================================================
         DEPARTMENT
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="department" class="form-label fw-bold">
            Department
        </label>

        <input
            type="text"
            name="department"
            id="department"
            class="form-control @error('department') is-invalid @enderror"
            value="{{ old(
                'department',
                $transaction->department ?? ''
            ) }}"
            placeholder="Department"
            readonly
        >

        @error('department')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

        <small class="text-muted">
            Department mengikuti data Employee.
        </small>

    </div>


    {{-- =====================================================
         TRANSACTION DATE
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="transaction_date" class="form-label fw-bold">
            Transaction Date
        </label>

        <input
            type="date"
            name="transaction_date"
            id="transaction_date"
            class="form-control @error('transaction_date') is-invalid @enderror"
            value="{{ old(
                'transaction_date',
                isset($transaction)
                    ? $transaction->transaction_date?->format('Y-m-d')
                    : date('Y-m-d')
            ) }}"
            required
        >

        @error('transaction_date')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =====================================================
         RETURN DATE
    ====================================================== --}}

    <div class="col-md-6 mb-3">

        <label for="return_date" class="form-label fw-bold">
            Return Date
        </label>

        <input
            type="date"
            name="return_date"
            id="return_date"
            class="form-control @error('return_date') is-invalid @enderror"
            value="{{ old(
                'return_date',
                isset($transaction) && $transaction->return_date
                    ? $transaction->return_date->format('Y-m-d')
                    : ''
            ) }}"
        >

        @error('return_date')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>


    {{-- =====================================================
         NOTES
    ====================================================== --}}

    <div class="col-md-12 mb-4">

        <label for="notes" class="form-label fw-bold">
            Notes
        </label>

        <textarea
            name="notes"
            id="notes"
            rows="4"
            class="form-control @error('notes') is-invalid @enderror"
            placeholder="Keterangan transaksi..."
        >{{ old(
            'notes',
            $transaction->notes ?? ''
        ) }}</textarea>

        @error('notes')

            <div class="invalid-feedback">
                {{ $message }}
            </div>

        @enderror

    </div>

</div>


<hr>


{{-- =====================================================
     BUTTON
====================================================== --}}

<div class="d-flex justify-content-end">

    <a
        href="{{ route('asset-transactions.index') }}"
        class="btn btn-secondary me-2"
    >

        <i class="fas fa-arrow-left me-1"></i>

        Kembali

    </a>

    <button
        type="submit"
        class="btn btn-primary"
    >

        <i class="fas fa-save me-1"></i>

        {{ isset($transaction) ? 'Update Transaksi' : 'Simpan Transaksi' }}

    </button>

</div>


{{-- =====================================================
     EMPLOYEE → DEPARTMENT
====================================================== --}}

<script>

document.addEventListener('DOMContentLoaded', function () {

    const employeeSelect =
        document.getElementById('employee_id');

    const departmentInput =
        document.getElementById('department');


    function updateDepartment() {

        if (!employeeSelect || !departmentInput) {
            return;
        }

        const selectedOption =
            employeeSelect.options[
                employeeSelect.selectedIndex
            ];


        if (!selectedOption || !selectedOption.value) {

            departmentInput.value = '';

            return;
        }


        const department =
            selectedOption.getAttribute(
                'data-department'
            );


        departmentInput.value =
            department || '';

    }


    if (employeeSelect) {

        employeeSelect.addEventListener(
            'change',
            updateDepartment
        );

    }


    // Jalankan saat halaman pertama kali dibuka
    // termasuk ketika halaman EDIT dibuka
    updateDepartment();

});

</script>