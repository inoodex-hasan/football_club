@extends('backend.layouts.master') <!-- Or your backend layout -->

@section('title', 'Player Profile')

@section('content')
    <section class="section">
        <div class="section-header justify-content-between">
            <h1>Player Profile</h1>
            <div class="card-header-action ">
                <a href="{{ route('admin.admission.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        {{-- <div class="card-header">
                            <h4>Create Training Package</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.events.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div> --}}
                        <div class="card-body">
                            <div class="card shadow-lg border-0 rounded-4 overflow-hidden mb-4">
                                <div class="bg-gradient-primary text-white py-5 position-relative"
                                    style="background: linear-gradient(135deg, #007bff, #0056b3);">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-md-3 text-center">
                                                <img src="{{ $admissions->image ? asset($admissions->image) : 'https://placehold.co/600x400/png' }}"
                                                    alt="{{ $admissions->name }}"
                                                    class="rounded-circle border border-5 border-white shadow-lg"
                                                    width="200" height="200" style="object-fit: cover;">
                                            </div>
                                            <div class="col-md-9">
                                                <h2 class="display-5 fw-bold mb-1">{{ $admissions->name }}</h2>
                                                {{-- <p class="lead mb-3">
                                <i class="fas fa-trophy me-2"></i> Position: {{ $admissions->position ?? 'Not Specified' }}
                            </p> --}}
                                                <div>
                                                    @if ($admissions->status == 'completed')
                                                        <span class="badge bg-success fs-5 px-4 py-2">Completed</span>
                                                    @elseif($admissions->status == 'pending')
                                                        <span
                                                            class="badge bg-warning text-dark fs-5 px-4 py-2">Pending</span>
                                                    @else
                                                        <span class="badge bg-danger fs-5 px-4 py-2">Rejected</span>
                                                    @endif
                                                </div>
                                                <p class="mt-3 mb-0 opacity-75">
                                                    Admitted on: {{ $admissions->created_at->format('d M Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- Personal Information -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="mb-0"><i class="fas fa-user me-2"></i> Personal Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Email</strong>
                                                    <span>{{ $admissions->email }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Phone</strong>
                                                    <span>{{ $admissions->phone }}</span>
                                                </li>
                                                {{-- <li class="list-group-item d-flex justify-content-between py-3">
                                <strong>Date of Birth</strong>
                                <span>{{ \Carbon\Carbon::parse($admissions->date_of_birth)->format('d M Y') }}</span>
                            </li> --}}
                                                <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Age</strong>
                                                    <span>{{ $admissions->age }} years</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Address</strong>
                                                    <span>{{ $admissions->address }}</span>
                                                </li>
                                                <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>NID</strong>
                                                    <span>{{ $admissions->nid ?? 'Not Provided' }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Training Package -->
                                <div class="col-lg-6 mb-4">
                                    <div class="card h-100 shadow-sm border-0">
                                        <div class="card-header bg-success text-white">
                                            <h5 class="mb-0"><i class="fas fa-dumbbell me-2"></i> Training Package Details
                                            </h5>
                                        </div>
                                        <div class="card-body">
                                            @if ($trainingPackages->count() > 0)
                                                @foreach ($trainingPackages as $package)    
                                                <h3 class="fw-bold">{{ $package?->name }}</h3>
                                                <p class="text-muted">Package selected during admission.</p>

                                                 <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Duration</strong>
                                                    <span>{{ $package?->duration }}</span>
                                                </li>
                                                 <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Price</strong>
                                                    <span>{{$settings->currency_icon}}{{ $package?->price }}</span>
                                                </li>
                                                 <li class="list-group-item d-flex justify-content-between py-3">
                                                    <strong>Status</strong>
                                                    @if ($package?->status == 1) 
                                                    <span><span class="badge bg-success text-white">Active</span></span>
                                                    @else
                                                    <span><span class="badge bg-danger text-white">Inactive</span></span>
                                                    @endif
                                                </li>

                                                @endforeach
                                                <!-- If you have more package details in DB (duration, price, etc.), add them here -->
                                            @else
                                                <p class="text-muted">No training package selected yet.</p>
                                            @endif

                                            <!-- Optional: Add more fields if stored separately -->
                                            <!-- Example:
                            <p><strong>Duration:</strong> 12 Months</p>
                            <p><strong>Price:</strong> $599</p>
                            <p><strong>Start Date:</strong> Jan 1, 2025</p>
                            -->
                                        </div>
                                        {{-- <div class="card-footer bg-light text-center">
                        <a href="{{ route('admin.admissions.edit', $admissions->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Edit Profile
                        </a>
                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <div class="container-fluid py-4 mt-5">
        <!-- Back Button -->
        <div class="mb-4">
            <a href="{{ route('admin.admission.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to Players List
            </a>
        </div>
    
        <!-- Profile Header -->
        
    </div> --}}


    <style>
        .bg-gradient-primary {
            min-height: 300px;
        }

        .card {
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }
    </style>
@endsection
