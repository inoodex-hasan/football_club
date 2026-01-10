@extends('backend.layouts.master')
@section('title', 'Training Package')
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
                            <h4>Update Training Package</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.training-packages.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.training-packages.update', $trainingPackage->id) }}"
                                method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    {{-- Name --}}
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name', $trainingPackage->name) }}">
                                    </div>

                                    {{-- Duration --}}
                                    <div class="form-group col-md-6">
                                        <label>Duration</label>
                                        <input type="text" class="form-control" name="duration"
                                            value="{{ old('duration', $trainingPackage->duration) }}">
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group col-md-6">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price', $trainingPackage->price) }}">
                                    </div>

                                    <div class="form-group mb-3 col-12">
                                        <label>Description</label>
                                        <textarea name="description" class="summernote">
                                    {{ old('description', $trainingPackage->description) }}
                                </textarea>

                                    </div>
                                    {{-- Upload New Images --}}
                                    <div class="form-group col-md-12">
                                        <label>Upload New Images <code>(multiple)</code></label>
                                        <input type="file" class="form-control" name="images[]" id="imageInput" multiple>
                                    </div>

                                    {{-- Preview New Images --}}
                                    <div class="form-group col-md-12 mt-2">
                                        <div id="newImagePreview" class="d-flex flex-wrap"></div>
                                    </div>

                                    {{-- Existing Images --}}
                                    @if ($trainingPackage->images->count() > 0)
                                        <div class="form-group col-md-12 mt-3">
                                            <label>Existing Images</label>
                                            <div class="d-flex flex-wrap" id="existingImages">
                                                @foreach ($trainingPackage->images as $img)
                                                    <div class="existing-image-wrapper"
                                                        style="position:relative; margin:5px;"
                                                        data-id="{{ $img->id }}">
                                                        <img src="{{ asset($img->image) }}"
                                                            style="width:70px; height:70px; border-radius:50%; object-fit:cover;">
                                                        <span class="remove-existing"
                                                            style="position:absolute; top:0; right:0; background:red; color:white; width:20px; height:20px; display:flex; justify-content:center; align-items:center; border-radius:50%; cursor:pointer;"
                                                            title="Remove Image">&times;</span>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endif
                                    {{-- Meta Title --}}
                                    <div class="form-group col-md-12">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{ old('meta_title', $trainingPackage->meta_title) }}">
                                    </div>

                                    {{-- Meta Description --}}
                                    <div class="form-group col-md-12">
                                        <label>Meta Description</label>
                                        <textarea name="meta_description" class="form-control">{{ old('meta_description', $trainingPackage->meta_description) }}</textarea>
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ $trainingPackage->status ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ !$trainingPackage->status ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                    </div>

                                    {{-- Is Popular --}}
                                    <div class="form-group col-md-6">
                                        <label>Is Popular</label>
                                        <select class="form-control" name="is_popular">
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        </select>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- JS --}}
    <script>
        // Base URL for delete (absolute)
        let deleteUrl = "{{ url('admin/training-packages/image') }}";

        // Preview new selected images
        document.getElementById('imageInput').addEventListener('change', function(event) {
            let files = Array.from(event.target.files);
            let preview = document.getElementById('newImagePreview');
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

        // Remove existing images via Ajax
        document.querySelectorAll('.remove-existing').forEach(el => {
            el.addEventListener('click', function() {
                let wrapper = this.closest('.existing-image-wrapper');
                let imageId = wrapper.getAttribute('data-id');

                // if (confirm('Are you sure to delete this image?')) {
                fetch(deleteUrl + "/" + imageId, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success || data.status) {
                            wrapper.remove(); // DOM থেকে remove
                            toastr.success('Image deleted successfully!');
                        } else {
                            toastr.error('Something went wrong!');
                        }
                    })
                    .catch(err => {
                        console.log(err);
                        toastr.error('Ajax request failed!');
                    });
                // }
            });
        });
    </script>
@endsection
