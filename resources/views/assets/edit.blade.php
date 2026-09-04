@extends('layouts.app')

@section('title', 'Edit Asset')

@section('content')

<div class="container-fluid">

    <div class="row">

        <div class="col-lg-12">

            <div class="card shadow-sm border-0">

                <div class="card-header bg-warning text-dark">

                    <h4 class="mb-0">

                        <i class="fa-solid fa-pen-to-square"></i>

                        Edit Data Asset

                    </h4>

                </div>

                <div class="card-body">

                    {{-- Error Validation --}}
                    @if ($errors->any())

                        <div class="alert alert-danger">

                            <strong>

                                <i class="fa-solid fa-circle-exclamation"></i>

                                Terjadi Kesalahan

                            </strong>

                            <hr>

                            <ul class="mb-0">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif

                    <form action="{{ route('master-assets.update', $asset->id) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('assets.partials.form')

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection