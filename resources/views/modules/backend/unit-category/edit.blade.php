@extends('layouts.backend.app')
@section('title', 'Edit Unit-Category')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ "Edit Unit Category Form" }}</h4>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('unit.update', $data->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                {{-- @foreach ($elements as $element)
                                    <x-form-element :$element/>
                                @endforeach --}}
                                <div class="mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                </div>
                                <div class="input-group mb-3">
                                    <label for="selection-active">Status Aktif</label>
                                    <select class="custom-select w-100" id="selection-active" name="active_state">
                                        <option value="1" selected>Aktif</option>
                                        <option value="0">Non-Aktif</option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('unit.index') }}" class="btn btn-light-secondary me-3 mb-1">Back</a>
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

