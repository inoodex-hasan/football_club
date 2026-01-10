@extends('backend.layouts.master')
@section('title', 'Create Privacy Policy')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Privacy Policy</h1>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Create Privacy Policy</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.privacy_policies.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </section>
@endsection
