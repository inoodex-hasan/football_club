@extends('backend.layouts.master')

@section('title', 'Review Management')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Customer Reviews</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Reviews</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Review
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'review-table']) }}
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
            // Using the same AJAX delete logic you have for Sliders
            $('body').on('click', '#review-table .delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire('Deleted', data.message, 'success').then(
                                        () => {
                                            $('#review-table').DataTable().ajax
                                                .reload(null, false);
                                        });
                                } else {
                                    Swal.fire("Error!", data.message, 'error');
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
