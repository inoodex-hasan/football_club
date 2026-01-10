@extends('backend.layouts.master')
@section('title', 'Edit Review')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Review</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $review->name }}"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control"
                                    value="{{ $review->designation }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Preview Photo</label><br>
                                <img src="{{ asset($review->image ?? 'N/A') }}" width="80"
                                    class="mb-2 rounded shadow-sm">
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Rating</label>
                                <select name="rating" class="form-control">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
                                            {{ $i }} Stars</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Comment</label>
                            <textarea name="comment" class="form-control" style="height: 100px;" required>{{ $review->comment }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $review->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$review->status ? 'selected' : '' }}>Hidden</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update Review</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
