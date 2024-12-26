@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Add price Category</h1>
        <form action="{{ route('price-categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="min">Min</label>
                <input type="number" name="min" id="min" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="max">Max</label>
                <input type="number" name="max" id="max" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="is_active">Is Active</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('price-categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
