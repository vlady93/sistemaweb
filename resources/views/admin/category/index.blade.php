@extends('layouts.admin')
@section('title','Gestión de categorías')
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
            Categorías
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Categorías</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body mr-7">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5> Lista de Categorías</h5> 
                            <a class="nav-link" href="{{route('categories.create')}}">
                                <span class="btn btn-success btn-sm "> Nueva Categoría</span>
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
                                @foreach ($categories as $category)
                                <tr>
                                    
                                    <td>
                                        <a href="{{route('categories.show',$category)}}">{{$category->name}}</a>
                                    </td>
                                    <td>{{$category->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['categories.destroy',$category], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button" href="{{route('categories.edit', $category)}}" title="Editar">
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
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection