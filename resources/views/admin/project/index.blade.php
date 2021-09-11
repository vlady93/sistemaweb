@extends('layouts.admin')
@section('title','Gestión de ventas')
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
<li class="nav-item d-none d-lg-flex">
    <a class="nav-link" href="{{route('projects.create')}}">
      <span class="btn btn-primary">+ Registrar venta</span>
    </a>
  </li>
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Ventas
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ventas</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Ventas</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('projects.create')}}" class="dropdown-item">Registrar</a>
                              {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                          </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre de Proyecto</th>
                                    <th>Fecha / Hora</th>
                                    <th>Imagenes</th>
                                    
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('projects.show', $project)}}">{{$project->id}}</a>
                                    </th>
                                    <td>{{$project->name}}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($project->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    
                                    <td>
                                       <center> <a class="jsgrid-button jsgrid-edit-button" href="{{route('products.edit', $project)}}" title="Editar">
                                        <i class="fas fa-camera-retro"></i>
                                        
                                        </a></center>
                                    </td>

                                 {{--    @if ($project->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.projects', $project)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.projects', $project)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif --}}
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