@extends('backend.layouts.master')

@section('title', 'Sliders Management')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sliders</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Sliders</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Slider
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'slider-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <!--  DataTables Script -->
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            // Override global delete handler for DataTable to reload table instead of page
            $('body').on('click', '#slider-table .delete-item', function(event) {
                event.preventDefault();
                event.stopPropagation();

                let deletUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    focusConfirm: false,
                    focusCancel: false
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deletUrl,
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire(
                                        'Deleted',
                                        data.message,
                                        'success'
                                    ).then(() => {
                                        $('#slider-table').DataTable().ajax
                                            .reload(null, false);
                                    });
                                } else if (data.status == 'error') {
                                    Swal.fire(
                                        "Can't Delete!",
                                        data.message,
                                        'error'
                                    );
                                }
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    "Error!",
                                    "Something went wrong!",
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
