@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Edit Price Category</h1>
        <form action="{{ route('price-categories.update', $PriceCategory) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $PriceCategory->name }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="min">Min</label>
                <input type="number" name="min" id="min" class="form-control" value="{{ $PriceCategory->min }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="max">Max</label>
                <input type="number" name="max" id="max" class="form-control" value="{{ $PriceCategory->max }}" required>
            </div>
            <div class="form-group mb-3">
                <label for="is_active">Is Active</label>
                <select name="is_active" id="is_active" class="form-control">
                    <option value="1" {{ $PriceCategory->is_active ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$PriceCategory->is_active ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('price-categories.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
