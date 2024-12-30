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
              <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card 1</h5>
                    <p class="card-text">This is card number 1.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card 2</h5>
                    <p class="card-text">This is card number 2.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                  <img class="card-img-top" src="..." alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Card 3</h5>
                    <p class="card-text">This is card number 3.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                  </div>
                </div>
              </div>
              @foreach ($promo as $item)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="{{ URL('storage/chibidoctor1.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item->name }}</h5>
                        <p class="card-text">This is card number 3.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                </div>
              @endforeach
            </div>
        </div>
    </section>

    <x-modal.modal-delete/>
@endsection
