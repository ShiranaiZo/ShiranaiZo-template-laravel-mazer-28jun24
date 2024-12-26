@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Unit Category Details</h1>
        <p><strong>ID:</strong> {{ $unitCategory->id }}</p>
        <p><strong>Name:</strong> {{ $unitCategory->name }}</p>
        <p><strong>Is Active:</strong> {{ $unitCategory->is_active ? 'Yes' : 'No' }}</p>
        <a href="{{ route('unit-categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
