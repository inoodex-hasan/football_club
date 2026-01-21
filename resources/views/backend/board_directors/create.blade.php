@extends('backend.layouts.master')

@section('title', 'Create Board Director Member')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Board Directors</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.board_directors.index') }}">Board Directors</a>
                </div>
                <div class="breadcrumb-item">Create</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create New Board Director Member</h4>
                            <div class="card-header-action">
                                <a href="{{ route('admin.board_directors.index') }}" class="btn btn-primary">
                                    Back to List
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.board_directors.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="form-group col-md-6">
                                        <label>Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            value="{{ old('name') }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Position <span class="text-danger">*</span></label>
                                        <input type="text" name="position"
                                            class="form-control @error('position') is-invalid @enderror"
                                            value="{{ old('position') }}" required>
                                        @error('position')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Board Director Image <span class="text-danger">*</span></label>
                                        <input type="file" name="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                            required>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status', '1') == '1' ? 'selected' : '' }}>
                                                Active
                                            </option>
                                            <option value="0" {{ old('status', '1') == '0' ? 'selected' : '' }}>
                                                Inactive
                                            </option>
                                        </select>
                                    </div>

                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Create Board Director
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
