@extends('backend.layouts.master')
@section('title', 'Edit Admission')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Edit Admission</h1>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Admission</h4>
                        <div class="card-header-action">
                            <a href="{{ route('admin.admission.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.admission.update', $admission->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <h5>Personal Information</h5>
                            <div class="row">
                                {{-- Full Name --}}
                                <div class="form-group col-md-6">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $admission->name) }}" placeholder="John Doe">
                                </div>
                                {{-- Email --}}
                                <div class="form-group col-md-6">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $admission->email) }}" placeholder="example@gmail.com">
                                </div>
                                {{-- Phone --}}
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $admission->phone) }}" placeholder="+88-0123456xxx">
                                </div>
                                {{-- Age --}}
                                <div class="form-group col-md-6">
                                    <label>Age</label>
                                    <input type="number" class="form-control" name="age" value="{{ old('age', $admission->age) }}" placeholder="16">
                                </div>
                                {{-- Payment Status --}}
                                <div class="form-group col-md-6">
                                    <label>Payment Status</label>
                                    <select class="form-control" name="status">
                                        <option value="pending" {{ $admission->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="completed" {{ $admission->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                    </select>
                                </div>
                                {{-- Profile Image --}}
                                <div class="form-group col-md-6">
                                    <label>Profile Image <code>(Single)</code></label>
                                    <input type="file" class="form-control" name="image" id="mainImageInput" accept="image/*">
                                    <div id="mainImagePreview" class="mt-3">
                                        @if($admission->image)
                                            <div style="position:relative; display:inline-block; margin:5px;">
                                                <img src="{{ asset($admission->image) }}" style="width:120px;height:120px;object-fit:cover;border-radius:8px;">
                                                <span id="removeOldImage" style="position:absolute; top:-8px; right:-8px; background:red; color:white; width:24px; height:24px; display:flex; justify-content:center; align-items:center; border-radius:50%; cursor:pointer;">&times;</span>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                {{-- NID / Address --}}
                                <div class="form-group col-md-12">
                                    <label>NID / Birth Certificate Number <code>*</code></label>
                                    <input type="text" class="form-control" name="nid" value="{{ old('nid', $admission->nid) }}" placeholder="15789354225xxxxx">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address" value="{{ old('address', $admission->address) }}" placeholder="mirpur-10">
                                </div>
                            </div>

                            <h5 class="mb-2">Training Package</h5>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Training Package</label>
                                    <select class="form-control" name="training_package_id">
                                        @foreach ($trainingPackages as $training_package)
                                            <option value="{{ $training_package->id }}" {{ $training_package->id == $admission->training_package_id ? 'selected' : '' }}>
                                                {{ $training_package->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Order Status</label>
                                    <select class="form-control" name="order_status">
                                        <option value="pending" {{ $admission->order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="processing" {{ $admission->order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="completed" {{ $admission->order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                        <option value="cancelled" {{ $admission->order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
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

<script>
    // Remove old image
    const removeOldBtn = document.getElementById('removeOldImage');
    if(removeOldBtn){
        removeOldBtn.addEventListener('click', function(){
            document.getElementById('mainImagePreview').innerHTML = '';
            document.getElementById('mainImageInput').value = '';
        });
    }

    // Main Image Preview
    document.getElementById('mainImageInput').addEventListener('change', function(event){
        const file = event.target.files[0];
        const preview = document.getElementById('mainImagePreview');
        preview.innerHTML = '';
        if(file){
            const reader = new FileReader();
            reader.onload = function(e){
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
                removeBtn.onclick = function(){
                    preview.innerHTML = '';
                    document.getElementById('mainImageInput').value = '';
                };
                imgWrapper.appendChild(removeBtn);
                preview.appendChild(imgWrapper);
            };
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection