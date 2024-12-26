@extends('layouts.backend.app')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Promo</h4>
                <a href="{{ route('promos.index') }}" class="btn btn-secondary mb-3">Back to Promos</a>
            </div>

            <div class="card-body">
                <form action="{{ route('promos.update', $promo) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $promo->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" required>{{ old('description', $promo->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($promo->image)
                            <img src="{{ asset('storage/' . $promo->image) }}" alt="Promo Image" class="mt-2" style="width: 150px;">
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" id="published_at" name="published_at" value="{{ old('published_at', \Carbon\Carbon::parse($promo->published_at)->format('Y-m-d\TH:i')) }}">
                        @error('published_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="expired_at">Expired At</label>
                        <input type="datetime-local" class="form-control @error('expired_at') is-invalid @enderror" id="expired_at" name="expired_at" value="{{ old('expired_at', \Carbon\Carbon::parse($promo->expired_at)->format('Y-m-d\TH:i')) }}">
                        @error('expired_at')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $promo->price) }}">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="is_active">Is Active</label>
                        <select class="form-control @error('is_active') is-invalid @enderror" id="is_active" name="is_active" required>
                            <option value="1" {{ old('is_active', $promo->is_active) == 1 ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ old('is_active', $promo->is_active) == 0 ? 'selected' : '' }}>No</option>
                        </select>
                        @error('is_active')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Promo</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
