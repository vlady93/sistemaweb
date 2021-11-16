@extends('layouts.admin')
@section('title','Registrar producto')
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
            Registro de Materiales
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Materiales</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de Material</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
        
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
                   

                    <div class="form-group">
                      <label for="name" class="font-weight-bold">Nombre</label>
                      <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" required>
                      @error('name')
                        <small class="text-danger">*{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="caract" class="font-weight-bold">Caracteristica</label>
                        <input type="text" name="caract" id="caract" class="form-control" aria-describedby="helpId" required>
                        @error('caract')
                          <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
    
                    <div class="form-group">
                        <label for="sell_price" class="font-weight-bold">Precio de venta</label>
                        <input type="number" name="sell_price" id="sell_price" class="form-control" aria-describedby="helpId" required>
                        @error('sell_price')
                          <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label for="category_id" class="font-weight-bold">Categoría</label>
                      <select class="form-control" name="category_id" id="category_id">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                        <small class="text-danger">*{{$message}}</small>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="provider_id"class="font-weight-bold">Proveedor</label>
                        <select class="form-control" name="provider_id" id="provider_id">
                          @foreach ($providers as $provider)
                          <option value="{{$provider->id}}">{{$provider->name}}</option>
                          @endforeach
                        </select>
                        @error('provider_id')
                            <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rfid"class="font-weight-bold">RFID</label>
                        <input type="text" name="rfid" id="rfid" class="form-control" aria-describedby="helpId" required>
                        @error('rfid')
                          <small class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>

                    <div class="card-body">
                        <h5 class="card-title d-flex font-weight-bold">Imagen de material</h5>
                        <input type="file"  name="picture" id="picture" class="dropify" />
                        @error('picture')
                            <smal class="text-danger">*{{$message}}</small>
                        @enderror
                    </div>

                   

                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     <a href="{{route('products.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
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