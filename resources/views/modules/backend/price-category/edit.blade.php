@extends('layouts.backend.app')

@section('title', 'Add Unit Category Form')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ 'Add Unit Category Form' }}</h4>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('price.update', $data -> id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $data -> name  }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Min Value</label>
                                    <input type="number" name="min" class="form-control" value="{{ $data -> min }}">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Max Value</label>
                                    <input type="number" name="max" class="form-control" value="{{ $data -> max }}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Status Aktif</label>
                                    <select class="custom-select w-100" id="selection-active" name="active_state">
                                        <option value="1" {{ $data->is_active == 1 ? 'selected' : '' }}>Aktif</option>
                                        <option value="0" {{ $data->is_active == 0 ? 'selected' : '' }}>Non-Aktif</option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    {{-- <a href="{{ route('unit.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a> --}}
                                    <a href="{{ route('price.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a>
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
