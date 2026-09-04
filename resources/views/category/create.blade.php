@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="page-title mb-1">

            <i class="fa-solid fa-layer-group me-2"></i>

            Tambah Category

        </h2>

        <p class="text-muted mb-0">

            Tambahkan kategori asset baru ke dalam sistem.

        </p>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card">

                <div class="card-body p-4">


                    {{-- Card Header --}}
                    <div class="d-flex align-items-center mb-4">

                        <div
                            class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:50px;height:50px;">

                            <i class="fa-solid fa-layer-group"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Form Category
                            </h5>

                            <small class="text-muted">
                                Isi informasi kategori asset
                            </small>

                        </div>

                    </div>


                    {{-- Validation Error --}}
                    @if($errors->any())

                        <div class="alert alert-danger">

                            <div class="fw-bold mb-2">

                                <i class="fa-solid fa-circle-exclamation me-2"></i>

                                Terjadi kesalahan:

                            </div>

                            <ul class="mb-0">

                                @foreach($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    {{-- Form --}}
                    <form action="{{ route('master-categories.store') }}"
                          method="POST">

                        @csrf


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama Category
                                <span class="text-danger">*</span>

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="fa-solid fa-layer-group"></i>

                                </span>

                                <input type="text"
                                       name="category_name"
                                       class="form-control @error('category_name') is-invalid @enderror"
                                       value="{{ old('category_name') }}"
                                       placeholder="Contoh: Laptop"
                                       maxlength="100"
                                       required>

                            </div>


                            @error('category_name')

                                <div class="text-danger small mt-1">

                                    {{ $message }}

                                </div>

                            @enderror


                            <small class="text-muted">

                                Masukkan nama kategori asset.

                            </small>

                        </div>


                        {{-- Button --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('master-categories.index') }}"
                               class="btn btn-secondary">

                                <i class="fa-solid fa-arrow-left me-2"></i>

                                Kembali

                            </a>


                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fa-solid fa-save me-2"></i>

                                Simpan Category

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection