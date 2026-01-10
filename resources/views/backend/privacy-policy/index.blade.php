@extends('backend.layouts.master')
@section('title', 'Privacy Policy')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Privacy Policy</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Privacy Policies</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.privacy_policies.create') }}" class="btn btn-primary"><i
                                        class="fas fa-plus"></i> Create New</a>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($policies as $policy)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $policy->title }}</td>
                                                <td>{!! Str::limit(strip_tags($policy->description), 50) !!}</td>
                                                <td>
                                                    <label class="custom-switch mt-2">
                                                        <input type="checkbox" data-id="{{ $policy->id }}"
                                                            {{ $policy->status == 1 ? 'checked' : '' }}
                                                            class="custom-switch-input change-status">
                                                        <span class="custom-switch-indicator"></span>
                                                    </label>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.privacy_policies.edit', $policy->id) }}"
                                                        class="btn btn-primary btn-sm"><i class="far fa-edit"></i></a>
                                                    <a href="{{ route('admin.privacy_policies.destroy', $policy->id) }}"
                                                        class="btn btn-danger btn-sm delete-item"><i
                                                            class="far fa-trash-alt"></i></a>
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
                    url: "{{ route('admin.privacy-policy.change-status') }}",
                    method: 'PUT',
                    data: {
                        id: id,
                        status: isChecked
                    },
                    success: function(data) {
                        toastr.success(data.message)
                    }
                })
            })
        })
    </script>
@endpush --}}
