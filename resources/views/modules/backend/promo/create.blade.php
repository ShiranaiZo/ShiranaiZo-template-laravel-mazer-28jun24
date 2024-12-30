@extends('layouts.backend.app')
{{-- @dd($ageCategories, $unitCategories, $priceCategories) --}}
@section('title', 'Add Promo Form')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ 'Add Promo Form' }}</h4>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('promo.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>

                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" class="form-control" rows="5" placeholder="Enter the description here..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Price</label>
                                    <input type="number" name="price" class="form-control" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">expired_date</label>
                                    <input type="datetime-local" name="expired_date" class="form-control" value="">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">post image</label>
                                    <input class="form-control" type="file" id="image" name="image">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Select Gender</label>
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="option1" name="gender[]" value="laki-laki">
                                            <label class="form-check-label" for="option1">Laki - Laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="option2" name="gender[]" value="perempuan">
                                            <label class="form-check-label" for="option2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Select Price Category</label>
                                    <select class="custom-select w-100" id="selection-active" name="price_category">
                                        <option value="" selected>Silakan pilih</option>
                                        @foreach ($priceCategories as $priceCategory)
                                            <option value="{{ $priceCategory->id }}">{{ $priceCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Select Unit Category</label>
                                    <select class="custom-select w-100" id="selection-active" name="unit_category">
                                        <option value="" selected>Silakan pilih</option>
                                        @foreach ($unitCategories as $unitCategory)
                                            <option value="{{ $unitCategory->id }}">{{ $unitCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3" style="display: flex;
                                                                    flex-direction: column;
                                                                    align-items: flex-start;">
                                    <label for="selection-active">Select Age Category</label>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                            Silakan pilih
                                        </button>
                                        <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                                            @foreach ($ageCategories as $ageCategory)
                                                <li>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="{{ $ageCategory->id }}" id="ageCategory{{ $ageCategory->id }}" name="age_categories[]">
                                                        <label class="form-check-label" for="ageCategory{{ $ageCategory->id }}">{{ $ageCategory->name }}</label>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Status Aktif</label>
                                    <select class="custom-select w-100" id="selection-active" name="active_state">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Non-Aktif</option>
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Show Price</label>
                                    <select class="custom-select w-100" id="selection-active" name="show_price">
                                        <option value="1" selected>Show</option>
                                        <option value="0">Don't Show</option>
                                    </select>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    {{-- <a href="{{ route('unit.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a> --}}
                                    <a href="{{ route('promo.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a>
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
