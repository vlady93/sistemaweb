@extends('layouts.admin')
@section('title','información del material')
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
     
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">

                                <img src="{{asset('image/'.$product->image)}}" alt="profile" class="img-lg  mb-3" />
                                {{--  <p>Nombre de proveedor. </p>  --}}


                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            {{--  <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active">
                                        Sobre producto
                                    </button>
                                    <button type="button"
                                        class="list-group-item list-group-item-action">Productos</button>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar
                                        producto</button>
                                </div>
                            </div>  --}}

                            <div class="py-4">
                                {{-- <p class="clearfix">
                                    <span class="float-left">
                                        Status
                                    </span>
                                    <span class="float-right text-muted">
                                        {{$product->status}}
                                    </span>
                                </p> --}}
                                <p class="clearfix">
                                    <span class="float-left">
                                        Proveedor
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="{{route('providers.show',$product->provider->id)}}">
                                        {{$product->provider->name}}
                                        </a>
                                    </span>
                                </p>
                                <p class="clearfix">
                                    <span class="float-left">
                                        Categoría
                                    </span>
                                    <span class="float-right text-muted">
                                        {{--  PRODUCTOS POR CATEGORIA  --}}
                                        <a href="">
                                            {{$product->category->name}}
                                        </a>
                                    </span>
                                </p>
                                {{--  <p class="clearfix">
                                    <span class="float-left">
                                        Facebook
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">David Grey</a>
                                    </span>
                                </p>  --}}
                                {{--  <p class="clearfix">
                                    <span class="float-left">
                                        Twitter
                                    </span>
                                    <span class="float-right text-muted">
                                        <a href="#">@davidgrey</a>
                                    </span>
                                </p>  --}}
                            </div>

                            {{--  <button class="btn btn-primary btn-block">{{$product->status}}</button>  --}}
                            @if ($product->status == 'ACTIVE')
                            <a href="#" class="btn btn-success btn-block">Activo</a>
                            @else
                            <a href="#" class="btn btn-danger btn-block">Desactivado</a>
                            @endif
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del Material</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">

                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Código</strong>
                                        <p class="text-muted mt-2">
                                            {{$product->code}}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-dropbox mr-1"></i> Stock</strong>
                                        <p class="text-muted mt-2">
                                            {{$product->stock}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong>
                                            <i class="fas fa-money-bill mr-1"></i>
                                            Precio de Material </strong>
                                        <p class="text-muted mt-2">
                                            {{$product->sell_price}} Bs.-
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-wifi mr-1"></i> Código RFID</strong>
                                        <p class="text-muted mt-2">
                                            {{$product->rfid}}
                                        </p>
                                        <hr>
                                    </div>
                                   
                                </div>
                                <div class="form-group col-md-12 mt-4">
    
                                    <a href="{{route('products.index')}}" class="btn btn-primary float-right">Regresar</a>

                               </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    
    <div class="form-group">
        <div class="table-responsive col-md-12">
            
            <table id="saleDetails" class="table">
                <thead>
                    <tr class="bg-dark text-white text-center">
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Material</th>
                        <th>Descripción</th>
                        <th>Inicial</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <th>Saldo</th>
                    </tr>
                </thead>
                <tfoot>

                  
                <tbody>
                    <tr>
                        <td>{{\Carbon\Carbon::parse($product->created_at)->format('d M y')}}</td>
                        <td>{{\Carbon\Carbon::parse($product->created_at)->format('h i a')}}</td>
                        <td>{{$product->name}}</td>
                        <td>Inicial</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                        <td>0</td>
                    </tr>
                    <div hidden>{{$saldo=0}}</div>
                    @foreach ($kardex as $karde)
                    
                    <tr>
                        <td>{{\Carbon\Carbon::parse($karde->date_sale)->format('d M y')}}</td>
                        <td>{{\Carbon\Carbon::parse($karde->date_sale)->format('h i a')}}</td>
                        <td>{{$karde->name}}</td>
                        <td>
                            @if ($karde->tipo == 1)
                                 Ingreso
                                 <td>{{$saldo}}</td>
                                 <td>{{ $karde->quantity}}</td>
                                 <td>-</td>
                                 <td>{{$saldo=$saldo + $karde->quantity}}</td>
                            @else 
                                 Salida  
                                 <td>{{$saldo}}</td>
                                 <td>-</td>
                                 <td>{{$karde->quantity}}</td>
                                 <td>{{$saldo=$saldo - $karde->quantity}} </td>
                                    
                            @endif
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
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection