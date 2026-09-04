{{-- =========================================================
     ASSET
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Asset
        <span class="text-danger">*</span>
    </label>

    <select
        name="asset_id"
        class="form-select @error('asset_id') is-invalid @enderror"
        required
    >

        <option value="">
            -- Pilih Asset --
        </option>

        @foreach ($assets as $asset)

            <option
                value="{{ $asset->id }}"
                {{ old(
                    'asset_id',
                    $maintenance->asset_id ?? ''
                ) == $asset->id
                    ? 'selected'
                    : ''
                }}
            >

                {{ $asset->asset_name }}

            </option>

        @endforeach

    </select>

    @error('asset_id')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>



{{-- =========================================================
     MAINTENANCE DATE
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Tanggal Maintenance
        <span class="text-danger">*</span>
    </label>

    <input
        type="date"
        name="maintenance_date"
        class="form-control @error('maintenance_date') is-invalid @enderror"
        value="{{ old(
            'maintenance_date',
            isset($maintenance->maintenance_date)
                ? $maintenance->maintenance_date->format('Y-m-d')
                : date('Y-m-d')
        ) }}"
        required
    >

    @error('maintenance_date')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>



{{-- =========================================================
     PROBLEM
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Problem / Kerusakan
        <span class="text-danger">*</span>
    </label>

    <textarea
        name="problem"
        rows="4"
        class="form-control @error('problem') is-invalid @enderror"
        placeholder="Masukkan masalah atau kerusakan asset..."
        required
    >{{ old(
        'problem',
        $maintenance->problem ?? ''
    ) }}</textarea>

    @error('problem')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>



{{-- =========================================================
     ACTION TAKEN
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Action Taken / Tindakan
    </label>

    <textarea
        name="action_taken"
        rows="4"
        class="form-control @error('action_taken') is-invalid @enderror"
        placeholder="Masukkan tindakan yang dilakukan..."
    >{{ old(
        'action_taken',
        $maintenance->action_taken ?? ''
    ) }}</textarea>

    @error('action_taken')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>



{{-- =========================================================
     TECHNICIAN
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Technician
        <span class="text-danger">*</span>
    </label>

    <input
        type="text"
        name="technician"
        class="form-control @error('technician') is-invalid @enderror"
        value="{{ old(
            'technician',
            $maintenance->technician ?? ''
        ) }}"
        placeholder="Nama teknisi"
        maxlength="100"
        required
    >

    @error('technician')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>


{{-- =========================================================
     STATUS
========================================================= --}}

<div class="mb-3">

    <label class="form-label fw-semibold">
        Status
        <span class="text-danger">*</span>
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
            value="Pending"
            {{ old(
                'status',
                $maintenance->status ?? ''
            ) === 'Pending'
                ? 'selected'
                : ''
            }}
        >
            Pending
        </option>

        <option
            value="In Progress"
            {{ old(
                'status',
                $maintenance->status ?? ''
            ) === 'In Progress'
                ? 'selected'
                : ''
            }}
        >
            In Progress
        </option>

        <option
            value="Completed"
            {{ old(
                'status',
                $maintenance->status ?? ''
            ) === 'Completed'
                ? 'selected'
                : ''
            }}
        >
            Completed
        </option>

    </select>

    @error('status')

        <div class="invalid-feedback">
            {{ $message }}
        </div>

    @enderror

</div>