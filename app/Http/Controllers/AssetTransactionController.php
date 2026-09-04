<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\AssetTransaction;
use App\Models\Employee;
use Illuminate\Http\Request;

class AssetTransactionController extends Controller
{
    /**
     * ==========================================================
     * INDEX
     * Menampilkan daftar transaksi
     * ==========================================================
     */
    public function index(Request $request)
    {
        $query = AssetTransaction::with('asset');

        // Search employee / asset
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('employee_name', 'like', '%' . $search . '%')
                    ->orWhere('department', 'like', '%' . $search . '%')
                    ->orWhere('transaction_type', 'like', '%' . $search . '%')
                    ->orWhere('status', 'like', '%' . $search . '%')
                    ->orWhereHas('asset', function ($assetQuery) use ($search) {

                        $assetQuery
                            ->where('asset_name', 'like', '%' . $search . '%')
                            ->orWhere('asset_code', 'like', '%' . $search . '%')
                            ->orWhere('serial_number', 'like', '%' . $search . '%');

                    });

            });
        }

        $transactions = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'transaction.index',
            compact('transactions')
        );
    }


    /**
     * ==========================================================
     * CREATE
     * Form tambah transaksi
     * ==========================================================
     */
    public function create()
    {
        $assets = Asset::orderBy('asset_name')->get();

        $employees = Employee::orderBy('employee_name')->get();

        return view(
            'transaction.create',
            compact(
                'assets',
                'employees'
            )
        );
    }


    /**
     * ==========================================================
     * STORE
     * Simpan transaksi
     * ==========================================================
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'asset_id' => [
                'required',
                'exists:assets,id'
            ],

            'transaction_type' => [
                'required',
                'in:Checkout,Checkin'
            ],

            'status' => [
                'required',
                'in:Ready,Returned,Maintenance,Retired'
            ],

            /*
             * Employee dipilih dari tabel employees
             */
            'employee_id' => [
                'required',
                'exists:employees,id'
            ],

            'department' => [
                'nullable',
                'string',
                'max:100'
            ],

            'transaction_date' => [
                'required',
                'date'
            ],

            'return_date' => [
                'nullable',
                'date',
                'after_or_equal:transaction_date'
            ],

            'notes' => [
                'nullable',
                'string'
            ],

        ], [

            'asset_id.required' =>
                'Asset wajib dipilih.',

            'asset_id.exists' =>
                'Asset tidak ditemukan.',

            'transaction_type.required' =>
                'Transaction Type wajib dipilih.',

            'transaction_type.in' =>
                'Transaction Type harus Check Out atau Check In.',

            'status.required' =>
                'Status asset wajib dipilih.',

            'status.in' =>
                'Status asset tidak valid.',

            'employee_id.required' =>
                'Employee wajib dipilih.',

            'employee_id.exists' =>
                'Employee tidak ditemukan.',

            'transaction_date.required' =>
                'Tanggal transaksi wajib diisi.',

            'return_date.after_or_equal' =>
                'Return Date tidak boleh sebelum Transaction Date.',

        ]);


        /*
        |------------------------------------------------------------------
        | AMBIL ASSET
        |------------------------------------------------------------------
        */

        $asset = Asset::findOrFail(
            $validated['asset_id']
        );


        /*
        |------------------------------------------------------------------
        | AMBIL EMPLOYEE
        |------------------------------------------------------------------
        */

        $employee = Employee::findOrFail(
            $validated['employee_id']
        );


        /*
        |------------------------------------------------------------------
        | SIMPAN TRANSAKSI
        |
        | Database tetap menyimpan employee_name
        | seperti struktur tabel kamu sekarang.
        |------------------------------------------------------------------
        */

        AssetTransaction::create([

            'asset_id' =>
                $validated['asset_id'],

            'transaction_type' =>
                $validated['transaction_type'],

            'status' =>
                $validated['status'],

            'employee_name' =>
                $employee->employee_name,

            'department' =>
                $validated['department'] ?? null,

            'transaction_date' =>
                $validated['transaction_date'],

            'return_date' =>
                $validated['return_date'] ?? null,

            'notes' =>
                $validated['notes'] ?? null,

        ]);


        /*
        |------------------------------------------------------------------
        | UPDATE STATUS ASSET
        |------------------------------------------------------------------
        */

        $asset->update([

            'status' =>
                $validated['status'],

        ]);


        return redirect()
            ->route('asset-transactions.index')
            ->with(
                'success',
                'Transaksi asset berhasil disimpan.'
            );
    }


    /**
     * ==========================================================
     * SHOW
     * Detail transaksi
     * ==========================================================
     */
    public function show($id)
    {
        $transaction = AssetTransaction::with('asset')
            ->findOrFail($id);

        return view(
            'transaction.show',
            compact('transaction')
        );
    }


    /**
     * ==========================================================
     * EDIT
     * Form edit transaksi
     * ==========================================================
     */
    public function edit($id)
    {
        $transaction = AssetTransaction::with('asset')
            ->findOrFail($id);

        $assets = Asset::orderBy('asset_name')->get();

        $employees = Employee::orderBy('employee_name')->get();

        return view(
            'transaction.edit',
            compact(
                'transaction',
                'assets',
                'employees'
            )
        );
    }


    /**
     * ==========================================================
     * UPDATE
     * Update transaksi
     * ==========================================================
     */
    public function update(Request $request, $id)
    {
        $transaction = AssetTransaction::findOrFail($id);


        /*
        |------------------------------------------------------------------
        | VALIDASI
        |------------------------------------------------------------------
        */

        $validated = $request->validate([

            'asset_id' => [
                'required',
                'exists:assets,id'
            ],

            'transaction_type' => [
                'required',
                'in:Checkout,Checkin'
            ],

            'status' => [
                'required',
                'in:Ready,Returned,Maintenance,Retired'
            ],

            /*
             * Employee dari tabel Employee
             */
            'employee_id' => [
                'required',
                'exists:employees,id'
            ],

            'department' => [
                'nullable',
                'string',
                'max:100'
            ],

            'transaction_date' => [
                'required',
                'date'
            ],

            'return_date' => [
                'nullable',
                'date',
                'after_or_equal:transaction_date'
            ],

            'notes' => [
                'nullable',
                'string'
            ],

        ], [

            'asset_id.required' =>
                'Asset wajib dipilih.',

            'asset_id.exists' =>
                'Asset tidak ditemukan.',

            'transaction_type.required' =>
                'Transaction Type wajib dipilih.',

            'transaction_type.in' =>
                'Transaction Type harus Check Out atau Check In.',

            'status.required' =>
                'Status asset wajib dipilih.',

            'status.in' =>
                'Status asset tidak valid.',

            'employee_id.required' =>
                'Employee wajib dipilih.',

            'employee_id.exists' =>
                'Employee tidak ditemukan.',

            'transaction_date.required' =>
                'Tanggal transaksi wajib diisi.',

            'return_date.after_or_equal' =>
                'Return Date tidak boleh sebelum Transaction Date.',

        ]);


        /*
        |------------------------------------------------------------------
        | ASSET LAMA
        |------------------------------------------------------------------
        */

        $oldAsset = Asset::find(
            $transaction->asset_id
        );


        /*
        |------------------------------------------------------------------
        | EMPLOYEE
        |------------------------------------------------------------------
        */

        $employee = Employee::findOrFail(
            $validated['employee_id']
        );


        /*
        |------------------------------------------------------------------
        | UPDATE TRANSAKSI
        |------------------------------------------------------------------
        */

        $transaction->update([

            'asset_id' =>
                $validated['asset_id'],

            'transaction_type' =>
                $validated['transaction_type'],

            'status' =>
                $validated['status'],

            'employee_name' =>
                $employee->employee_name,

            'department' =>
                $validated['department'] ?? null,

            'transaction_date' =>
                $validated['transaction_date'],

            'return_date' =>
                $validated['return_date'] ?? null,

            'notes' =>
                $validated['notes'] ?? null,

        ]);


        /*
        |------------------------------------------------------------------
        | UPDATE ASSET BARU
        |------------------------------------------------------------------
        */

        $asset = Asset::findOrFail(
            $validated['asset_id']
        );

        $asset->update([

            'status' =>
                $validated['status'],

        ]);


        /*
        |------------------------------------------------------------------
        | JIKA ASSET BERUBAH
        |
        | Asset sebelumnya dikembalikan menjadi Ready
        |------------------------------------------------------------------
        */

        if (
            $oldAsset &&
            $oldAsset->id != $asset->id
        ) {

            $oldAsset->update([

                'status' => 'Ready',

            ]);
        }


        return redirect()
            ->route('asset-transactions.index')
            ->with(
                'success',
                'Transaksi asset berhasil diperbarui.'
            );
    }


    /**
     * ==========================================================
     * DESTROY
     * Hapus transaksi
     * ==========================================================
     */
    public function destroy($id)
    {
        $transaction = AssetTransaction::findOrFail($id);


        /*
        |------------------------------------------------------------------
        | AMBIL ASSET
        |------------------------------------------------------------------
        */

        $asset = Asset::find(
            $transaction->asset_id
        );


        /*
        |------------------------------------------------------------------
        | KEMBALIKAN STATUS ASSET
        |------------------------------------------------------------------
        */

        if ($asset) {

            $asset->update([

                'status' => 'Ready',

            ]);
        }


        /*
        |------------------------------------------------------------------
        | HAPUS TRANSAKSI
        |------------------------------------------------------------------
        */

        $transaction->delete();


        return redirect()
            ->route('asset-transactions.index')
            ->with(
                'success',
                'Transaksi asset berhasil dihapus.'
            );
    }
}