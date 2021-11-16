@extends('layouts.admin')
@section('title', 'Editar categoría')
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
                Editar Categoría
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">Categorías</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Categorías</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">


                        {!! Form::model($category, ['route' => ['categories.update', $category], 'method' => 'PUT']) !!}

                        <div class="form-group">
                            <label for="name" class="font-weight-bold">Nombre</label>
                            <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control"
                                required>
                            @error('name')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Descripción</label>
                            <textarea class="form-control" name="description" id="description"
                                rows="3">{{ $category->description }}</textarea>
                            @error('description')
                                <small class="text-danger">*{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-light mr-2">Cancelar</a>
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
