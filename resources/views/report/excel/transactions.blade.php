<table>

    <thead>

        {{-- =====================================================
             JUDUL SISTEM
        ====================================================== --}}

        <tr>

            <th colspan="8">
                DND-AMS | ASSET MANAGEMENT SYSTEM
            </th>

        </tr>


        {{-- =====================================================
             JUDUL LAPORAN
        ====================================================== --}}

        <tr>

            <th colspan="8">
                LAPORAN ASSET TRANSACTION
            </th>

        </tr>


        {{-- =====================================================
             PERUSAHAAN
        ====================================================== --}}

        <tr>

            <th colspan="8">
                CV. Mitra Parama Indonesia | Site Semarang
            </th>

        </tr>


        {{-- =====================================================
             TANGGAL CETAK
        ====================================================== --}}

        <tr>

            <th colspan="8">
                Dicetak: {{ now()->format('d/m/Y H:i') }}
            </th>

        </tr>


        {{-- =====================================================
             HEADER TABLE
        ====================================================== --}}

        <tr>

            <th>No</th>

            <th>Asset</th>

            <th>Transaction Type</th>

            <th>Employee</th>

            <th>Department</th>

            <th>Transaction Date</th>

            <th>Return Date</th>

            <th>Notes</th>

        </tr>

    </thead>


    <tbody>

        @forelse($transactions as $transaction)

            <tr>

                {{-- NO --}}
                <td>
                    {{ $loop->iteration }}
                </td>


                {{-- ASSET --}}
                <td>
                    {{ $transaction->asset->asset_name ?? '-' }}
                </td>


                {{-- TRANSACTION TYPE --}}
                <td>
                    {{ $transaction->transaction_type ?? '-' }}
                </td>


                {{-- EMPLOYEE --}}
                <td>
                    {{ $transaction->employee_name ?? '-' }}
                </td>


                {{-- DEPARTMENT --}}
                <td>
                    {{ $transaction->department ?? '-' }}
                </td>


                {{-- TRANSACTION DATE --}}
                <td>

                    @if($transaction->transaction_date)

                        {{ \Carbon\Carbon::parse(
                            $transaction->transaction_date
                        )->format('d/m/Y') }}

                    @else

                        -

                    @endif

                </td>


                {{-- RETURN DATE --}}
                <td>

                    @if($transaction->return_date)

                        {{ \Carbon\Carbon::parse(
                            $transaction->return_date
                        )->format('d/m/Y') }}

                    @else

                        -

                    @endif

                </td>


                {{-- NOTES --}}
                <td>
                    {{ $transaction->notes ?? '-' }}
                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8">
                    Belum ada data transaksi asset.
                </td>

            </tr>

        @endforelse

    </tbody>

</table>