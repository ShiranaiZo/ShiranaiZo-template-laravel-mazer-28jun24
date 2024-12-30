@extends('layouts.backend.app')

@section('title', 'Price-category')

@include('assets.table.datatable')

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Promo Menu</h4>
                <a href="{{ route('promo.create') }}" class="btn icon icon-left btn-success" data-bs-toggle-tooltip="tooltip" data-bs-placement="right" title="Add">
                    <i class="bi bi-plus-circle"> Add Promo</i>
                </a>
            </div>
        </div>
        <div class="container">
            <div class="row">
              @foreach ($promo as $item)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap" width="100px" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <hr>
                        <div class="col">Harga : Rp {{ $item->price }}</div>
                        <div class="col">Status Aktif : {{ $item->is_active == 1 ? 'Aktif' : 'Tidak Aktif'}}</div>
                        <div class="col">Expired : {{ $item->expired_at }}</div>
                        <hr>
                        <a href="{{ route('promo.detail', $item->id) }}" class="btn btn-primary">Look Detail</a>
                        <a href="{{ route('promo.edit', $item->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn icon icon-left btn-danger" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Delete" data-bs-toggle="modal" data-bs-target="#modal_delete" onclick="modalDelete('{{ route('promo.delete', $item->id) }}')">
                            <i class="bi bi-trash"></i>
                        </a>
                    </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

    <x-modal.modal-delete/>
@endsection
