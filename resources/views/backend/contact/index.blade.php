@extends('backend.layouts.master')

@section('title', 'Contact Settings')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Contact Settings</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <!-- Edit Form Table -->
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Contact Information</h4>
                        </div>
                        <div class="card-body p-0">
                            <form action="{{ route('admin.contact.update', $contact->id ?? 1) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr class="bg-light">
                                            {{-- <th style="width: 50px;" class="text-center"></th> --}}
                                            <th style="width: 180px;">Field</th>
                                            <th>Value</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            {{-- <td class="text-center align-middle">
                                                <i class="fas fa-envelope text-muted"></i>
                                            </td> --}}
                                            <td class="align-middle">Email Address</td>
                                            <td>
                                                <input type="email" name="email"
                                                    class="form-control form-control-sm @error('email') is-invalid @enderror"
                                                    value="{{ old('email', $contact->email ?? '') }}"
                                                    placeholder="contact@example.com">
                                                @error('email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="text-center align-middle">
                                                <i class="fas fa-phone-alt text-muted"></i>
                                            </td> --}}
                                            <td class="align-middle">Phone Number</td>
                                            <td>
                                                <input type="text" name="phone"
                                                    class="form-control form-control-sm @error('phone') is-invalid @enderror"
                                                    value="{{ old('phone', $contact->phone ?? '') }}"
                                                    placeholder="+1 (555) 123-4567">
                                                @error('phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="text-center align-middle">
                                                <i class="fas fa-map-marker-alt text-muted"></i>
                                            </td> --}}
                                            <td class="align-middle">Physical Address</td>
                                            <td>
                                                <textarea name="address" rows="3" class="summernote form-control-sm @error('address') is-invalid @enderror"
                                                    placeholder="123 Main Street&#10;City, State 12345">{{ old('address', $contact->address ?? '') }}</textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div class="card-footer text-right" style="background-color: #fdfdfd;">
                                    <button type="submit" class="btn btn-primary">
                                        Save Changes
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Current Data Table -->
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>Current Contact Information</h4>
                        </div>
                        <div class="card-body p-0">
                            <table class="table mb-0">
                                <thead>
                                    <tr class="bg-light">
                                        {{-- <th style="width: 50px;" class="text-center"></th> --}}
                                        <th style="width: 180px;">Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        {{-- <td class="text-center"><i class="fas fa-envelope text-muted"></i></td> --}}
                                        <td>Email Address</td>
                                        <td>{{ $contact->email ?: '<em class="text-muted">Not set</em>' }}</td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="text-center"><i class="fas fa-phone-alt text-muted"></i></td> --}}
                                        <td>Phone Number</td>
                                        <td>{{ $contact->phone ?: '<em class="text-muted">Not set</em>' }}</td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="text-center"><i class="fas fa-map-marker-alt text-muted"></i></td> --}}
                                        <td>Physical Address</td>
                                        <td class="text-prewrap">
                                            {{ $contact->address ?: '<em class="text-muted">Not set</em>' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .text-prewrap {
            white-space: pre-wrap;
        }

        .card-header h4 {
            margin: 0;
            font-size: 1.1rem;
            font-weight: 500;
        }
    </style>
@endpush
