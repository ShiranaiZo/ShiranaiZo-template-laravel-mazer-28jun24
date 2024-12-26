@extends('layouts.backend.app')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('price-categories.create') }}" class="btn btn-primary mb-3">Add</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Min</th>
                                <th>Max</th>
                                <th>Is Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($priceCategories as $priceCategory)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $priceCategory->id }}</td>
                                <td>{{ $priceCategory->name }}</td>
                                <td>{{ $priceCategory->min }}</td>
                                <td>{{ $priceCategory->max }}</td>
                                <td>{{ $priceCategory->is_active ? 'Yes' : 'No' }}</td>
                                <td>
                                    <a href="{{ route('price-categories.show', $priceCategory) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('price-categories.edit', $priceCategory->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('price-categories.destroy', $priceCategory->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
