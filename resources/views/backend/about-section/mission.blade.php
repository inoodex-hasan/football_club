@extends('backend.layouts.master')
@section('title', 'Our Mission')
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Mission</h1>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        
                        <form action="{{ route('admin.mission.update') }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            {{-- Title --}}
                            <div class="form-group mb-3">
                                <label>Title</label>
                                <input type="text"
                                       name="title"
                                       class="form-control"
                                       value="{{ old('title', @$content->title) }}">
                            </div>

                            {{-- Description --}}
                            <div class="form-group mb-3">
                                <label>Description</label>
                                <textarea name="description"
                                          class="summernote">
                                    {{ old('description', @$content->description) }}
                                </textarea>
                            </div>

                            {{-- Status --}}
                            <div class="form-group mb-3">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ @$content->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @!$content->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">
                                Update
                            </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
