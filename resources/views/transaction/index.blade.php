@extends('layouts.app')

@section('title', 'Asset Transaction')

@section('content')

<div class="container-fluid">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold">

                <i class="fas fa-right-left text-primary me-2"></i>

                Asset Transaction

            </h2>

            <small class="text-muted">

                Kelola proses Check In & Check Out Asset

            </small>

        </div>


        <a
            href="{{ route('asset-transactions.create') }}"
            class="btn btn-primary shadow"
        >

            <i class="fas fa-plus-circle me-1"></i>

            New Transaction

        </a>

    </div>


    {{-- =====================================================
         SUCCESS MESSAGE
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="fas fa-check-circle"></i>

            {{ session('success') }}

            <button
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         ERROR MESSAGE
    ====================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger alert-dismissible fade show">

            <strong>
                Terdapat kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

            <button
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>

        </div>

    @endif


    {{-- =====================================================
         TABLE CARD
    ====================================================== --}}

    <div class="card shadow border-0">


        {{-- =================================================
             CARD HEADER
        ================================================== --}}

        <div class="card-header bg-white">

            <div class="row align-items-center">

                <div class="col-md-5">

                    <h5 class="fw-bold mb-0">

                        Transaction List

                    </h5>

                </div>


                <div class="col-md-7">

                    <form method="GET">

                        <div class="input-group">

                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search employee / asset..."
                                name="search"
                                value="{{ request('search') }}"
                            >

                            <button
                                class="btn btn-primary"
                                type="submit"
                            >

                                <i class="fas fa-search"></i>

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                <tr>

                    <th>No</th>

                    <th>Transaction ID</th>

                    <th>Asset</th>

                    <th>Serial Number</th>

                    <th>Employee</th>

                    <th>Department</th>

                    <th>Type</th>

                    <th>Checkout Date</th>

                    <th>Return Date</th>

                    <th>Status</th>

                    <th
                        width="150"
                        class="text-center"
                    >
                        Action
                    </th>

                </tr>

                </thead>


                <tbody>

                @forelse($transactions as $index => $trx)

                    <tr>


                        {{-- NO --}}

                        <td>

                            {{ $transactions->firstItem() + $index }}

                        </td>


                        {{-- TRANSACTION ID --}}

                        <td>

                            <span class="badge bg-dark">

                                TRX-{{
                                    str_pad(
                                        $trx->id,
                                        4,
                                        '0',
                                        STR_PAD_LEFT
                                    )
                                }}

                            </span>

                        </td>


                        {{-- ASSET --}}

                        <td>

                            <strong>

                                {{ $trx->asset->asset_name ?? '-' }}

                            </strong>

                        </td>


                        {{-- SERIAL NUMBER --}}

                        <td>

                            {{ $trx->asset->serial_number ?? '-' }}

                        </td>


                        {{-- EMPLOYEE --}}

                        <td>

                            {{ $trx->employee_name }}

                        </td>


                        {{-- DEPARTMENT --}}

                        <td>

                            {{ $trx->department ?? '-' }}

                        </td>


                        {{-- =================================================
                             TRANSACTION TYPE
                        ================================================== --}}

                        <td>

                            @if($trx->transaction_type === 'Checkout')

                                <span class="badge bg-warning text-dark">

                                    Check Out

                                </span>

                            @elseif($trx->transaction_type === 'Checkin')

                                <span class="badge bg-success">

                                    Check In

                                </span>

                            @else

                                <span class="badge bg-danger">

                                    Invalid Type

                                </span>

                            @endif

                        </td>


                        {{-- CHECKOUT DATE --}}

                        <td>

                            {{ $trx->transaction_date
                                ? $trx->transaction_date->format('d M Y')
                                : '-'
                            }}

                        </td>


                        {{-- RETURN DATE --}}

                        <td>

                            {{ $trx->return_date
                                ? $trx->return_date->format('d M Y')
                                : '-'
                            }}

                        </td>


                        {{-- =================================================
                             STATUS
                             HANYA STATUS YANG DIUBAH
                        ================================================== --}}

                        <td width="180">

                            <form
                                action="{{ route(
                                    'asset-transactions.update',
                                    $trx->id
                                ) }}"
                                method="POST"
                            >

                                @csrf

                                @method('PUT')


                                {{-- =============================
                                     DATA TRANSAKSI
                                ============================== --}}

                                <input
                                    type="hidden"
                                    name="asset_id"
                                    value="{{ $trx->asset_id }}"
                                >


                                <input
                                    type="hidden"
                                    name="transaction_type"
                                    value="{{ $trx->transaction_type }}"
                                >


                                <input
                                    type="hidden"
                                    name="employee_name"
                                    value="{{ $trx->employee_name }}"
                                >


                                <input
                                    type="hidden"
                                    name="department"
                                    value="{{ $trx->department }}"
                                >


                                <input
                                    type="hidden"
                                    name="transaction_date"
                                    value="{{ $trx->transaction_date?->format('Y-m-d') }}"
                                >


                                <input
                                    type="hidden"
                                    name="return_date"
                                    value="{{ $trx->return_date?->format('Y-m-d') }}"
                                >


                                <input
                                    type="hidden"
                                    name="notes"
                                    value="{{ $trx->notes }}"
                                >


                                {{-- =============================
                                     STATUS
                                ============================== --}}

                                <select
                                    name="status"
                                    class="form-select form-select-sm"
                                    onchange="this.form.submit()"
                                >

                                    <option
                                        value="Ready"
                                        {{ $trx->status === 'Ready'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        🟢 Ready
                                    </option>


                                    <option
                                        value="Returned"
                                        {{ $trx->status === 'Returned'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        🔵 Returned
                                    </option>


                                    <option
                                        value="Maintenance"
                                        {{ $trx->status === 'Maintenance'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        🟡 Maintenance
                                    </option>


                                    <option
                                        value="Retired"
                                        {{ $trx->status === 'Retired'
                                            ? 'selected'
                                            : ''
                                        }}
                                    >
                                        🔴 Retired
                                    </option>

                                </select>

                            </form>

                        </td>


                        {{-- =================================================
                             ACTION
                        ================================================== --}}

                        <td class="text-center">

                            {{-- VIEW --}}

                            <a
                                href="{{ route(
                                    'asset-transactions.show',
                                    $trx->id
                                ) }}"
                                class="btn btn-info btn-sm"
                                title="View"
                            >

                                <i class="fas fa-eye"></i>

                            </a>


                            {{-- EDIT --}}

                            <a
                                href="{{ route(
                                    'asset-transactions.edit',
                                    $trx->id
                                ) }}"
                                class="btn btn-warning btn-sm"
                                title="Edit"
                            >

                                <i class="fas fa-edit"></i>

                            </a>


                            {{-- DELETE --}}

                            <form
                                action="{{ route(
                                    'asset-transactions.destroy',
                                    $trx->id
                                ) }}"
                                method="POST"
                                class="d-inline"
                            >

                                @csrf

                                @method('DELETE')


                                <button
                                    type="submit"
                                    onclick="return confirm(
                                        'Delete Transaction?'
                                    )"
                                    class="btn btn-danger btn-sm"
                                    title="Delete"
                                >

                                    <i class="fas fa-trash"></i>

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="11"
                            class="text-center py-5"
                        >

                            <i
                                class="fas fa-folder-open fa-4x text-secondary mb-3"
                            ></i>

                            <h5>

                                Data Transaction Belum Ada

                            </h5>

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>


        {{-- =================================================
             PAGINATION
        ================================================== --}}

        <div class="card-footer bg-white">

            {{ $transactions->links() }}

        </div>

    </div>

</div>

@endsection