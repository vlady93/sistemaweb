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
                    
                  
                    {!! Form::open(['route'=>'providers.store','method'=>'POST']) !!}
                    
                    <div class="form-group">
                      <label for="name"> <strong>Nombre</strong> </label>
                      <input type="text" class="form-control" name="name" id="name"  placeholder="Nombre"required>
                      @error('name')
                        <small>*{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="email"><strong>Correo Electrónico</strong></label>
                      <input type="email" class="form-control" name="email" id="email"  placeholder="ejemplo@email.com"required>
                      @error('email')
                        <small>*{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="nit_number"><strong>NIT</strong></label>
                        <input type="number" class="form-control" name="nit_number" id="nit_number" placeholder="NIT"required>
                        @error('nit_number')
                             <small>*{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address"><strong>Dirección</strong></label>
                        <input type="text" class="form-control" name="address" id="address"  placeholder="Dirección"required>
                        @error('address')
                            <small>*{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone"><strong>Número de Contacto</strong></label>
                        <input type="number" class="form-control" name="phone" id="phone" placeholder="Teléfono/Celular"required>
                    @error('phone')
                        <small>*{{$message}}</small>
                    @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
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