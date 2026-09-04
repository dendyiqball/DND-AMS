@extends('layouts.app')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="page-title mb-1">
                <i class="fa-solid fa-user-pen me-2"></i>
                Edit Employee
            </h2>

            <p class="text-muted mb-0">
                Perbarui data employee
            </p>

        </div>

        <a href="{{ route('master-employees.index') }}"
           class="btn btn-secondary">

            <i class="fa-solid fa-arrow-left me-2"></i>
            Kembali

        </a>

    </div>


    {{-- Error --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Terjadi kesalahan:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card">

                <div class="card-body p-4">

                    <form action="{{ route('master-employees.update', $employee->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')


                        {{-- Employee Code --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Employee Code
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="employee_code"
                                   class="form-control"
                                   value="{{ old('employee_code', $employee->employee_code) }}"
                                   required>

                        </div>


                        {{-- Employee Name --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Nama Employee
                                <span class="text-danger">*</span>
                            </label>

                            <input type="text"
                                   name="employee_name"
                                   class="form-control"
                                   value="{{ old('employee_name', $employee->employee_name) }}"
                                   required>

                        </div>


                        {{-- Department --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Department
                            </label>

                            <input type="text"
                                   name="department"
                                   class="form-control"
                                   value="{{ old('department', $employee->department) }}">

                        </div>


                        {{-- Position --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Position
                            </label>

                            <input type="text"
                                   name="position"
                                   class="form-control"
                                   value="{{ old('position', $employee->position) }}">

                        </div>


                        {{-- Email --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ old('email', $employee->email) }}">

                        </div>


                        {{-- Phone --}}
                        <div class="mb-3">

                            <label class="form-label">
                                Phone
                            </label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', $employee->phone) }}">

                        </div>


                        {{-- Status --}}
                        <div class="mb-4">

                            <label class="form-label">
                                Status
                                <span class="text-danger">*</span>
                            </label>

                            <select name="status"
                                    class="form-select"
                                    required>

                                <option value="Active"
                                    {{ old('status', $employee->status) === 'Active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="Inactive"
                                    {{ old('status', $employee->status) === 'Inactive' ? 'selected' : '' }}>
                                    Inactive
                                </option>

                            </select>

                        </div>


                        {{-- Action --}}
                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ route('master-employees.index') }}"
                               class="btn btn-secondary">

                                <i class="fa-solid fa-xmark me-2"></i>
                                Batal

                            </a>

                            <button type="submit"
                                    class="btn btn-primary">

                                <i class="fa-solid fa-save me-2"></i>
                                Update Employee

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection