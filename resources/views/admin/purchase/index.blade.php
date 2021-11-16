@extends('layouts.admin')
@section('title','Gestión de compras')
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
            Ingreso de Material
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                        <h5> Lista de Ingresos de Material</h5>
                        <a class="nav-link" href="{{ route('purchases.create') }}">
                            <span class="btn btn-success btn-sm "> Nuevo Ingreso de Material</span>
                        </a>

                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Usuario</th>
                                    <th>Fecha/Hora</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('purchases.show', $purchase)}}">{{$purchase->id}}</a>
                                    </th>
                                    <td>{{$purchase->user->name}}</td>
                                    <td>
                                        {{\Carbon\Carbon::parse($purchase->purchase_date)->format('d M y h:i a')}}
                                    </td>
                                    

                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="#" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="#" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 50px;" class="text-center">

                                        <a href="{{route('purchases.pdf',$purchase)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$purchases->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection