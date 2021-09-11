@extends('layouts.admin')
@section('title','Registrar categoría')
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
            Registro de Ciudades
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('cities.index')}}">Ciudades</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Ciudades</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        
                    </div>
                    {!! Form::open(['route'=>'cities.store','method'=>'POST']) !!}
                    @include('admin.city._form')
                    
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{route('categories.index')}}"class="btn btn-light mr-2">Cancelar</a>
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