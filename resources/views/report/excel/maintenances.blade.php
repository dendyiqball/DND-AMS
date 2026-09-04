<table style="border-collapse: collapse; font-family: Arial, Helvetica, sans-serif;">

    {{-- =========================================================
         HEADER SISTEM
    ========================================================== --}}

    <tr>
        <td
            colspan="7"
            style="
                background:#1f4e78;
                color:#ffffff;
                font-size:18px;
                font-weight:bold;
                text-align:center;
                padding:10px;
                border:1px solid #1f4e78;
            "
        >
            DND-AMS | ASSET MANAGEMENT SYSTEM
        </td>
    </tr>


    {{-- =========================================================
         JUDUL LAPORAN
    ========================================================== --}}

    <tr>
        <td
            colspan="7"
            style="
                background:#ffffff;
                color:#1f2937;
                font-size:15px;
                font-weight:bold;
                text-align:center;
                padding:8px;
            "
        >
            LAPORAN MAINTENANCE
        </td>
    </tr>


    {{-- =========================================================
         PERUSAHAAN
    ========================================================== --}}

    <tr>
        <td
            colspan="7"
            style="
                background:#ffffff;
                color:#666666;
                font-size:11px;
                font-style:italic;
                text-align:center;
                padding:5px;
            "
        >
            CV. Mitra Parama Indonesia | Site Semarang
        </td>
    </tr>


    {{-- =========================================================
         TANGGAL CETAK
    ========================================================== --}}

    <tr>
        <td
            colspan="7"
            style="
                background:#ffffff;
                color:#777777;
                font-size:10px;
                font-style:italic;
                text-align:center;
                padding:5px;
            "
        >
            Dicetak: {{ now()->format('d/m/Y H:i') }}
        </td>
    </tr>


    {{-- =========================================================
         JARAK
    ========================================================== --}}

    <tr>
        <td colspan="7">
            &nbsp;
        </td>
    </tr>


    {{-- =========================================================
         HEADER TABEL
    ========================================================== --}}

    <tr>

        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            No
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Asset
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Maintenance Date
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Problem
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Action Taken / Solution
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Technician
        </th>


        <th
            style="
                background:#1f4e78;
                color:#ffffff;
                border:1px solid #999999;
                text-align:center;
                vertical-align:middle;
                padding:8px;
                font-size:11px;
                font-weight:bold;
            "
        >
            Status
        </th>

    </tr>


    {{-- =========================================================
         DATA
    ========================================================== --}}

    @forelse($maintenances as $maintenance)

        <tr>

            {{-- NO --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    text-align:center;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >
                {{ $loop->iteration }}
            </td>


            {{-- ASSET --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >

                @if($maintenance->asset)

                    {{ $maintenance->asset->asset_name ?? '-' }}

                    @if(
                        !empty($maintenance->asset->asset_code) &&
                        $maintenance->asset->asset_code !== $maintenance->asset->asset_name
                    )

                        <br>

                        <span style="color:#666666;">
                            {{ $maintenance->asset->asset_code }}
                        </span>

                    @endif

                @else

                    -

                @endif

            </td>


            {{-- MAINTENANCE DATE --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    text-align:center;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >

                @if($maintenance->maintenance_date)

                    {{ \Carbon\Carbon::parse(
                        $maintenance->maintenance_date
                    )->format('d/m/Y') }}

                @else

                    -

                @endif

            </td>


            {{-- PROBLEM --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >
                {{ $maintenance->problem ?? '-' }}
            </td>


            {{-- ACTION TAKEN / SOLUTION --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >
                {{ $maintenance->action_taken ?? '-' }}
            </td>


            {{-- TECHNICIAN --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    text-align:center;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                "
            >
                {{ $maintenance->technician ?? '-' }}
            </td>


            {{-- STATUS --}}

            <td
                style="
                    border:1px solid #bfbfbf;
                    text-align:center;
                    vertical-align:middle;
                    padding:7px;
                    font-size:10px;
                    font-weight:bold;
                "
            >
                {{ $maintenance->status ?? '-' }}
            </td>

        </tr>

    @empty

        <tr>

            <td
                colspan="7"
                style="
                    border:1px solid #bfbfbf;
                    text-align:center;
                    padding:12px;
                    color:#666666;
                    font-size:10px;
                "
            >
                Belum ada data maintenance.
            </td>

        </tr>

    @endforelse

</table>