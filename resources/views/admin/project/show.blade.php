@extends('layouts.admin')
@section('title','Detalles de venta')
@section('styles')

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
            Detalles de Proyecto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Proyectos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles del Proyecto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center">Detalles de Proyecto</h4>
                    <div class="form-group row">
                        
                        <div class="col-md-4 text-center mt-3">
                            <label class="form-control-label"><strong><h5>Nombre de Proyecto</h5></strong></label>
                            <h6>{{$project->name}}</h6>
                        </div>
                        <div class="col-md-4 text-center mt-3">
                            <label class="form-control-label"><strong><h5>Cliente</h5></strong></label>
                            <h6>{{$project->client->name}}</h6>
                        </div>
                        <div class="col-md-4 text-center mt-3">
                            <label class="form-control-label"><strong><h5>Proyecto número</h5></strong></label>
                            <h6>{{$project->id}}</h6>
                        </div>
                    </div>
                    <h4 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center">Personal Asignado</h4>
                    <div class="form-group col-md-12 ">
                        
                        <div class="table-responsive col-md-12">
                            <table id="projectDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cargo</th>
                                    
                                    </tr>
                                </thead>
                                <tfoot>

                                   
                                </tfoot>
                                <tbody>
                                    @foreach($resultado as $user)
                                   
                                    <tr>

                                        <td>
                                            {{$user->name}}
                                        </td>
                                        <td>
                                            {{$user->cargo}}
                                        </td>
                                        
                                         
                                    </tr>
                                   
                                    @endforeach
                            

                                    
  
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <h4 class="card-title font-weight-bold p-3 mb-2 bg-dark text-white text-center">Material Asignado</h4>
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr><th colspan="3"></th>
                                        
                                        <th>
                                            <p>TOTAL:  {{number_format($sale->total,2)}} Bs.-</p>
                                        </th>
                                        
                                    </tr>

                                </tfoot>
                                <tbody>
                                    @foreach($saleDetails as $saleDetail)
                                    <tr>
                                        <td>{{$saleDetail->product->name}} - {{$saleDetail->product->caract}}</td>
                                       
                                        <td>  {{$saleDetail->price}} Bs.-</td>
                                        <td>{{$saleDetail->quantity}}</td>
                                        <td>{{number_format($saleDetail->quantity*$saleDetail->price,2)}} Bs.-</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card-columns">
                                @foreach ($files as $file)
                                <div class="card">
                                    <img class="card-img-top" src="{{asset($file->url)}}" alt="">
                                    <div class="card-body">
                                        <h4 class="card-title">Title</h4>
                                        <p class="card-text">Text</p>
                                    </div>
                                </div>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('sales.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection