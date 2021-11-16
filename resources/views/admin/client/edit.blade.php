@extends('layouts.admin')
@section('title', 'Editar cliente')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                Edición de clientes
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edición de cliente</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Edición de cliente</h4>
                        </div>

                        {!! Form::model($client, ['route' => ['clients.update', $client], 'method' => 'PUT', 'files' => true]) !!}


                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control"
                                aria-describedby="helpId" required>
                            @error('name')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ap_paterno">Apellido Paterno</label>
                            <input type="text" name="ap_paterno" id="ap_paterno" value="{{ $client->ap_paterno }}"
                                class="form-control" aria-describedby="helpId" required>
                            @error('ap_paterno')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ap_materno">Apellido Materno</label>
                            <input type="text" name="ap_materno" id="ap_materno" value="{{ $client->ap_materno }}"
                                class="form-control" aria-describedby="helpId" required>
                            @error('ap_materno')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="genero" class="font-weight-bold">Genero</label>
                            <select class="form-control" name="genero" id="genero">
                                <option value="{{ $client->genero }}">{{ $client->genero }}</option>
                                @if ($client->genero == '')
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                @elseif($client->genero=='Femenino')
                                    <option value="Masculino">Masculino</option>
                                @else
                                    <option value="Femenino">Femenino</option>
                                @endif

                            </select>
                            @error('genero')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="ci">CI</label>
                            <input type="number" name="ci" id="ci" value="{{ $client->ci }}" class="form-control"
                                aria-describedby="helpId" required>
                            @error('ci')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nit">NIT</label>
                            <input type="number" name="nit" id="nit" value="{{ $client->nit }}" class="form-control"
                                aria-describedby="helpId">
                            @error('nit')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" value="{{ $client->address }}"
                                class="form-control" aria-describedby="helpId">
                            @error('address')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Teléfono / Celular</label>
                            <input type="number" name="phone" id="phone" value="{{ $client->phone }}"
                                class="form-control" aria-describedby="helpId">
                            @error('phone')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="email" name="email" id="email" value="{{ $client->email }}" class="form-control"
                                aria-describedby="helpId">
                            @error('email')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                        <a href="{{ route('clients.index') }}" class="btn btn-light">
                            Cancelar
                        </a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/dropify.js') !!}
@endsection
