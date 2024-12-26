@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Price Category Details</h1>
        <p><strong>ID:</strong> {{ $priceCategory->id }}</p>
        <p><strong>Name:</strong> {{ $priceCategory->name }}</p>
        <p><strong>Min:</strong> {{ $priceCategory->min }}</p>
        <p><strong>Max:</strong> {{ $priceCategory->max }}</p>
        <p><strong>Is Active:</strong> {{ $priceCategory->is_active ? 'Yes' : 'No' }}</p>
        <a href="{{ route('price-categories.index') }}" class="btn btn-secondary">Back</a>
    </div>
@endsection