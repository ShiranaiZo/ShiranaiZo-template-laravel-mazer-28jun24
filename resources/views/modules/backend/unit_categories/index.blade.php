@extends('layouts.backend.app')

@section('content')
    <div class="container">
        <h1>Unit Categories</h1>
        <a href="{{ route('unit-categories.create') }}" class="btn btn-primary mb-3">Add New Unit Category</a>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Is Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($unitCategories as $unitCategory)
                    <tr>
                        <td>{{ $unitCategory->id }}</td>
                        <td>{{ $unitCategory->name }}</td>
                        <td>{{ $unitCategory->is_active ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('unit-categories.show', $unitCategory) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('unit-categories.edit', $unitCategory) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('unit-categories.destroy', $unitCategory) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
