@extends('layouts.admin')
@section('title', 'Editar ciudad')
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
                Editar Ciudad
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cities.index') }}">Ciudades</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Ciudades</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        {!! Form::model($city, ['route' => ['cities.update', $city], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $city->name }}" class="form-control"
                                placeholder="Nombre" required>
                            @error('name')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Descripción</label>
                            <textarea class="form-control" name="description" id="description"
                                rows="3">{{ $city->description }}</textarea>
                            @error('description')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('cities.index') }}" class="btn btn-light mr-2">Cancelar</a>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
