@extends('backend.layouts.master')
@section('title', 'About Us')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>About Us</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('admin.about.us.update', $about->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Title <span class="text-danger">*</span></label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title', $about->title) }}" required>
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Subtitle (Optional)</label>
                                        <input type="text" name="subtitle"
                                            class="form-control @error('subtitle') is-invalid @enderror"
                                            value="{{ old('subtitle', $about->subtitle) }}">
                                        @error('subtitle')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea name="description" class="summernote @error('description') is-invalid @enderror" rows="5" required>{{ old('description', $about->description) }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>About Images (Select multiple)</label>
                                        <input type="file" name="images[]" class="form-control" accept="image/*"
                                            multiple>

                                        @if ($about->images && is_array($about->images))
                                            <div class="mt-3 d-flex flex-wrap">
                                                @foreach ($about->images as $index => $img)
                                                    <div class="mr-3 mb-3 text-center position-relative"
                                                        id="image-container-{{ $index }}">
                                                        <img src="{{ asset($img) }}"
                                                            style="width: 100px; height: 80px; object-fit: cover; border: 1px solid #ddd; border-radius: 5px;">

                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute"
                                                            style="top: -10px; right: -10px; border-radius: 50%; padding: 2px 6px;"
                                                            onclick="deleteAboutImage('{{ $index }}', '{{ $img }}')">
                                                            &times;
                                                        </button>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                {{ old('status', $about->status) == '1' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', $about->status) == '0' ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success">Update About Section</button>
                                        <a href="{{ route('admin.about') }}" class="btn btn-secondary">Back</a>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function deleteAboutImage(index, path) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: "{{ route('admin.about.image.delete') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        image_index: index,
                        image_path: path
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#image-container-' + index).remove();
                            toastr.success(response.message);
                        }
                    }
                });
            }
        }
    </script>
@endsection
