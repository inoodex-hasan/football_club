@extends('backend.layouts.master')

@section('title', 'Team Management')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Team Members</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Members</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.teams.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Add New Member
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'team-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    {{-- DataTables Script --}}
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            // AJAX Delete Handler for Team Table
            $('body').on('click', '#team-table .delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
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
                                    Swal.fire('Deleted!', data.message, 'success')
                                        .then(() => {
                                            // Reload the specific DataTable instance
                                            $('#team-table').DataTable().ajax
                                                .reload(null, false);
                                        });
                                } else {
                                    Swal.fire("Error!", data.message, 'error');
                                }
                            },
                            error: function(xhr) {
                                Swal.fire("Error!", "Something went wrong!", 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
