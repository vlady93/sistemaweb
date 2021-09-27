@extends('layouts.admin')
@section('title','Registrar cliente')
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
            Registro de clientes
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de clientes</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    {!! Form::open(['route'=>'clients.store', 'method'=>'POST','files' => true]) !!}
                   

                    <div class="form-group">
                      <label for="name">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" required>
                      @error('name')
                      <small>*{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="ap_paterno">Apellido Paterno</label>
                            <input type="text" name="ap_paterno" id="ap_paterno" class="form-control" aria-describedby="helpId" required>
                            @error('name')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                          <div class="form-group col-6">
                            <label for="ap_materno">Apellido Materno</label>
                            <input type="text" name="ap_materno" id="ap_materno" class="form-control" aria-describedby="helpId" required>
                            @error('name')
                            <small>*{{$message}}</small>
                            @enderror
                          </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="ci">CI</label>
                            <input type="number" name="ci" id="ci" class="form-control" aria-describedby="helpId" required>
                            @error('ci')
                            <small>{{$message}}</small>
                        @enderror
                        </div>
                        <div class="form-group col-6 ">
                            <label for="genero">Género</label>
                            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
                            <select class="form-control" name="genero" id="genero"">
                                <option value="" disabled selected>Seleccione un Género</option>
                               
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                               
                            </select>
                        </div>
                    

                    <div class="form-group col-6">
                        <label for="nit">NIT</label>
                        <input type="number" name="nit" id="nit" class="form-control" aria-describedby="helpId" >
                    @error('nit')
                        <small>{{$message}}</small>
                    @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Teléfono / Celular</label>
                        <input type="number" name="phone" id="phone" class="form-control" aria-describedby="helpId" >
                    </div>
                    <div class="form-group col-12">
                        <label for="address">Dirección</label>
                        <input type="text" name="address" id="address" class="form-control" aria-describedby="helpId" >
                    </div>

                    <div class="form-group col-12">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" name="email" id="email" class="form-control" aria-describedby="helpId" >
                    </div>
                   
                   

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('clients.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$clients->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}
@endsection