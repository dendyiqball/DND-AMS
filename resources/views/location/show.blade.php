@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title mb-1">

                <i class="fa-solid fa-circle-info me-2"></i>

                Detail Location

            </h2>

            <p class="text-muted mb-0">

                Informasi detail lokasi asset.

            </p>

        </div>


        <a href="{{ route('master-locations.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>

            Kembali

        </a>

    </div>


    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card">

                <div class="card-body p-4">


                    {{-- Icon --}}
                    <div class="text-center mb-4">

                        <div
                            class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center"
                            style="width:80px;height:80px;">

                            <i class="fa-solid fa-location-dot fa-2x"></i>

                        </div>

                    </div>


                    {{-- Title --}}
                    <div class="text-center mb-4">

                        <h4 class="fw-bold mb-1">

                            {{ $location->location_name }}

                        </h4>

                        <span class="badge bg-primary">

                            Location #{{ $location->id }}

                        </span>

                    </div>


                    <hr>


                    {{-- Information --}}
                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-hashtag me-2"></i>

                            ID Location

                        </div>

                        <div class="col-sm-7 fw-semibold">

                            {{ $location->id }}

                        </div>

                    </div>


                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-location-dot me-2"></i>

                            Nama Location

                        </div>

                        <div class="col-sm-7 fw-semibold">

                            {{ $location->location_name }}

                        </div>

                    </div>


                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-calendar-plus me-2"></i>

                            Dibuat

                        </div>

                        <div class="col-sm-7">

                            {{ $location->created_at
                                ? $location->created_at->format('d M Y H:i')
                                : '-' }}

                        </div>

                    </div>


                    <div class="row py-3">

                        <div class="col-sm-5 text-muted">

                            <i class="fa-solid fa-clock-rotate-left me-2"></i>

                            Terakhir Diperbarui

                        </div>

                        <div class="col-sm-7">

                            {{ $location->updated_at
                                ? $location->updated_at->format('d M Y H:i')
                                : '-' }}

                        </div>

                    </div>


                    <hr>


                    {{-- Action --}}
                    <div class="d-flex justify-content-end gap-2 mt-3">

                        <a href="{{ route('master-locations.index') }}"
                           class="btn btn-secondary">

                            <i class="fa-solid fa-arrow-left me-2"></i>

                            Kembali

                        </a>


                        <a href="{{ route('master-locations.edit', $location->id) }}"
                           class="btn btn-warning">

                            <i class="fa-solid fa-pen me-2"></i>

                            Edit

                        </a>


                        <form action="{{ route('master-locations.destroy', $location->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Yakin ingin menghapus lokasi ini?');">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger">

                                <i class="fa-solid fa-trash me-2"></i>

                                Hapus

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection