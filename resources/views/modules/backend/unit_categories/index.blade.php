@extends('layouts.backend.app')

{{-- @section('title', $title)

@include('assets.table.datatable') --}}

@section('content')
    <section class="section">
        <div class="card">
            {{-- <div class="card-header">
                <x-button.button-add
                    :route="route($routes['form'], 'add')"
                />
            </div> --}}
            <div class="card-header">
                <a href="{{ route('unit-categories.create') }}" class="btn btn-primary mb-3">Add</a>
                {{-- @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif --}}
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
                            @foreach ($unitCategories as $unitCategory)
                                <tr>
                                    <td style="width: 75px">{{ $loop->iteration }}</td>
                                    <td>{{ $unitCategory->id }}</td>
                                    <td>{{ $unitCategory->name }}</td>
                                    <td>{{ $unitCategory->is_active ? 'Yes' : 'No' }}</td>
                                    <td>
                                        <a href="{{ route('unit-categories.show', $unitCategory) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('unit-categories.edit', $unitCategory) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('unit-categories.destroy', $unitCategory) }}" method="POST" style="display:inline;">
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
