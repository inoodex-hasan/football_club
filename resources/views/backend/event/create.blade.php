@extends('backend.layouts.master')
@section('title', 'Events')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Training Package</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Training Package</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.events.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- title/event Name --}}
                                    <div class="form-group col-md-6">
                                        <label>Event Title</label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title') }}">
                                    </div>

                                    {{-- Main Image & Multiple Images Side by Side --}}
                                    <div class="form-group col-md-6">
                                        <label>Main Image <code>(Single)</code></label>
                                        <input type="file" class="form-control" name="main_image" id="mainImageInput"
                                            accept="image/*">
                                        <div id="mainImagePreview" class="mt-3"></div>
                                    </div>

                                    {{-- <div class="form-group col-md-6">
                                        <label>Gallery Images <code>(Optional, multiple)</code></label>
                                        <input type="file" class="form-control" name="images[]" id="galleryImageInput"
                                            multiple accept="image/*">
                                        <div id="galleryImagePreview" class="d-flex flex-wrap mt-3"></div>
                                    </div> --}}

                                    {{-- Start Date --}}
                                    <div class="form-group col-md-6">
                                        <label>Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                            name="start_date" value="{{ old('start_date') }}" required>
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- End Date --}}
                                    <div class="form-group col-md-6">
                                        <label>End Date (Optional)</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                            name="end_date" value="{{ old('end_date') }}">
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Start Time --}}
                                    <div class="form-group col-md-6">
                                        <label>Start Time</label>
                                        <input type="time" class="form-control @error('start_time') is-invalid @enderror"
                                            name="start_time" value="{{ old('start_time') }}">
                                        @error('start_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- End Time --}}
                                    <div class="form-group col-md-6">
                                        <label>End Time</label>
                                        <input type="time" class="form-control @error('end_time') is-invalid @enderror"
                                            name="end_time" value="{{ old('end_time') }}">
                                        @error('end_time')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Location --}}
                                    <div class="form-group col-md-6">
                                        <label>Location </label>
                                        <input type="text" class="form-control @error('location') is-invalid @enderror"
                                            name="location" value="{{ old('location') }}" required>
                                        @error('location')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>

                                </div>


                                <div class="form-group mb-3">
                                    <label>Details</label>
                                    <textarea name="details" class="summernote">{{ old('details') }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JavaScript for Image Previews with Remove Option --}}
    <script>
        // Main Image Preview
        document.getElementById('mainImageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('mainImagePreview');
            preview.innerHTML = '';

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.style.position = 'relative';
                    imgWrapper.style.display = 'inline-block';
                    imgWrapper.style.margin = '5px';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '120px';
                    img.style.height = '120px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '8px';
                    imgWrapper.appendChild(img);

                    // Remove button
                    const removeBtn = document.createElement('span');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.style.position = 'absolute';
                    removeBtn.style.top = '-8px';
                    removeBtn.style.right = '-8px';
                    removeBtn.style.background = 'red';
                    removeBtn.style.color = 'white';
                    removeBtn.style.width = '24px';
                    removeBtn.style.height = '24px';
                    removeBtn.style.display = 'flex';
                    removeBtn.style.justifyContent = 'center';
                    removeBtn.style.alignItems = 'center';
                    removeBtn.style.borderRadius = '50%';
                    removeBtn.style.cursor = 'pointer';
                    removeBtn.title = 'Remove Image';
                    removeBtn.onclick = function() {
                        preview.innerHTML = '';
                        document.getElementById('mainImageInput').value = '';
                    };

                    imgWrapper.appendChild(removeBtn);
                    preview.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            }
        });

        // Gallery Images Preview (Multiple)
        document.getElementById('galleryImageInput').addEventListener('change', function(event) {
            let files = Array.from(event.target.files);
            const preview = document.getElementById('galleryImagePreview');

            // Clear previous previews only if new selection (to allow adding more)
            if (files.length > 0) {
                // Keep existing if user selects again, but we'll rebuild from current files
                preview.innerHTML = '';
            }

            files.forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const imgWrapper = document.createElement('div');
                    imgWrapper.style.position = 'relative';
                    imgWrapper.style.margin = '8px';
                    imgWrapper.style.display = 'inline-block';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '100px';
                    img.style.height = '100px';
                    img.style.objectFit = 'cover';
                    img.style.borderRadius = '8px';
                    imgWrapper.appendChild(img);

                    // Remove button
                    const removeBtn = document.createElement('span');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.style.position = 'absolute';
                    removeBtn.style.top = '-8px';
                    removeBtn.style.right = '-8px';
                    removeBtn.style.background = 'red';
                    removeBtn.style.color = 'white';
                    removeBtn.style.width = '24px';
                    removeBtn.style.height = '24px';
                    removeBtn.style.display = 'flex';
                    removeBtn.style.justifyContent = 'center';
                    removeBtn.style.alignItems = 'center';
                    removeBtn.style.borderRadius = '50%';
                    removeBtn.style.cursor = 'pointer';
                    removeBtn.title = 'Remove Image';
                    removeBtn.onclick = function() {
                        files.splice(index, 1);
                        updateGalleryFileList(files);
                        imgWrapper.remove();
                    };

                    imgWrapper.appendChild(removeBtn);
                    preview.appendChild(imgWrapper);
                };
                reader.readAsDataURL(file);
            });

            function updateGalleryFileList(filesArray) {
                const dataTransfer = new DataTransfer();
                filesArray.forEach(file => dataTransfer.items.add(file));
                document.getElementById('galleryImageInput').files = dataTransfer.files;
            }
        });
    </script>
@endsection
