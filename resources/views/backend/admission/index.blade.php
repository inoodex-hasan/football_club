@extends('backend.layouts.master')
@section('title', data_get($settings, 'site_name', config('app.name')) . ' | Admission')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Admission</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="row mb-3 card-header align-items-center">
                            <div class="col-md-3">
                                <input type="date" id="filter_date" class="form-control">
                            </div>

                            <div class="col-md-2">
                                {{-- <select id="filter_month" class="form-control">
                                    <option value="">Month</option>
                                    @for ($m = 1; $m <= 12; $m++)
                                        <option value="{{ $m }}">
                                            {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                        </option>
                                    @endfor
                                </select> --}}
                                <input type="month" name="" class="form-control" id="filter_month">
                            </div>

                            <div class="col-md-2">
                                {{-- <select id="filter_year" class="form-control">
                                    <option value="">Year</option>
                                    @for ($y = now()->year; $y >= 2020; $y--)
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endfor
                                </select> --}}
                                <input type="number" id="filter_year" class="form-control" placeholder="Year">
                            </div>

                            <div class="col-md-2">
                                <input type="number" id="filter_age" class="form-control" placeholder="Age">
                            </div>

                            <div class="col-md-1">
                                <button id="resetFilter" class="btn btn-danger">
                                    Reset
                                </button>
                            </div>
                        </div>
                        <!-- Summary Cards -->
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-primary"><i class="fas fa-users"></i></div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Admission</h4>
                                        </div>
                                        <div class="card-body" id="totalAdmission">0</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="card card-statistic-1">
                                    <div class="card-icon bg-success"><i class="fas fa-dollar-sign"></i></div>
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4>Total Earn</h4>
                                        </div>
                                        <div class="card-body" id="totalEarn">0 ৳</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-header">
                            <h4>All Admission</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.admission.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create New</a>
                            </div>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'admission-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    {{-- <script>
        $('#filter_date, #filter_month, #filter_year, #filter_age').on('change keyup', function() {
            $('#admission-table').DataTable().ajax.reload();
        });

        // reset
        $('#resetFilter').on('click', function() {
            $('#filter_date').val('');
            $('#filter_month').val('');
            $('#filter_year').val('');
            $('#filter_age').val('');
            reloadTable();
        });
    </script> --}}
    {{-- <script>
        function reloadTable() {
            $('#admission-table').DataTable().ajax.reload();
        }

        // onchange auto filter
        $('#filter_date, #filter_month, #filter_year, #filter_age')
            .on('change keyup', reloadTable);

        // reset
        $('#resetFilter').on('click', function() {
            $('#filter_date').val('');
            $('#filter_month').val('');
            $('#filter_year').val('');
            $('#filter_age').val('');
            reloadTable();
        });
    </script> --}}
    <script>
        function updateSummary() {
            let table = $('#admission-table').DataTable();
            let data = table.rows({
                search: 'applied'
            }).data(); // filtered rows
            let totalAdmission = data.length;
            let totalEarn = 0;

            for (let i = 0; i < data.length; i++) {
                // যদি order price column থাকে
                let price = parseFloat(data[i].order?.amount ?? 0);
                totalEarn += price;
            }

            $('#totalAdmission').text(totalAdmission);
            $('#totalEarn').text( '৳ '+  totalEarn);
        }

        $(document).ready(function() {
            let table = $('#admission-table').DataTable();

            // summary update after each draw
            table.on('draw.dt', function() {
                updateSummary();
            });

            // filters (already in your code)
            $('#filter_date, #filter_month, #filter_year, #filter_age').on('change keyup', function() {
                table.ajax.reload();
            });

            // reset
            $('#resetFilter').on('click', function() {
                $('#filter_date').val('');
                $('#filter_month').val('');
                $('#filter_year').val('');
                $('#filter_age').val('');
                table.ajax.reload();
            });

            // initial load
            updateSummary();
        });
    </script>
@endpush
