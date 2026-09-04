<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Menampilkan daftar kategori
     */
    public function index()
    {
        $categories = Category::latest()->paginate(10);

        return view('category.index', compact('categories'));
    }

    /**
     * Menampilkan form tambah kategori
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Menyimpan data kategori
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:100|unique:categories,category_name',
        ], [
            'category_name.required' => 'Nama kategori wajib diisi.',
            'category_name.unique'   => 'Kategori sudah ada.',
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()
            ->route('master-categories.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail kategori
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return view('category.show', compact('category'));
    }

    /**
     * Menampilkan form edit kategori
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', compact('category'));
    }

    /**
     * Mengupdate kategori
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'category_name' => 'required|max:100|unique:categories,category_name,' . $category->id,
        ], [
            'category_name.required' => 'Nama kategori wajib diisi.',
            'category_name.unique'   => 'Kategori sudah ada.',
        ]);

        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()
            ->route('master-categories.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    /**
     * Menghapus kategori
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('master-categories.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }
}