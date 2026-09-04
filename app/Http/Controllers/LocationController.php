<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Menampilkan daftar lokasi
     */
    public function index()
    {
        $locations = Location::latest()->paginate(10);

        return view('location.index', compact('locations'));
    }

    /**
     * Form tambah lokasi
     */
    public function create()
    {
        return view('location.create');
    }

    /**
     * Simpan lokasi
     */
    public function store(Request $request)
    {
        $request->validate([
            'location_name' => 'required|max:100|unique:locations,location_name',
        ], [
            'location_name.required' => 'Nama lokasi wajib diisi.',
            'location_name.unique'   => 'Lokasi sudah ada.',
        ]);

        Location::create([
            'location_name' => $request->location_name,
        ]);

        return redirect()
            ->route('master-locations.index')
            ->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Detail lokasi
     */
    public function show($id)
    {
        $location = Location::findOrFail($id);

        return view('location.show', compact('location'));
    }

    /**
     * Form edit lokasi
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);

        return view('location.edit', compact('location'));
    }

    /**
     * Update lokasi
     */
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'location_name' => 'required|max:100|unique:locations,location_name,' . $location->id,
        ], [
            'location_name.required' => 'Nama lokasi wajib diisi.',
            'location_name.unique'   => 'Lokasi sudah ada.',
        ]);

        $location->update([
            'location_name' => $request->location_name,
        ]);

        return redirect()
            ->route('master-locations.index')
            ->with('success', 'Lokasi berhasil diperbarui.');
    }

    /**
     * Hapus lokasi
     */
    public function destroy($id)
    {
        $location = Location::findOrFail($id);

        $location->delete();

        return redirect()
            ->route('master-locations.index')
            ->with('success', 'Lokasi berhasil dihapus.');
    }
}