@extends('layouts.admin')
@section('title', 'Gestión de productos')
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

            <div class="row">
                <h3 class="page-title ml-3">
                    Materiales con bajo Stock
                </h3>

            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Materiales</li>
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        

                        <div class="table-responsive">
                            <table id="order-listing" class="table">
                                <thead>
                                    <tr>

                                        <th>Nombre</th>
                                        <th>Stock</th>
                                        <th>Categoría</th>
                                        <th>Proveedor</th>
                                        <th>Teléfono</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>

                                            <td>
                                               {{ $product->name }} - {{ $product->caract }}
                                            </td>
                                            <td>{{ $product->stock }}</td>
                                            <td>{{ $product->category->name }}</td>
                                            <td>{{ $product->provider->name }}</td>
                                            <td>{{ $product->provider->phone }}</td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="card-footer text-muted">
                    {{$products->render()}}
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
@endsection
