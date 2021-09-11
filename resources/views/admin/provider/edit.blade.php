@extends('layouts.admin')
@section('title','Registrar proveedor')
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
            Registro de Proveedores
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('providers.index')}}">Proveedores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Proveedores</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Proveedores</h4>
                        
                    </div>
                    {!! Form::model($provider,['route'=>['providers.update',$provider],'method'=>'PUT']) !!}
                    
                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" class="form-control" name="name" id="name" value="{{$provider->name}}" placeholder="Nombre"required >
                    </div>

                    <div class="form-group">
                      <label for="email">Cooreo Electrónico</label>
                      <input type="email" class="form-control" name="email" id="email" value="{{$provider->email}}" placeholder="ejemplo@email.com"required>
                    </div>

                    <div class="form-group">
                        <label for="nit_number">Nit</label>
                        <input type="number" class="form-control" name="nit_number" id="nit_number" value="{{$provider->nit_number}}" placeholder="NIT"required>
                    </div>

                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$provider->address}}" placeholder="Dirección"required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Número de Contacto</label>
                        <input type="number" class="form-control" name="phone" id="phone" value="{{$provider->phone}}" placeholder="Teléfono/Celular"required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{route('providers.index')}}"class="btn btn-light mr-2">Cancelar</a>
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