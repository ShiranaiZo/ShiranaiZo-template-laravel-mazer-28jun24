@extends('layouts.backend.app')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('age-categories.create') }}" class="btn btn-primary mb-3">Add</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>id</th>
                                <th>Name</th>
                                <th>Is Active</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($AgeCategories as $AgeCategory)
                                <tr>
                                    <td style="width: 75px">{{ $loop->iteration }}</td>
                                    <td>{{ $AgeCategory->id }}</td>
                                    <td>{{ $AgeCategory->name }}</td>
                                    <td>{{ $AgeCategory->is_active ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('age-categories.show', $AgeCategory) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('age-categories.edit', $AgeCategory) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('age-categories.destroy', $AgeCategory) }}" method="POST" style="display:inline;">
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
