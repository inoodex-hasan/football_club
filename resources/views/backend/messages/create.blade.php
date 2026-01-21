@extends('backend.layouts.master')

@section('title', 'Create Message')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Messages</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="{{ route('admin.message.index') }}">Messages</a>
                </div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Message</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.message.index') }}" class="btn btn-primary">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.message.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    {{-- Name --}}
                                    <div class="form-group col-md-6">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Designation --}}
                                    <div class="form-group col-md-6">
                                        <label>Designation<span class="text-danger">*</span></label>
                                        <input type="text" name="designation" value="{{ old('designation') }}"
                                            class="form-control @error('designation') is-invalid @enderror">
                                        @error('designation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Photo --}}
                                    <div class="form-group col-md-12">
                                        <label>Photo<span class="text-danger">*</span></label>
                                        <input type="file" name="photo"
                                            class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                                        @error('photo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Message --}}
                                    <div class="form-group col-md-12">
                                        <label>Message <span class="text-danger">*</span></label>
                                        <textarea name="message" rows="4" class="summernote @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Status --}}
                                    <div class="form-group col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                                            <option value="1"
                                                {{ old('status', isset($message) ? $message->status : 1) == 1 ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0"
                                                {{ old('status', isset($message) ? $message->status : 1) == 0 ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                        @error('status')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Create Message
                                    </button>
                                    <a href="{{ route('admin.message.index') }}" class="btn btn-secondary btn-lg ml-2">
                                        Cancel
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
