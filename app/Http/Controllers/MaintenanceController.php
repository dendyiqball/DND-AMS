<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use App\Models\Asset;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    /**
     * =====================================================
     * DISPLAY MAINTENANCE LIST
     * =====================================================
     */
    public function index()
    {
        $maintenances = Maintenance::with('asset')
            ->latest()
            ->paginate(10);

        return view(
            'maintenance.index',
            compact('maintenances')
        );
    }


    /**
     * =====================================================
     * SHOW CREATE FORM
     * =====================================================
     */
    public function create()
    {
        $assets = Asset::orderBy('asset_name')
            ->get();

        return view(
            'maintenance.create',
            compact('assets')
        );
    }


    /**
     * =====================================================
     * STORE MAINTENANCE
     * =====================================================
     */
    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'asset_id' => [
                'required',
                'exists:assets,id',
            ],

            'maintenance_date' => [
                'required',
                'date',
            ],

            'problem' => [
                'required',
                'string',
            ],

            'action_taken' => [
                'nullable',
                'string',
            ],

            'technician' => [
                'required',
                'string',
                'max:100',
            ],

            'cost' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                'in:Pending,In Progress,Completed',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | SIMPAN DATA MAINTENANCE
        |--------------------------------------------------------------------------
        */

        $maintenance = Maintenance::create([
            'asset_id' => $validated['asset_id'],

            'maintenance_date' =>
                $validated['maintenance_date'],

            'problem' =>
                $validated['problem'],

            'action_taken' =>
                $validated['action_taken'] ?? null,

            'technician' =>
                $validated['technician'],

            'cost' =>
                $validated['cost'] ?? 0,

            'status' =>
                $validated['status'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS ASSET
        |--------------------------------------------------------------------------
        */

        $asset = Asset::find(
            $validated['asset_id']
        );


        if ($asset) {

            if ($validated['status'] === 'Completed') {

                $asset->update([
                    'status' => 'Ready'
                ]);

            } else {

                $asset->update([
                    'status' => 'Maintenance'
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('maintenances.index')
            ->with(
                'success',
                'Data maintenance berhasil ditambahkan.'
            );
    }


    /**
     * =====================================================
     * SHOW DETAIL
     * =====================================================
     */
    public function show($id)
    {
        $maintenance = Maintenance::with('asset')
            ->findOrFail($id);

        return view(
            'maintenance.show',
            compact('maintenance')
        );
    }


    /**
     * =====================================================
     * SHOW EDIT FORM
     * =====================================================
     */
    public function edit($id)
    {
        $maintenance = Maintenance::findOrFail($id);

        $assets = Asset::orderBy('asset_name')
            ->get();

        return view(
            'maintenance.edit',
            compact(
                'maintenance',
                'assets'
            )
        );
    }


    /**
     * =====================================================
     * UPDATE MAINTENANCE
     * =====================================================
     */
    public function update(
        Request $request,
        $id
    ) {

        $maintenance = Maintenance::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | VALIDATION
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'asset_id' => [
                'required',
                'exists:assets,id',
            ],

            'maintenance_date' => [
                'required',
                'date',
            ],

            'problem' => [
                'required',
                'string',
            ],

            'action_taken' => [
                'nullable',
                'string',
            ],

            'technician' => [
                'required',
                'string',
                'max:100',
            ],

            'cost' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'status' => [
                'required',
                'in:Pending,In Progress,Completed',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | ASSET LAMA
        |--------------------------------------------------------------------------
        */

        $oldAssetId =
            $maintenance->asset_id;


        /*
        |--------------------------------------------------------------------------
        | UPDATE MAINTENANCE
        |--------------------------------------------------------------------------
        */

        $maintenance->update([
            'asset_id' =>
                $validated['asset_id'],

            'maintenance_date' =>
                $validated['maintenance_date'],

            'problem' =>
                $validated['problem'],

            'action_taken' =>
                $validated['action_taken'] ?? null,

            'technician' =>
                $validated['technician'],

            'cost' =>
                $validated['cost'] ?? 0,

            'status' =>
                $validated['status'],
        ]);


        /*
        |--------------------------------------------------------------------------
        | JIKA ASSET DIGANTI
        |--------------------------------------------------------------------------
        */

        if (
            $oldAssetId !=
            $validated['asset_id']
        ) {

            $oldAsset =
                Asset::find($oldAssetId);


            if ($oldAsset) {

                $oldAsset->update([
                    'status' => 'Ready'
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS ASSET BARU
        |--------------------------------------------------------------------------
        */

        $asset =
            Asset::find(
                $validated['asset_id']
            );


        if ($asset) {

            if (
                $validated['status']
                === 'Completed'
            ) {

                $asset->update([
                    'status' => 'Ready'
                ]);

            } else {

                $asset->update([
                    'status' => 'Maintenance'
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('maintenances.index')
            ->with(
                'success',
                'Data maintenance berhasil diperbarui.'
            );
    }


    /**
     * =====================================================
     * DELETE MAINTENANCE
     * =====================================================
     */
    public function destroy($id)
    {
        $maintenance =
            Maintenance::findOrFail($id);


        /*
        |--------------------------------------------------------------------------
        | CARI ASSET
        |--------------------------------------------------------------------------
        */

        $asset =
            Asset::find(
                $maintenance->asset_id
            );


        /*
        |--------------------------------------------------------------------------
        | DELETE MAINTENANCE
        |--------------------------------------------------------------------------
        */

        $maintenance->delete();


        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STATUS ASSET
        |--------------------------------------------------------------------------
        */

        if ($asset) {

            $asset->update([
                'status' => 'Ready'
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | REDIRECT
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('maintenances.index')
            ->with(
                'success',
                'Data maintenance berhasil dihapus.'
            );
    }
}