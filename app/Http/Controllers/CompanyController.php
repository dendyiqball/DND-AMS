<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Menampilkan daftar company
     */
    public function index()
    {
        $companies = Company::latest()->paginate(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Form tambah company
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Simpan company
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|max:100|unique:companies,company_name'
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'company_name.unique'   => 'Nama perusahaan sudah ada.'
        ]);

        Company::create([
            'company_name' => $request->company_name
        ]);

        return redirect()
            ->route('master-companies.index')
            ->with('success', 'Company berhasil ditambahkan.');
    }

    /**
     * Detail company
     */
    public function show($id)
    {
        $company = Company::findOrFail($id);

        return view('company.show', compact('company'));
    }

    /**
     * Form edit company
     */
    public function edit($id)
    {
        $company = Company::findOrFail($id);

        return view('company.edit', compact('company'));
    }

    /**
     * Update company
     */
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'company_name' => 'required|max:100|unique:companies,company_name,' . $company->id
        ], [
            'company_name.required' => 'Nama perusahaan wajib diisi.',
            'company_name.unique'   => 'Nama perusahaan sudah ada.'
        ]);

        $company->update([
            'company_name' => $request->company_name
        ]);

        return redirect()
            ->route('master-companies.index')
            ->with('success', 'Company berhasil diperbarui.');
    }

    /**
     * Hapus company
     */
    public function destroy($id)
    {
        $company = Company::findOrFail($id);

        $company->delete();

        return redirect()
            ->route('master-companies.index')
            ->with('success', 'Company berhasil dihapus.');
    }
}