@extends('layouts.backend.app')
@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Create Promo</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('promos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Hidden fields for created_by_id and updated_by_id -->
                    <input type="hidden" name="created_by_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="updated_by_id" value="{{ Auth::user()->id }}">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="is_active">Is Active</label>
                        <select name="is_active" id="is_active" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="published_at">Published At</label>
                        <input type="datetime-local" class="form-control" id="published_at" name="published_at" >
                    </div>

                    <div class="form-group">
                        <label for="expired_at">Expired At</label>
                        <input type="datetime-local" class="form-control" id="expired_at" name="expired_at">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price">
                    </div>

                    <div class="form-group">
                        <label for="show_price">Show Price</label>
                        <select name="show_price" id="show_price" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="genders">Gender</label>
                        <div>
                            <label>
                                <input type="checkbox" name="genders[]" value="male"> Male
                            </label>
                            <label>
                                <input type="checkbox" name="genders[]" value="female"> Female
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="age_category_id">Age Category</label>
                        <select class="form-control" id="age_category_id" name="age_category_id">
                            @foreach ($ageCategories as $category)
                                <option value="{{ $category->id }}" {{ old('age_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_category_id">Price Category</label>
                        <select class="form-control" id="price_category_id" name="price_category_id">
                            @foreach ($priceCategories as $category)
                                <option value="{{ $category->id }}" {{ old('price_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="unit_category_id">Unit Category</label>
                        <select class="form-control" id="unit_category_id" name="unit_category_id">
                            @foreach ($unitCategories as $category)
                                <option value="{{ $category->id }}" {{ old('unit_category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('promos.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </section>
@endsection
