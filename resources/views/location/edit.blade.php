@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="mb-4">

        <h2 class="page-title mb-1">

            <i class="fa-solid fa-pen-to-square me-2"></i>

            Edit Location

        </h2>

        <p class="text-muted mb-0">

            Perbarui informasi lokasi asset.

        </p>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card">

                <div class="card-body p-4">


                    {{-- Card Header --}}
                    <div class="d-flex align-items-center mb-4">

                        <div
                            class="bg-warning text-dark rounded-circle d-flex align-items-center justify-content-center me-3"
                            style="width:50px;height:50px;">

                            <i class="fa-solid fa-pen"></i>

                        </div>

                        <div>

                            <h5 class="fw-bold mb-1">
                                Edit Location
                            </h5>

                            <small class="text-muted">
                                ID Location: {{ $location->id }}
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
                    <form action="{{ route('master-locations.update', $location->id) }}"
                          method="POST">

                        @csrf

                        @method('PUT')


                        <div class="mb-4">

                            <label class="form-label fw-semibold">

                                Nama Location

                                <span class="text-danger">*</span>

                            </label>


                            <div class="input-group">

                                <span class="input-group-text">

                                    <i class="fa-solid fa-location-dot"></i>

                                </span>

                                <input type="text"
                                       name="location_name"
                                       class="form-control @error('location_name') is-invalid @enderror"
                                       value="{{ old('location_name', $location->location_name) }}"
                                       maxlength="100"
                                       required>

                            </div>


                            @error('location_name')

                                <div class="text-danger small mt-1">

                                    {{ $message }}

                                </div>

                            @enderror

                        </div>


                        {{-- Button --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('master-locations.index') }}"
                               class="btn btn-secondary">

                                <i class="fa-solid fa-arrow-left me-2"></i>

                                Kembali

                            </a>


                            <button type="submit"
                                    class="btn btn-warning">

                                <i class="fa-solid fa-save me-2"></i>

                                Update Location

                            </button>

                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection