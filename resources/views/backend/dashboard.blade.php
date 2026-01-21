@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')
    <section class="section">

        {{-- Section Header --}}
        <div class="section-header">
            <div class="d-flex justify-content-between align-items-center w-100">
                <h1 class="mb-0">Dashboard</h1>
            </div>
        </div>

        {{-- Dashboard Cards --}}
        <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary"><i class="fas fa-briefcase"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total user</h4>
                            </div>
                            <div class="card-body">6</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger"><i class="fas fa-users"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Admission</h4>
                            </div>
                            <div class="card-body">2</div>
                        </div>
                    </div>
                </a>
            </div>
    </section>
@endsection
