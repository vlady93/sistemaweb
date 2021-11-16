@extends('layouts.admin')
@section('title','Gestión de ciudades')
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
            Ciudades
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ciudades</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mr-7">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5> Lista de Ciudades</h5> 
                            <a class="nav-link" href="{{route('cities.create')}}">
                                <span class="btn btn-success btn-sm "> Nueva Ciudad</span>
                            </a>
                    
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $city)
                                <tr>
                                    
                                    <td>{{$city->name}}</td>
                                    <td>{{$city->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['cities.destroy',$city], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('cities.edit', $city)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
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