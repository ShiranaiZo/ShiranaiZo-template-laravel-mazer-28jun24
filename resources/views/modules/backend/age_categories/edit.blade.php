@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Edit Age Category</h1>
        <form action="{{ route('age-categories.update', $AgeCategory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $AgeCategory->name }}" required>
            </div>
            <div class="form-group">
                <label for="is_active">Is Active</label>
                <select id="is_active" name="is_active" class="form-control" required>
                    <option value="1" {{ $AgeCategory->is_active ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$AgeCategory->is_active ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('age-categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
