@extends('backend.layouts.master')

@section('title', 'Edit Team Member')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Board Directors</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.board_directors.index') }}">Board Directors</a></div>
                <div class="breadcrumb-item">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Board Director Member: {{ $boardDirector->name }}</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.board_directors.index') }}" class="btn btn-primary">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.board_directors.update', $boardDirector) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name', $boardDirector->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Position <span class="text-danger">*</span></label>
                                        <input type="text" name="position"
                                            class="form-control @error('position') is-invalid @enderror"
                                            value="{{ old('position', $boardDirector->position) }}" required>
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Board Director Image <small>(Leave blank to keep current)</small></label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*">

                                        {{-- Current Image Preview --}}
                                        <div class="mt-2">
                                            <img src="{{ asset($boardDirector->photo) }}" alt="Current Image"
                                                style="width: 200px; height: auto; border: 1px solid #ddd; padding: 5px;">
                                        </div>

                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1"
                                                {{ (old('status') !== null ? old('status') : $boardDirector->status) == '1' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0"
                                                {{ (old('status') !== null ? old('status') : $boardDirector->status) == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Update Board Director
                                    </button>
                                    <a href="{{ route('admin.board_directors.index') }}"
                                        class="btn btn-secondary btn-lg ml-2">
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
