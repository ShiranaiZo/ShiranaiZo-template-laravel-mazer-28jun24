@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Age Category Details</h1>
        <p><strong>ID:</strong> {{ $AgeCategory->id }}</p>
        <p><strong>Name:</strong> {{ $AgeCategory->name }}</p>
        <p><strong>Is Active:</strong> {{ $AgeCategory->is_active ? 'Yes' : 'No' }}</p>
        <a href="{{ route('age-categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection
