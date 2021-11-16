@extends('layouts.admin')
@section('title','Reporte de Ingreso de Material')
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
            Reporte de Proyectos Diario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte de Ingreso de Material</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        {{--  <h4 class="card-title">Reporte de ventas </h4>  --}}
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        {{--  <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a href="{{route('sales.create')}}" class="dropdown-item">Registrar</a>
                            </div>
                        </div>  --}}
                    </div>

                    <div class="row ">
                        <div class="col-12 col-md-4 text-center">
                            <span>Fecha de consulta: <b> </b></span>
                            <div class="form-group">
                                <strong>{{\Carbon\Carbon::now()->format('d/m/Y')}}</strong>
                            </div>
                        </div>
                        <div class="col-12 col-md-4 text-center">
                            <span>Cantidad de registros: <b></b></span>
                            <div class="form-group">
                                <strong>{{$projects->count()}}</strong>
                            </div>
                        </div>
                        {{-- <div class="col-12 col-md-4 text-center">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>s/ {{$total}}</strong>
                            </div>
                        </div> --}}
                    </div>


                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('projects.show', $project)}}">{{$project->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($project->project_date)->format('d M y h:i a')}}
                                    </td>

                                    <td>{{$project->status}}</td>
                                    <td style="width: 50px;">
                                       
                                        {{--  <a class="jsgrid-button jsgrid-edit-button" href="{{route('sales.edit', $project)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>  --}}
{{--                                          
                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>  --}}

                                       {{--  <a href="{{route('sales.pdf', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('sales.print', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('sales.show', $project)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                    --}}
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection