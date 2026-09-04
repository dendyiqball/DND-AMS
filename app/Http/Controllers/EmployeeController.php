<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Menampilkan daftar employee.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        return view('employees.index', compact('employees'));
    }

    /**
     * Menampilkan form tambah employee.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Menyimpan employee baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'employee_code' => 'required|string|max:50|unique:employees,employee_code',
            'employee_name' => 'required|string|max:100',
            'department'    => 'nullable|string|max:100',
            'position'      => 'nullable|string|max:100',
            'email'         => 'nullable|email|max:100|unique:employees,email',
            'phone'         => 'nullable|string|max:20',
            'status'        => 'required|in:Active,Inactive',
        ]);

        Employee::create($validated);

        return redirect()
            ->route('master-employees.index')
            ->with('success', 'Employee berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail employee.
     */
    public function show(Employee $employee)
    {
        $employee->load('assets');

        return view('employees.show', compact('employee'));
    }

    /**
     * Menampilkan form edit employee.
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    /**
     * Update employee.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'employee_code' => 'required|string|max:50|unique:employees,employee_code,' . $employee->id,
            'employee_name' => 'required|string|max:100',
            'department'    => 'nullable|string|max:100',
            'position'      => 'nullable|string|max:100',
            'email'         => 'nullable|email|max:100|unique:employees,email,' . $employee->id,
            'phone'         => 'nullable|string|max:20',
            'status'        => 'required|in:Active,Inactive',
        ]);

        $employee->update($validated);

        return redirect()
            ->route('master-employees.index')
            ->with('success', 'Employee berhasil diperbarui.');
    }

    /**
     * Menghapus employee.
     */
    public function destroy(Employee $employee)
    {
        /*
         * Jangan hapus employee jika masih digunakan oleh asset.
         */
        if ($employee->assets()->exists()) {

            return redirect()
                ->route('master-employees.index')
                ->with(
                    'error',
                    'Employee tidak dapat dihapus karena masih digunakan oleh asset.'
                );
        }

        $employee->delete();

        return redirect()
            ->route('master-employees.index')
            ->with('success', 'Employee berhasil dihapus.');
    }
}