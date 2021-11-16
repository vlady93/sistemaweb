@extends('layouts.admin')
@section('title', 'Gestión de material')
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
                Salida de Material
            </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Salida de Material</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <div class="d-flex justify-content-between align-items-center mb-3 mr-2">
                            <h5> Lista de Proyectos</h5>
                            <a class="nav-link" href="{{ route('sales.create') }}">
                                <span class="btn btn-success btn-sm "> Nueva Salida de Material</span>
                            </a>

                        </div>

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Proyecto</th>
                                        <th>Fecha/Hora</th>
                                        <th>Total</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $sale)
                                        <tr>
                                            <td scope="row">
                                                <a href="{{ route('sales.show', $sale) }}">{{ $sale->id }}</a>
                                            </td>
                                            <td>{{$sale->project->name}}</td>

                                            <td>
                                                {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a') }}
                                            </td>
                                            <td>{{ $sale->total }} Bs.-</td>

                                            {{-- @if ($sale->status == 'VALID')
                                    <td>
                                        <a class="jsgrid-button btn btn-success" href="{{route('change.status.sales', $sale)}}" title="Editar">
                                            Activo <i class="fas fa-check"></i>
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="jsgrid-button btn btn-danger" href="{{route('change.status.sales', $sale)}}" title="Editar">
                                            Cancelado <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                    @endif --}}

                                            <td style="width: 50px;">

                                                <a href="{{ route('sales.pdf', $sale) }}"
                                                    class="jsgrid-button jsgrid-edit-button"><i
                                                        class="far fa-file-pdf"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
