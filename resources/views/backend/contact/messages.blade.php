@extends('backend.layouts.master')

@section('title', 'Contact Messages')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Contact Messages</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Received Messages</h4>
                        </div>
                        <div class="table-responsive card-body">
                            {{ $dataTable->table(['class' => 'table table-striped table-bordered', 'id' => 'contact-message-table']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalName">Message Details</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <strong>Email:</strong> <span id="modalEmail"></span>
                    </div>
                    <div class="mb-3">
                        <strong>Phone:</strong> <span id="modalPhone"></span>
                    </div>
                    <hr>
                    <strong>Message:</strong>
                    <p id="modalBody" class="mt-2 text-muted" style="white-space: pre-wrap;"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $(document).ready(function() {
            // AJAX Delete Handler
            $('body').on('click', '#contact-message-table .delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).attr('href');

                Swal.fire({
                    title: "Are you sure?",
                    text: "This message will be permanently deleted!",
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
                                    Swal.fire('Deleted!', data.message, 'success');
                                    window.LaravelDataTables["contact-message-table"]
                                        .ajax.reload();
                                }
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('body').on('click', '.view-message', function() {
                // Grab the data using the keys defined in the button above
                const name = $(this).attr('data-name');
                const email = $(this).attr('data-email');
                const phone = $(this).attr('data-phone');
                const message = $(this).attr('data-message');

                // Inject into the Modal elements
                $('#modalName').text("Message from " + name);
                $('#modalEmail').text(email);
                $('#modalPhone').text(phone && phone !== 'null' ? phone : 'N/A');
                $('#modalBody').text(message);

                // Trigger the Modal
                $('#messageModal').modal('show');
            });
        });
    </script>
@endpush
