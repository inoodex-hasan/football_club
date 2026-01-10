@extends('backend.layouts.master')
@section('title', 'Profile')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></div>
                <div class="breadcrumb-item">Profile</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form action="{{ route('admin.profile.update') }}" method="post" class="needs-validation"
                            novalidate="" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Update Profile</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name"
                                            value="{{ Auth::user()->name }}">
                                        <div class="invalid-feedback">
                                            Please fill in the name
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Email</label>
                                        <input type="text" class="form-control" name="email"
                                            value="{{ Auth::user()->email }}">
                                        <div class="invalid-feedback">
                                            Please fill in the email
                                        </div>
                                    </div>
                                </div>

                                <!-- Image Upload and Preview Side by Side -->
                                <div class="row align-items-center">
                                    <!-- File Input (Left Side) -->
                                    <div class="form-group col-md-6 col-12">
                                        <label>Image</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            accept="image/*">
                                        <div class="invalid-feedback">
                                            Please select a valid image
                                        </div>
                                    </div>

                                    <!-- Preview (Right Side) -->
                                    <div class="form-group col-md-6 col-12 text-center text-md-left">
                                        <label>Preview</label><br>
                                        <img id="preview"
                                            src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('/uploads/default.jpg') }}"
                                            alt="Image preview" class="img-thumbnail"
                                            style="max-width: 250px; max-height: 250px; object-fit: cover;">
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Password Update Section (unchanged) -->
                <div class="col-12 col-md-12">
                    <div class="card">
                        <form action="{{ route('admin.password.update') }}" method="post" class="needs-validation"
                            novalidate="">
                            @csrf
                            <div class="card-header">
                                <h4>Update Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <!-- Current Password -->
                                    <div class="form-group col-4">
                                        <label>Current Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="current_password"
                                                id="current_password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"
                                                    onclick="togglePassword('current_password', this)">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the current password
                                        </div>
                                    </div>

                                    <!-- New Password -->
                                    <div class="form-group col-4">
                                        <label>New Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" id="new_password"
                                                required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"
                                                    onclick="togglePassword('new_password', this)">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please fill in the new password
                                        </div>
                                    </div>

                                    <!-- Confirm Password -->
                                    <div class="form-group col-4">
                                        <label>Confirm Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password_confirmation"
                                                id="confirm_password" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"
                                                    onclick="togglePassword('confirm_password', this)">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please confirm the password
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Live Image Preview -->
    <script>
        document.getElementById('image').addEventListener('change', function(e) {
            const preview = document.getElementById('preview');
            const file = e.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                // Revert to original image if selection is cancelled
                preview.src =
                    "{{ Auth::user()->image ? asset(Auth::user()->image) : asset('/uploads/default.jpg') }}";
            }
        });
    </script>
    <script>
        function togglePassword(fieldId, icon) {
            const field = document.getElementById(fieldId);
            if (field.type === "password") {
                field.type = "text";
                icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                field.type = "password";
                icon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
@endsection
