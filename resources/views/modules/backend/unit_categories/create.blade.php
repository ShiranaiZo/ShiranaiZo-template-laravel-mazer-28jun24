@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Add Unit Category</h1>
        <form action="{{ route('unit-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="is_active">Is Active</label>
                <select id="is_active" name="is_active" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('unit-categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
