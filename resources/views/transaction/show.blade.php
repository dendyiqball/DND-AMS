@extends('layouts.app')

@section('title','Detail Asset Transaction')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-10 mx-auto">

            <div class="card shadow border-0">

                <div class="card-header bg-info text-white">

                    <div class="d-flex justify-content-between align-items-center">

                        <h4 class="mb-0">

                            <i class="fas fa-circle-info me-2"></i>

                            Detail Asset Transaction

                        </h4>

                        <a href="{{ route('asset-transactions.index') }}"
                           class="btn btn-light">

                            <i class="fas fa-arrow-left"></i>

                            Kembali

                        </a>

                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        {{-- KIRI --}}
                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>
                                    <th width="180">Asset</th>
                                    <td>: {{ $transaction->asset->asset_name ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Employee</th>
                                    <td>: {{ $transaction->employee_name }}</td>
                                </tr>

                                <tr>
                                    <th>Department</th>
                                    <td>: {{ $transaction->department ?? '-' }}</td>
                                </tr>

                                <tr>
                                    <th>Transaction Type</th>
                                    <td>:

                                        @if($transaction->transaction_type=='Checkout')

                                            <span class="badge bg-warning text-dark">

                                                Check Out

                                            </span>

                                        @else

                                            <span class="badge bg-success">

                                                Check In

                                            </span>

                                        @endif

                                    </td>
                                </tr>

                            </table>

                        </div>

                        {{-- KANAN --}}
                        <div class="col-md-6">

                            <table class="table table-borderless">

                                <tr>
                                    <th width="180">Transaction Date</th>
                                    <td>:
                                        {{ \Carbon\Carbon::parse($transaction->transaction_date)->format('d F Y') }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Return Date</th>
                                    <td>:
                                        {{ $transaction->return_date
                                            ? \Carbon\Carbon::parse($transaction->return_date)->format('d F Y')
                                            : '-' }}
                                    </td>
                                </tr>

                                <tr>
                                    <th>Asset Status</th>
                                    <td>:

                                        @if($transaction->asset->status=='Ready')

                                            <span class="badge bg-success">

                                                Ready

                                            </span>

                                        @elseif($transaction->asset->status=='CheckedOut')

                                            <span class="badge bg-warning text-dark">

                                                Checked Out

                                            </span>

                                        @elseif($transaction->asset->status=='Maintenance')

                                            <span class="badge bg-info">

                                                Maintenance

                                            </span>

                                        @else

                                            <span class="badge bg-danger">

                                                Retired

                                            </span>

                                        @endif

                                    </td>
                                </tr>

                                <tr>
                                    <th>Serial Number</th>
                                    <td>:
                                        {{ $transaction->asset->serial_number ?? '-' }}
                                    </td>
                                </tr>

                            </table>

                        </div>

                    </div>

                    <hr>

                    <h5>

                        <i class="fas fa-note-sticky me-2"></i>

                        Notes

                    </h5>

                    <div class="border rounded bg-light p-3">

                        {{ $transaction->notes ?: 'Tidak ada catatan.' }}

                    </div>

                </div>

                <div class="card-footer text-end">

                    <a href="{{ route('asset-transactions.edit',$transaction->id) }}"
                       class="btn btn-warning">

                        <i class="fas fa-edit me-1"></i>

                        Edit

                    </a>

                    <a href="{{ route('asset-transactions.index') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-1"></i>

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection