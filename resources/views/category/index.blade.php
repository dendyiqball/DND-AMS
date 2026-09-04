@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="page-title mb-1">
                <i class="fa-solid fa-layer-group me-2"></i>
                Category
            </h2>

            <p class="text-muted mb-0">
                Kelola data kategori asset
            </p>
        </div>

        <a href="{{ route('master-categories.create') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-plus me-2"></i>
            Tambah Category

        </a>

    </div>


    {{-- Card --}}
    <div class="card">

        <div class="card-body">


            {{-- Header Table --}}
            <div class="d-flex justify-content-between align-items-center mb-3">

                <div>

                    <h5 class="fw-bold mb-1">
                        Data Category
                    </h5>

                    <small class="text-muted">
                        Daftar kategori asset yang tersedia
                    </small>

                </div>

                <span class="badge bg-primary rounded-pill px-3 py-2">

                    {{ $categories->total() }} Category

                </span>

            </div>


            {{-- Table --}}
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">

                        <tr>

                            <th width="70">
                                No
                            </th>

                            <th>
                                Nama Category
                            </th>

                            <th width="180" class="text-center">
                                Aksi
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($categories as $category)

                        <tr>

                            <td>
                                {{ $categories->firstItem() + $loop->index }}
                            </td>


                            <td>

                                <div class="d-flex align-items-center">

                                    <div
                                        class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                                        style="width:40px;height:40px;">

                                        <i class="fa-solid fa-layer-group"></i>

                                    </div>

                                    <div>

                                        <div class="fw-semibold">
                                            {{ $category->category_name }}
                                        </div>

                                        <small class="text-muted">
                                            ID: {{ $category->id }}
                                        </small>

                                    </div>

                                </div>

                            </td>


                            <td class="text-center">

                                {{-- Detail --}}
                                <a href="{{ route('master-categories.show', $category->id) }}"
                                   class="btn btn-sm btn-info text-white"
                                   title="Detail">

                                    <i class="fa-solid fa-eye"></i>

                                </a>


                                {{-- Edit --}}
                                <a href="{{ route('master-categories.edit', $category->id) }}"
                                   class="btn btn-sm btn-warning"
                                   title="Edit">

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                {{-- Delete --}}
                                <form action="{{ route('master-categories.destroy', $category->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus category ini?');">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-danger"
                                            title="Hapus">

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="3" class="text-center py-5">

                                <i class="fa-solid fa-layer-group fa-3x text-muted mb-3"></i>

                                <h6 class="fw-bold">
                                    Belum ada data category
                                </h6>

                                <p class="text-muted mb-3">
                                    Silakan tambahkan category terlebih dahulu.
                                </p>

                                <a href="{{ route('master-categories.create') }}"
                                   class="btn btn-primary">

                                    <i class="fa-solid fa-plus me-2"></i>
                                    Tambah Category

                                </a>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>


            {{-- Pagination --}}
            @if($categories->hasPages())

                <div class="d-flex justify-content-end mt-3">

                    {{ $categories->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

@endsection