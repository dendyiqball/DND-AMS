@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="page-title mb-1">Company</h2>
        <small class="text-muted">
            Daftar perusahaan yang terdaftar di sistem
        </small>
    </div>

    <a href="{{ route('master-companies.create') }}"
       class="btn btn-primary">

        <i class="fa-solid fa-plus"></i>
        Tambah Company

    </a>

</div>


<div class="card">

    <div class="card-body">

        @if($companies->count() > 0)

            <div class="table-responsive">

                <table class="table table-hover">

                    <thead>

                        <tr>
                            <th width="80">No</th>
                            <th>Nama Company</th>
                            <th width="200">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($companies as $company)

                            <tr>

                                <td>
                                    {{ $companies->firstItem() + $loop->index }}
                                </td>

                                <td>
                                    {{ $company->company_name }}
                                </td>

                                <td>

                                    <a href="{{ route('master-companies.show', $company->id) }}"
                                       class="btn btn-sm btn-info text-white">

                                        <i class="fa-solid fa-eye"></i>

                                    </a>

                                    <a href="{{ route('master-companies.edit', $company->id) }}"
                                       class="btn btn-sm btn-warning">

                                        <i class="fa-solid fa-pen"></i>

                                    </a>

                                    <form action="{{ route('master-companies.destroy', $company->id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus company ini?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-sm btn-danger">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $companies->links() }}

            </div>

        @else

            <div class="text-center py-5">

                <i class="fa-solid fa-building fa-3x text-muted mb-3"></i>

                <h5>Belum ada data Company</h5>

                <p class="text-muted">
                    Silakan tambahkan company terlebih dahulu.
                </p>

                <a href="{{ route('master-companies.create') }}"
                   class="btn btn-primary">

                    <i class="fa-solid fa-plus"></i>
                    Tambah Company

                </a>

            </div>

        @endif

    </div>

</div>

@endsection