@extends('layouts.admin')
@section('title', 'Gestión de clientes')
@section('styles')
    <style type="text/css">
        .unstyled-button {
            border: none;
            padding: 0;
            background: none;
        }

    </style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Lista de Clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5>Clientes</h5>
                            <a class="nav-link" href="{{ route('clients.create') }}">
                                <span class="btn btn-success btn-sm "> Nuevo Cliente</span>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th hidden>Id</th>
                                        <th>Nombre</th>
                                        <th>CI</th>
                                        <th>Teléfono / Celular</th>
                                        <th>Correo Electrónico</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clients as $client)
                                        <tr>
                                            <th scope="row" hidden>{{ $client->id }}</th>
                                            <td>
                                                <a href="{{ route('clients.show', $client) }}">{{ $client->name }}
                                                    {{ $client->ap_paterno }} {{ $client->ap_materno }}</a>
                                            </td>
                                            <td>{{ $client->ci }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td style="width: 50px;">
                                                {!! Form::open(['route' => ['clients.destroy', $client], 'method' => 'DELETE']) !!}

                                                <a class="jsgrid-button jsgrid-edit-button"
                                                    href="{{ route('clients.edit', $client) }}" title="Editar">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <button class="jsgrid-button jsgrid-delete-button unstyled-button"
                                                    type="submit" title="Eliminar">
                                                    <i class="far fa-trash-alt"></i>
                                                </button>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
