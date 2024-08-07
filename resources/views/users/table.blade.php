@extends('layouts.app')

@section('title', $title)

@section('css')
    @include('layouts.datatable.css-datatable')
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route($routes['form'], 'add') }}" class="btn icon icon-left btn-success" data-bs-toggle-tooltip="tooltip" data-bs-placement="right" title="Add">
                    <i class="bi bi-plus-circle"></i>
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($columns as $data)
                                <tr>
                                    <td style="width: 75px">{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td style="width: 100px">
                                        <div class="d-flex justify-content-between">
                                            <a href="{{ route($routes['form'], 'edit/'.$data->id) }}" class="btn icon icon-left btn-warning" data-bs-toggle-tooltip="tooltip" data-bs-placement="left" title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <a href="#" class="btn icon icon-left btn-danger {{ \Auth::user()->id == $data->id ? 'disabled' : '' }}" data-bs-toggle-tooltip="tooltip" data-bs-placement="top" title="Delete" data-bs-toggle="modal" data-bs-target="#modal_delete" onclick="modalDelete('{{ route($routes['action'], 'delete/'.$data->id) }}')">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('layouts.modal.modal-delete')
@endsection

@section('js')
    @include('layouts.datatable.js-datatable')
@endsection

