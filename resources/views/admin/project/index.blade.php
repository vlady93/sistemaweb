@extends('layouts.admin')
@section('title','Gestión de proyectos')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('create')

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Proyectos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Proyectos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5> Lista de Proyectos</h5> 
                            <a class="nav-link" href="{{route('projects.create')}}">
                                <span class="btn btn-success btn-sm "> <i class="fas fa-check"></i> Nuevo Proyecto</span>
                            </a>
                    
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de Proyecto</th>
                                    <th>Estado</th>
                                    <th>Fecha / Hora</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('projects.show', $project)}}">{{$project->id}}</a>
                                    </th>
                                    <td>{{$project->name}}</td>
                                    @if ($project->status == 'VALID')
                                    <td >
                                        <a style="height:26px; width:105px"class="jsgrid-button btn btn-success" href="" title="Editar">
                                            Registrado 
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a style="height:26px; width:105px" class="jsgrid-button btn btn-danger" href="" title="Editar">
                                            Cancelado 
                                        </a>
                                    </td>
                                    @endif 
                                    <td>
                                        {{\Carbon\Carbon::parse($project->sale_date)->format('d M y h:i a')}}
                                    </td>
                                 

                                 
{{-- 
                                    <td style="width: 50px;">

                                        <a href="{{route('projects.pdf', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('projects.print', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('projects.show', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
                                    </td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$projects->render()}}
                </div>  --}}
                

            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection