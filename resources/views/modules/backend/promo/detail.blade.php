@extends('layouts.backend.app')
@section('title', 'Price-category')
@include('assets.table.datatable')

@section('content')
    <section class="section">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-3">
                        <img class="card-img-top" src="{{ $promo->image }}" alt="Card image cap" width="100px" height="300px">
                    </div>
                    <div class="col-5">
                        <h4 class="card-title">{{ $promo->name }}</h4>
                        <p class="card-text">{{ $promo->description }}</p>
                        <hr>
                        <p><b>Published At : </b>{{ $promo->published_at }}</p>
                        <p><b>Expired At : </b>{{ $promo->expired_at }}</p>
                    </div>
                    <div class="col-4">
                        <p><b>Price : </b>Rp {{ $promo->price }}</p>
                        <p><b>Gender : </b></p>
                        @php
                            $genders = json_decode($promo['genders'], true);
                        @endphp
                        <ul>
                            @foreach ( $genders as $gender )
                                <li class="card-title">{{ $gender }}</li>
                            @endforeach
                        </ul>
                        <p><b>Unit Category : </b>{{ $unitCategory->name }}</p>
                        <p><b>Price Category : </b>{{ $priceCategory->name }}</p>
                        <p><b>Age Categories : </b>
                            <ul>
                                @foreach ( $ageCategories as $ageCategory )
                                <li class="card-title">{{ $ageCategory->name }}</li>
                                @endforeach
                            </ul>
                        </p>
                        <a href="{{ route('promo.index') }}" class="btn btn-light-secondary">Back</a>
                        <a href="{{ route('promo.edit', $promo->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn icon icon-left btn-danger" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Delete" data-bs-toggle="modal" data-bs-target="#modal_delete" onclick="modalDelete('{{ route('promo.delete', $promo->id) }}')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-modal.modal-delete/>
@endsection
