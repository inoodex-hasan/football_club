@extends('backend.layouts.master')
@section('title', 'Create Review')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add New Review</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">


                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Designation </label>
                                <input type="text" name="designation" class="form-control"
                                    value="{{ old('designation') }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Customer Photo</label>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Rating</label>
                                <select name="rating" class="form-control">
                                    <option value="5">5 Stars</option>
                                    <option value="4">4 Stars</option>
                                    <option value="3">3 Stars</option>
                                    <option value="2">2 Stars</option>
                                    <option value="1">1 Star</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" class="summernote" style="height: 100px;" required>{{ old('comment') }}</textarea>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Hidden</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Create Review</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
