@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-4">

        <h4 class="fw-bold mb-1">
            Profile
        </h4>

        <p class="text-muted mb-0">
            Kelola informasi akun dan password Anda.
        </p>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-1"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- ERROR MESSAGE --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row g-4">

        {{-- ========================= --}}
        {{-- INFORMASI PROFILE --}}
        {{-- ========================= --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-semibold mb-0">

                        <i class="bi bi-person-circle me-1"></i>

                        Informasi Profile

                    </h5>

                </div>


                <div class="card-body">

                    <form action="{{ route('profile.update') }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        {{-- NAME --}}
                        <div class="mb-3">

                            <label for="name"
                                   class="form-label fw-semibold">

                                Nama

                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control @error('name') is-invalid @enderror"
                                value="{{ old('name', $user->name) }}"
                                required
                            >

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="mb-3">

                            <label for="email"
                                   class="form-label fw-semibold">

                                Email

                            </label>

                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', $user->email) }}"
                                required
                            >

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- ROLE --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Role

                            </label>

                            <input
                                type="text"
                                class="form-control"
                                value="{{ $user->role }}"
                                readonly
                            >

                        </div>


                        <button type="submit"
                                class="btn btn-primary">

                            <i class="bi bi-save me-1"></i>

                            Simpan Profile

                        </button>

                    </form>

                </div>

            </div>

        </div>


        {{-- ========================= --}}
        {{-- UBAH PASSWORD --}}
        {{-- ========================= --}}

        <div class="col-lg-6">

            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-semibold mb-0">

                        <i class="bi bi-lock me-1"></i>

                        Ubah Password

                    </h5>

                </div>


                <div class="card-body">

                    <form action="{{ route('profile.password') }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        {{-- PASSWORD LAMA --}}
                        <div class="mb-3">

                            <label for="old_password"
                                   class="form-label fw-semibold">

                                Password Lama

                            </label>

                            <input
                                type="password"
                                name="old_password"
                                id="old_password"
                                class="form-control @error('old_password') is-invalid @enderror"
                                placeholder="Masukkan password lama"
                                required
                            >

                            @error('old_password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PASSWORD BARU --}}
                        <div class="mb-3">

                            <label for="new_password"
                                   class="form-label fw-semibold">

                                Password Baru

                            </label>

                            <input
                                type="password"
                                name="new_password"
                                id="new_password"
                                class="form-control @error('new_password') is-invalid @enderror"
                                placeholder="Minimal 6 karakter"
                                required
                            >

                            @error('new_password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- KONFIRMASI PASSWORD --}}
                        <div class="mb-4">

                            <label for="new_password_confirmation"
                                   class="form-label fw-semibold">

                                Konfirmasi Password Baru

                            </label>

                            <input
                                type="password"
                                name="new_password_confirmation"
                                id="new_password_confirmation"
                                class="form-control"
                                placeholder="Ulangi password baru"
                                required
                            >

                        </div>


                        <button type="submit"
                                class="btn btn-warning">

                            <i class="bi bi-key me-1"></i>

                            Ubah Password

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection