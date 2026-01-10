@extends('backend.layouts.master')
@section('title', 'Terms & Conditions')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Terms & Conditions</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Terms & Conditions</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.terms_conditions.create') }}" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create New
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terms as $term)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $term->title }}</td>
                                                <td>{!! Str::limit(strip_tags($term->description), 50) !!}</td>
                                                <td>
                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" name="custom-switch-checkbox"
                                                            data-id="{{ $term->id }}"
                                                            {{ $term->status == 1 ? 'checked' : '' }}
                                                            class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.terms_conditions.edit', $term->id) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <form action="{{ route('admin.terms_conditions.destroy', $term->id) }}"
                                                        method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm delete-item">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

{{-- @push('scripts')
    <script>
        $(document).ready(function() {
            $('body').on('click', '.change-status', function() {
                let isChecked = $(this).is(':checked');
                let id = $(this).data('id');
                $.ajax({
                    url: "{{ route('admin.terms-conditions.change-status') }}",
                    method: 'PUT',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        status: isChecked ? 1 : 0
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    },
                    error: function(xhr) {
                        toastr.error('Error updating status');
                    }
                })
            })
        })
    </script>
@endpush --}}
