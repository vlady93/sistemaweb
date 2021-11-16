@extends('layouts.admin')
@section('title','información del cliente')
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
            Detalle de Cliente 
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$client->name}} {{$client->ap_paterno}} {{$client->ap_materno}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <a class="list-group-item list-group-item-action active" id="list-home-list"
                                        data-toggle="list" href="#list-home" role="tab" aria-controls="home">
                                        Sobre cliente
                                    </a>
                                    <a class="list-group-item list-group-item-action" id="list-profile-list"
                                        data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">
                                        Historial de Proyectos
                                    </a>
                                    {{--  <button type="button" class="list-group-item list-group-item-action">Registrar
                                        producto</button>  --}}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">




                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="list-home" user="tabpanel"
                                    aria-labelledby="list-home-list">

                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h4>Información de cliente</h4>
                                        </div>
                                    </div>
                                    <div class="profile-feed">
                                        <div class="d-flex align-items-start profile-feed-item">
                                            
                                            <div class="form-group col-md-6">
                                                <strong><i class="fas fa-venus-mars mr-1"></i> Genero</strong>
                                                <p class="text-muted">
                                                    {{$client->genero}} 
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i> CI</strong>
                                                <p class="text-muted">
                                                    {{$client->ci}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-address-card mr-1"></i> Número de NIT</strong>
                                                <p class="text-muted">
                                                    {{$client->nit}}
                                                </p>
                                                <hr>
                                            </div>
        
                                            <div class="form-group col-md-6">
                                                <strong>
                                                    <i class="fas fa-mobile mr-1"></i>
                                                    Teléfono / Celular</strong>
                                                <p class="text-muted">
                                                    {{$client->phone}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-envelope mr-1"></i> Correo Electrónico</strong>
                                                <p class="text-muted">
                                                    {{$client->email}}
                                                </p>
                                                <hr>
                                                <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>
                                                <p class="text-muted">
                                                    {{$client->address}}
                                                </p>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                
                            </div>





                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('clients.index')}}" class="btn btn-primary float-right">Regresar</a>
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