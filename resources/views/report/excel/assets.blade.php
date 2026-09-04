<table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif;">

    {{-- =====================================================
         HEADER LAPORAN
    ====================================================== --}}

    <tr>
        <td colspan="10"
            style="
                background-color: #1f4e78;
                color: #ffffff;
                font-size: 18px;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                height: 32px;
                border: none;
            ">
            DND-AMS | ASSET MANAGEMENT SYSTEM
        </td>
    </tr>

    <tr>
        <td colspan="10"
            style="
                color: #1f4e78;
                font-size: 16px;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                height: 28px;
                border: none;
            ">
            LAPORAN ASSET
        </td>
    </tr>

    <tr>
        <td colspan="10"
            style="
                color: #666666;
                font-size: 12px;
                font-style: italic;
                text-align: center;
                vertical-align: middle;
                height: 24px;
                border: none;
            ">
            CV. Mitra Parama Indonesia | Site Semarang
        </td>
    </tr>

    <tr>
        <td colspan="10"
            style="
                color: #666666;
                font-size: 10px;
                font-style: italic;
                text-align: center;
                vertical-align: middle;
                height: 22px;
                border: none;
            ">
            Dicetak: {{ now()->format('d/m/Y H:i') }}
        </td>
    </tr>


    {{-- JARAK --}}
    <tr>
        <td colspan="10"
            style="
                height: 10px;
                border: none;
            ">
        </td>
    </tr>


    {{-- =====================================================
         HEADER TABEL
    ====================================================== --}}

    <thead>

        <tr>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
                height: 28px;
            ">
                No
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Asset Name
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Serial Number
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Brand
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Model
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Company
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Category
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Location
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Status
            </th>

            <th style="
                background-color: #1f4e78;
                color: #ffffff;
                font-weight: bold;
                text-align: center;
                vertical-align: middle;
                border: 1px solid #ffffff;
            ">
                Purchase Date
            </th>

        </tr>

    </thead>


    {{-- =====================================================
         DATA ASSET
    ====================================================== --}}

    <tbody>

        @forelse($assets as $index => $asset)

            <tr>

                {{-- NO --}}
                <td style="
                    text-align: center;
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $index + 1 }}
                </td>


                {{-- ASSET NAME --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->asset_name ?? '-' }}
                </td>


                {{-- SERIAL NUMBER --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->serial_number ?? '-' }}
                </td>


                {{-- BRAND --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->brand ?? '-' }}
                </td>


                {{-- MODEL --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->model ?? '-' }}
                </td>


                {{-- COMPANY --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->company->company_name ?? '-' }}
                </td>


                {{-- CATEGORY --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->category->category_name ?? '-' }}
                </td>


                {{-- LOCATION --}}
                <td style="
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">
                    {{ $asset->location->location_name ?? '-' }}
                </td>


                {{-- STATUS --}}
                <td style="
                    text-align: center;
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                    font-weight: bold;
                ">
                    {{ $asset->status ?? '-' }}
                </td>


                {{-- PURCHASE DATE --}}
                <td style="
                    text-align: center;
                    vertical-align: middle;
                    border: 1px solid #b7b7b7;
                ">

                    @if($asset->purchase_date)

                        {{ \Carbon\Carbon::parse($asset->purchase_date)->format('d/m/Y') }}

                    @else

                        -

                    @endif

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="10"
                    style="
                        text-align: center;
                        vertical-align: middle;
                        border: 1px solid #b7b7b7;
                        padding: 10px;
                    ">
                    Tidak ada data asset.
                </td>

            </tr>

        @endforelse

    </tbody>

</table>