@extends('backend.layouts.master')
@section('title', 'Create Terms & Condition')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Terms & Conditions</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Terms & Condition</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.terms_conditions.store') }}" method="POST">
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
                                    <label for="inputState">Status</label>
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Create</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
