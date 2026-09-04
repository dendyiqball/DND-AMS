<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asset;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use App\Models\Employee;

class AssetController extends Controller
{
    /**
     * =========================================================
     * DISPLAY A LISTING OF ASSETS
     * =========================================================
     */
    public function index(Request $request)
    {
        // =====================================================
        // SEARCH
        // =====================================================

        $keyword = $request->search;


        // =====================================================
        // STATUS FILTER
        // =====================================================

        $status = $request->status;


        // =====================================================
        // QUERY ASSET
        // =====================================================

        $assets = Asset::with([
            'company',
            'category',
            'location',
            'employee'
        ])


        // =====================================================
        // SEARCH ASSET
        // =====================================================

        ->when($keyword, function ($query) use ($keyword) {

            $query->where(function ($q) use ($keyword) {

                $q->where(
                    'asset_name',
                    'like',
                    "%{$keyword}%"
                )

                ->orWhere(
                    'serial_number',
                    'like',
                    "%{$keyword}%"
                )

                ->orWhere(
                    'brand',
                    'like',
                    "%{$keyword}%"
                )

                ->orWhere(
                    'model',
                    'like',
                    "%{$keyword}%"
                )

                ->orWhere(
                    'ram',
                    'like',
                    "%{$keyword}%"
                )

                ->orWhere(
                    'storage',
                    'like',
                    "%{$keyword}%"
                );

            });

        })


        // =====================================================
        // FILTER STATUS
        // =====================================================

        ->when($status, function ($query) use ($status) {

            $query->where(
                'status',
                $status
            );

        })


        // =====================================================
        // SORTING
        // =====================================================

        ->latest()


        // =====================================================
        // PAGINATION
        // =====================================================

        ->paginate(10)


        // =====================================================
        // PERTAHANKAN SEARCH + STATUS
        // =====================================================

        ->withQueryString();


        // =====================================================
        // RETURN VIEW
        // =====================================================

        return view(
            'assets.index',
            compact(
                'assets',
                'keyword',
                'status'
            )
        );
    }


    /**
     * =========================================================
     * SHOW CREATE FORM
     * =========================================================
     */
    public function create()
    {
        $companies = Company::orderBy(
            'company_name'
        )->get();


        $categories = Category::orderBy(
            'category_name'
        )->get();


        $locations = Location::orderBy(
            'location_name'
        )->get();


        $employees = Employee::orderBy(
            'employee_name'
        )->get();


        return view(
            'assets.create',
            compact(
                'companies',
                'categories',
                'locations',
                'employees'
            )
        );
    }


    /**
     * =========================================================
     * STORE NEW ASSET
     * =========================================================
     */
    public function store(Request $request)
    {
        /*
         * =====================================================
         * BERSIHKAN PURCHASE PRICE
         * =====================================================
         *
         * Contoh:
         *
         * Rp 5.500.000
         *
         * menjadi:
         *
         * 5500000
         *
         * Supaya bisa divalidasi sebagai numeric.
         *
         */

        if ($request->filled('purchase_price')) {

            $request->merge([
                'purchase_price' => preg_replace(
                    '/[^0-9]/',
                    '',
                    $request->purchase_price
                )
            ]);

        }


        // =====================================================
        // VALIDATION
        // =====================================================

        $validated = $request->validate([

            'company_id' => [
                'required',
                'exists:companies,id'
            ],

            'category_id' => [
                'required',
                'exists:categories,id'
            ],

            'location_id' => [
                'required',
                'exists:locations,id'
            ],

            'employee_id' => [
                'nullable',
                'exists:employees,id'
            ],

            'asset_name' => [
                'required',
                'string',
                'max:255'
            ],

            'serial_number' => [
                'required',
                'string',
                'max:100',
                'unique:assets,serial_number'
            ],

            'model' => [
                'required',
                'string',
                'max:100'
            ],

            'brand' => [
                'required',
                'string',
                'max:100'
            ],

            /*
             * =================================================
             * RAM
             * =================================================
             */

            'ram' => [
                'nullable',
                'string',
                'max:50'
            ],

            /*
             * =================================================
             * STORAGE
             * =================================================
             */

            'storage' => [
                'nullable',
                'string',
                'max:100'
            ],

            /*
             * =================================================
             * PURCHASE DATE
             * =================================================
             */

            'purchase_date' => [
                'nullable',
                'date'
            ],

            /*
             * =================================================
             * PURCHASE PRICE
             * =================================================
             */

            'purchase_price' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            /*
             * =================================================
             * STATUS
             * =================================================
             */

            'status' => [
                'required',
                'in:Ready,Checked Out,Maintenance,Returned,Retired'
            ],

            /*
             * =================================================
             * NOTES
             * =================================================
             */

            'notes' => [
                'nullable',
                'string'
            ],

        ]);


        // =====================================================
        // SIMPAN ASSET
        // =====================================================

        Asset::create($validated);


        // =====================================================
        // REDIRECT
        // =====================================================

        return redirect()
            ->route('master-assets.index')
            ->with(
                'success',
                'Asset berhasil ditambahkan.'
            );
    }


    /**
     * =========================================================
     * SHOW ASSET DETAIL
     * =========================================================
     */
    public function show(string $id)
    {
        $asset = Asset::with([
            'company',
            'category',
            'location',
            'employee'
        ])->findOrFail($id);


        return view(
            'assets.show',
            compact('asset')
        );
    }


    /**
     * =========================================================
     * SHOW EDIT FORM
     * =========================================================
     */
    public function edit(string $id)
    {
        $asset = Asset::with([
            'company',
            'category',
            'location',
            'employee'
        ])->findOrFail($id);


        $companies = Company::orderBy(
            'company_name'
        )->get();


        $categories = Category::orderBy(
            'category_name'
        )->get();


        $locations = Location::orderBy(
            'location_name'
        )->get();


        $employees = Employee::orderBy(
            'employee_name'
        )->get();


        return view(
            'assets.edit',
            compact(
                'asset',
                'companies',
                'categories',
                'locations',
                'employees'
            )
        );
    }


    /**
     * =========================================================
     * UPDATE ASSET
     * =========================================================
     */
    public function update(
        Request $request,
        string $id
    ) {
        // =====================================================
        // CARI ASSET
        // =====================================================

        $asset = Asset::findOrFail($id);


        /*
         * =====================================================
         * BERSIHKAN PURCHASE PRICE
         * =====================================================
         *
         * Contoh:
         *
         * Rp 5.500.000
         *
         * menjadi:
         *
         * 5500000
         *
         */

        if ($request->filled('purchase_price')) {

            $request->merge([
                'purchase_price' => preg_replace(
                    '/[^0-9]/',
                    '',
                    $request->purchase_price
                )
            ]);

        }


        // =====================================================
        // VALIDATION
        // =====================================================

        $validated = $request->validate([

            'company_id' => [
                'required',
                'exists:companies,id'
            ],

            'category_id' => [
                'required',
                'exists:categories,id'
            ],

            'location_id' => [
                'required',
                'exists:locations,id'
            ],

            'employee_id' => [
                'nullable',
                'exists:employees,id'
            ],

            'asset_name' => [
                'required',
                'string',
                'max:255'
            ],

            'serial_number' => [
                'required',
                'string',
                'max:100',
                'unique:assets,serial_number,' . $asset->id
            ],

            'model' => [
                'required',
                'string',
                'max:100'
            ],

            'brand' => [
                'required',
                'string',
                'max:100'
            ],

            /*
             * =================================================
             * RAM
             * =================================================
             */

            'ram' => [
                'nullable',
                'string',
                'max:50'
            ],

            /*
             * =================================================
             * STORAGE
             * =================================================
             */

            'storage' => [
                'nullable',
                'string',
                'max:100'
            ],

            /*
             * =================================================
             * PURCHASE DATE
             * =================================================
             */

            'purchase_date' => [
                'nullable',
                'date'
            ],

            /*
             * =================================================
             * PURCHASE PRICE
             * =================================================
             */

            'purchase_price' => [
                'nullable',
                'numeric',
                'min:0'
            ],

            /*
             * =================================================
             * STATUS
             * =================================================
             */

            'status' => [
                'required',
                'in:Ready,Checked Out,Maintenance,Returned,Retired'
            ],

            /*
             * =================================================
             * NOTES
             * =================================================
             */

            'notes' => [
                'nullable',
                'string'
            ],

        ]);


        // =====================================================
        // UPDATE ASSET
        // =====================================================

        $asset->update($validated);


        // =====================================================
        // REDIRECT
        // =====================================================

        return redirect()
            ->route('master-assets.index')
            ->with(
                'success',
                'Asset berhasil diperbarui.'
            );
    }


    /**
     * =========================================================
     * CHANGE ASSET STATUS
     * =========================================================
     */
    public function changeStatus(
        Request $request,
        $id
    ) {
        // =====================================================
        // VALIDATION
        // =====================================================

        $request->validate([

            'status' => [
                'required',
                'in:Ready,Checked Out,Maintenance,Returned,Retired'
            ]

        ]);


        // =====================================================
        // CARI ASSET
        // =====================================================

        $asset = Asset::findOrFail($id);


        // =====================================================
        // UPDATE STATUS
        // =====================================================

        $asset->update([

            'status' => $request->status

        ]);


        // =====================================================
        // REDIRECT
        // =====================================================

        return redirect()
            ->back()
            ->with(
                'success',
                'Status asset berhasil diperbarui.'
            );
    }


    /**
     * =========================================================
     * DELETE ASSET
     * =========================================================
     */
    public function destroy(string $id)
    {
        // =====================================================
        // CARI ASSET
        // =====================================================

        $asset = Asset::findOrFail($id);


        // =====================================================
        // DELETE
        // =====================================================

        $asset->delete();


        // =====================================================
        // REDIRECT
        // =====================================================

        return redirect()
            ->route('master-assets.index')
            ->with(
                'success',
                'Asset berhasil dihapus.'
            );
    }
}