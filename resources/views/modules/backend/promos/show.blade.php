@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Promo Details</h4>
                <a href="{{ route('promos.index') }}" class="btn btn-secondary mb-3">Back to Promos</a>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <p>{{ $promo->name }}</p>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <p>{{ $promo->description }}</p>
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    @if ($promo->image)
                        <img src="{{ asset('storage/' . $promo->image) }}" alt="{{ $promo->name }}" style="width: 150px;">
                    @else
                        <p>No Image</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <p>{{ $promo->published_at ? \Carbon\Carbon::parse($promo->published_at)->format('Y/m/d H:i') : 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="expired_at">Expired At</label>
                    <p>{{ $promo->expired_at ? \Carbon\Carbon::parse($promo->expired_at)->format('Y/m/d H:i') : 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="price">Price</label>
                    <p>{{ $promo->price ? 'Rp ' . number_format($promo->price, 0, ',', '.') : 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="is_active">Is Active</label>
                    <p>{{ $promo->is_active ? 'Yes' : 'No' }}</p>
                </div>

                <div class="form-group">
                    <label for="genders">Genders</label>
                    <p>{{ $promo->genders ? implode(', ', json_decode($promo->genders, true)) : 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="ageCategory">Age Category</label>
                    <p>{{ $promo->ageCategory->name ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="priceCategory">Price Category</label>
                    <p>{{ $promo->priceCategory->name ?? 'N/A' }}</p>
                </div>

                <div class="form-group">
                    <label for="unitCategory">Unit Category</label>
                    <p>{{ $promo->unitCategory->name ?? 'N/A' }}</p>
                </div>
            </div>
        </div>
    </section>
@endsection
