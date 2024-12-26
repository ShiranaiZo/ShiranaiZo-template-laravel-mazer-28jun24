@extends('layouts.backend.app')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Promos List</h4>
                <a href="{{ route('promos.create') }}" class="btn btn-primary mb-3">Add New Promo</a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>Is Active</th>
                                <th>Published At</th>
                                <th>Expired At</th>
                                <th>Price</th>
                                <th>Show Price</th>
                                <th>Genders</th>
                                <th>Age Category</th>
                                <th>Price Category</th>
                                <th>Unit Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($promos as $promo)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $promo->id }}</td>
                                    <td>{{ $promo->name }}</td>
                                    <td>
                                        @if ($promo->image)
                                            <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->name }}" 
                                                 style="width: 75px; height: 75px; object-fit: cover;">
                                        @else
                                            <span class="text-muted">No Image</span>
                                        @endif
                                    </td>
                                    <td>{{ $promo->description }}</td>
                                    <td>{{ $promo->is_active ? 'Yes' : 'No' }}</td>
                                    <td>{{ $promo->published_at ? \Carbon\Carbon::parse($promo->published_at)->format('Y/m/d H:i') : '-' }}</td>
                                    <td>{{ $promo->expired_at ? \Carbon\Carbon::parse($promo->expired_at)->format('Y/m/d H:i') : '-' }}</td>

                                    <td>{{ $promo->price ? 'Rp ' . number_format($promo->price, 0, ',', '.') : '-' }}</td>
                                    <td>{{ $promo->show_price ? 'Yes' : 'No' }}</td>
                                    <td>
                                        @if ($promo->genders)
                                            {{ implode(', ', json_decode($promo->genders, true)) }}
                                        @else
                                            <span class="text-muted">N/A</span>
                                        @endif
                                    </td>
                                    <td>{{ $promo->ageCategory->name ?? '-' }}</td>
                                    <td>{{ $promo->priceCategory->name ?? '-' }}</td>
                                    <td>{{ $promo->unitCategory->name ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('promos.show', $promo) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('promos.edit', $promo) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('promos.destroy', $promo) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this promo?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="17" class="text-center">No promos available.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
