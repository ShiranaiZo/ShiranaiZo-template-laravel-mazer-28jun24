@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $title }}</h4>
            </div>

            <div class="card-content">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route($routes['store']) }}" method="POST">
                        @csrf

                        <div class="form-body">
                            <div class="row">
                                @foreach ($elements as $element)
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label for="{{ $element['id'] }}" class="{{ $element['required'] }}">{{ $element['label'] }}</label>
                                            <x-form-element :$element/>
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route($routes['index']) }}" class="btn btn-light-secondary me-3 mb-1">Back</a>
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
