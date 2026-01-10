@extends('backend.layouts.master')
@section('title', data_get($settings, 'site_name', config('app.name')) . ' | Orders')
@section('content')
    <!-- Main Content -->

    <section class="section">
        <div class="section-header">
            <h1>Orders</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Orders</h4>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'orders-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $(document).ready(function() {
            $('body').on('change', '.is_approved', function() {
                let value = $(this).val();
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.change-approve-status') }}",
                    method: 'put',
                    data: {
                        id: id,
                        value: value
                    },
                    success: function(data) {
                        toastr.success(data.message)
                        // window.location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
