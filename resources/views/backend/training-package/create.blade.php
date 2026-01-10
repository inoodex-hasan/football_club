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
                            <h4>Create Training Package</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.training-packages.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.training-packages.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- Package Name --}}
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}">
                                    </div>

                                    {{-- Price --}}
                                    <div class="form-group col-md-6">
                                        <label>Price</label>
                                        <input type="text" class="form-control" name="price"
                                            value="{{ old('price') }}">
                                    </div>

                                    {{-- Duration --}}
                                    <div class="form-group col-md-6">
                                        <label>Duration</label>
                                        <input type="text" class="form-control" name="duration"
                                            value="{{ old('duration') }}">
                                    </div>

                                    {{-- Multiple Images --}}
                                    <div class="form-group col-md-12">
                                        <label>Images <code>(Optional, multiple)</code></label>
                                        <input type="file" class="form-control" name="images[]" id="imageInput" multiple>
                                    </div>


                                    {{-- Preview Images --}}
                                    <div class="form-group col-md-12 mt-2">
                                        <div id="imagePreview" class="d-flex flex-wrap"></div>
                                    </div>

                                </div>
                                <div class="form-group mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="summernote">
                                    {{ old('description') }}
                                </textarea>

                                </div>
                                {{-- Meta Title --}}
                                <div class="form-group col-md-12">
                                    <label>Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title"
                                        value="{{ old('meta_title') }}">
                                </div>

                                {{-- Meta Description --}}
                                <div class="form-group col-md-12">
                                    <label>Meta Description </label>
                                    <textarea name="meta_description" class="form-control">{{ old('meta_description') }}</textarea>
                                </div>

                                {{-- Status --}}
                                <div class="form-group col-md-6">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="1" selected>Active</option>
                                        <option value="0">Inactive</option>
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
