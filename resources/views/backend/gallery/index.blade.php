@extends('backend.layouts.master')
@section('title', 'Gallery Management')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/assets/modules/chocolat/dist/css/chocolat.css') }}">
    <style>
        .gallery-item {
            height: 200px;
            overflow: hidden;
        }

        .media-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }
    </style>
@endpush

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Gallery Management</h1>
            <div class="section-header-action ml-auto">
                <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">Create New Gallery</a>
            </div>
        </div>

        <div class="section-body">
            @foreach ($gallery as $group)
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>{{ $group->title ?? 'Gallery Items' }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            {{-- SECTION 1: IMAGES --}}
                            @if ($group->images)
                                @foreach ($group->images as $path)
                                    <div class="col-6 col-md-3 mb-4 media-container">
                                        <div class="gallery-item position-relative shadow-sm rounded">
                                            <img src="{{ asset($path) }}" class="img-fluid rounded w-100 h-100"
                                                style="object-fit: cover;">

                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute delete-item"
                                                style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 7px;"
                                                data-url="{{ route('admin.gallery.delete-media', $group->id) }}"
                                                data-path="{{ $path }}" data-type="images">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                            {{-- SECTION 2: VIDEOS --}}
                            @if ($group->videos)
                                @foreach ($group->videos as $path)
                                    <div class="col-6 col-md-3 mb-4 media-container">
                                        <div
                                            class="gallery-item position-relative shadow-sm rounded bg-dark d-flex align-items-center justify-content-center">
                                            <video src="{{ asset($path) }}" class="w-100 h-100" style="object-fit: cover;"
                                                muted></video>

                                            <button type="button"
                                                class="btn btn-danger btn-sm position-absolute delete-item"
                                                style="top: 5px; right: 5px; border-radius: 50%; padding: 2px 7px; z-index: 10;"
                                                data-url="{{ route('admin.gallery.delete-media', $group->id) }}"
                                                data-path="{{ $path }}" data-type="videos">
                                                <i class="fas fa-times"></i>
                                            </button>

                                            <div class="position-absolute text-white" style="pointer-events: none;">
                                                <i class="fas fa-play-circle fa-3x opacity-75"></i>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        {{-- Final Delete Button for the whole group --}}
                        <div class="text-right">
                            <button type="button" class="btn btn-danger btn-sm delete-gallery"
                                data-url="{{ route('admin.gallery.destroy', $group->id) }}">
                                <i class="fas fa-trash"></i> Delete Entire Gallery
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach

            @if ($gallery->isEmpty())
                <div class="card">
                    <div class="card-body text-center">
                        <p>No galleries found.</p>
                    </div>
                </div>
            @endif

            <div class="d-flex justify-content-center mt-4">
                {!! $gallery->links() !!}
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('backend/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script>
        $(document).on('click', '.delete-gallery', function(e) {
            let button = $(this);
            let url = button.data('url');
            let card = button.closest('.card');

            Swal.fire({
                title: 'Delete everything?',
                text: "All images and videos in this gallery group will be removed permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            _method: 'DELETE'
                        },
                        success: function(res) {
                            toastr.success('Gallery deleted');
                            card.fadeOut(400, function() {
                                $(this).remove();
                            });
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).on('click', '.delete-item', function(e) {
            let btn = $(this);
            let url = btn.data('url');
            let path = btn.data('path');
            let type = btn.data('type');
            let container = btn.closest('.media-container');

            Swal.fire({
                title: 'Remove this item?',
                text: "This file will be deleted permanently!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            path: path,
                            type: type
                        },
                        success: function(res) {
                            if (res.status === 'success') {
                                toastr.success(res.message);
                                container.fadeOut(300, function() {
                                    $(this).remove();
                                });
                            }
                        }
                    });
                }
            });
        });
    </script>
@endpush
