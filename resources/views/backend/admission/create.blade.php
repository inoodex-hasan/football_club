@extends('backend.layouts.master')
@section('title', 'Admission')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Admission</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Admission</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.admission.index') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.admission.store') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <h5>Personal Information</h5>
                                <div class="row">
                                    {{-- title/event Name --}}
                                    <div class="form-group col-md-6">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ old('name') }}" placeholder="john Doe">
                                    </div>
                                    {{-- email --}}
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" placeholder="example@gmail.com">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone"
                                            value="{{ old('phone') }}" placeholder="+88-0123456xxx">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Age</label>
                                        <input type="age" class="form-control" name="age"
                                            value="{{ old('age') }}" placeholder="16">
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group col-md-6">
                                        <label>Payment Status</label>
                                        <select class="form-control" name="status">
                                            <option value="pending" selected>Pending</option>
                                            <option value="completed">Completed</option>
                                        </select>
                                    </div>

                                    {{-- profile image --}}
                                    <div class="form-group col-md-6">
                                        <label>Profile Image <code>(Single)</code></label>
                                        <input type="file" class="form-control" name="image" id="mainImageInput"
                                            accept="image/*">
                                        <div id="mainImagePreview" class="mt-3"></div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>NID / Birth Certificate Number <code>*</code></label>
                                        <input type="number" class="form-control" name="nid"
                                            value="{{ old('nid') }}" placeholder="15789354225xxxxx">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Address</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address') }}" placeholder="mirpur-10">
                                    </div>

                                </div>
                                <h5 class="mb-2">Training Package</h5>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Training Package</label>
                                        <select class="form-control" name="training_package_id">
                                            @foreach ($trainingPackages as $training_package)
                                                <option value="{{ $training_package->id }}">{{ $training_package->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Order Status</label>
                                        <select class="form-control" name="order_status">
                                            <option value="pending" selected>Pending</option>
                                            <option value="processing" selected>Processing</option>
                                            <option value="completed">Completed</option>
                                            <option value="cancelled">Cancelled</option>
                                        </select>
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
