@extends('backend.layouts.master')
@section('title', 'Image Gallery')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Image Gallery</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Image Gallery</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.gallery.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Title <code>(optional)</code></label>
                                        <input type="text" class="form-control" name="title"
                                            value="{{ old('title', $gallery->title ?? '') }}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1"
                                                {{ old('status', $gallery->status ?? 1) == 1 ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', $gallery->status ?? 1) == 0 ? 'selected' : '' }}>Inactive
                                            </option>
                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mt-3">
                                        <label>Images <code>(multiple)</code></label>
                                        <input type="file" class="form-control" name="images[]" id="imageInput"
                                            accept="image/*" multiple>
                                        <div id="imagePreview" class="d-flex flex-wrap mt-2 gap-2">
                                            @if (isset($gallery) && $gallery->images)
                                                @foreach ($gallery->images as $img)
                                                    <img src="/{{ $img }}"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;">
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 mt-3">
                                        <label>Videos <code>(multiple)</code></label>
                                        <input type="file" class="form-control" name="videos[]" id="videoInput"
                                            accept="video/*" multiple>
                                        <div id="videoPreview" class="d-flex flex-wrap mt-2 gap-2">
                                            @if (isset($gallery) && $gallery->videos)
                                                @foreach ($gallery->videos as $vid)
                                                    <video src="/{{ $vid }}"
                                                        style="width: 80px; height: 80px; object-fit: cover; border-radius: 5px;"
                                                        muted></video>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JS for Image Preview with Remove Option --}}
    <script>
        document.getElementById('imageInput').addEventListener('change', function(event) {
            let files = Array.from(event.target.files);
            let preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            files.forEach((file, index) => {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let imgWrapper = document.createElement('div');
                    imgWrapper.style.position = 'relative';
                    imgWrapper.style.margin = '5px';

                    let img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.width = '70px';
                    img.style.height = '70px';
                    img.style.borderRadius = '50%';
                    img.style.objectFit = 'cover';
                    imgWrapper.appendChild(img);

                    // Remove button
                    let removeBtn = document.createElement('span');
                    removeBtn.innerHTML = '&times;';
                    removeBtn.style.position = 'absolute';
                    removeBtn.style.top = '0';
                    removeBtn.style.right = '0';
                    removeBtn.style.background = 'red';
                    removeBtn.style.color = 'white';
                    removeBtn.style.width = '20px';
                    removeBtn.style.height = '20px';
                    removeBtn.style.display = 'flex';
                    removeBtn.style.justifyContent = 'center';
                    removeBtn.style.alignItems = 'center';
                    removeBtn.style.borderRadius = '50%';
                    removeBtn.style.cursor = 'pointer';
                    removeBtn.title = 'Remove Image';
                    removeBtn.onclick = function() {
                        files.splice(index, 1);
                        updateFileList(files);
                        imgWrapper.remove();
                    }

                    imgWrapper.appendChild(removeBtn);
                    preview.appendChild(imgWrapper);
                }
                reader.readAsDataURL(file);
            });

            function updateFileList(filesArray) {
                let dataTransfer = new DataTransfer();
                filesArray.forEach(file => dataTransfer.items.add(file));
                document.getElementById('imageInput').files = dataTransfer.files;
            }
        });
    </script>
@endsection
