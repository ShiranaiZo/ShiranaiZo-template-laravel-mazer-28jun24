@extends('layouts.backend.app')

@section('title', 'Edit Age Category')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Edit Age Category</h4>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('age-categories.update', $ageCategory->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-group">
                                            <label for="name" class="required">Name</label>
                                            <input type="text" 
                                                id="name"
                                                class="form-control"
                                                name="name"
                                                placeholder="Name"
                                                value="{{ old('name', $ageCategory->name) }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-group">
                                            <label for="is_active" class="required">Status</label>
                                            <select name="is_active" id="is_active" class="form-select">
                                                <option value="1" {{ $ageCategory->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                                                <option value="0" {{ $ageCategory->is_active == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('age-categories.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a>
                                    <button type="submit" class="btn btn-primary mb-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
