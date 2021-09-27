@extends('layouts.admin')
@section('title','Registro de proyecto')
@section('styles')
{!! Html::style('select/dist/css/bootstrap-select.min.css') !!}
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
    <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
      <span class="btn btn-warning">+ Registrar cliente</span>
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
            Registro de proyecto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('projects.index')}}">Proyectos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de proyecto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'projects.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    
                    
                    @include('admin.project._form')
                     
                     
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                     <a href="{{route('projects.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Registro rápido de cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::open(['route'=>'clients.store', 'method'=>'POST','files' => true]) !!}


            <div class="modal-body">
                <div class="form row">
                    <div class="form-group col-12">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="ap_paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" name="ap_paterno" id="ap_paterno" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="ap_materno">Apellido Materno</label>
                        <input type="text" class="form-control" name="ap_materno" id="ap_materno" aria-describedby="helpId" required>
                    </div>
                    
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="ci">CI</label>
                        <input type="number" class="form-control" name="ci" id="ci" aria-describedby="helpId" required>
                    </div>
                    <div class="form-group col-6">
                        <label for="phone">Teléfono/Celular</label>
                        <input type="number" class="form-control" name="phone" id="phone" aria-describedby="helpId" required>             
                    </div>
                </div>
                <input type="hidden" name="sale" value="1">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div>


@endsection
@section('scripts')
{!! Html::script('melody/js/alerts.js') !!}
{!! Html::script('melody/js/avgrund.js') !!}

{!! Html::script('select/dist/js/bootstrap-select.min.js') !!}
{!! Html::script('js/sweetalert2.all.min.js') !!}

<script>
    
$(document).ready(function () {
    $("#agregar").click(function () {
        agregar();
    });
});
var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();
$("#user_id").change(mostrarValores);
function mostrarValores() {
    datosObreros = document.getElementById('user_id').value;
    
}

function agregar() {
    datosObreros = document.getElementById('user_id').value;
    obrero_id = datosObreros[0];
    console.log(obrero_id);
    producto = $("#user_id option:selected").text();
    console.log(producto);
    if (obrero_id != " " ){
        console.log("Ingreso con exito");
        var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="obrero_id[]" value="' + obrero_id + '">' + producto + '</td></tr>';
        $('#detalles').append(fila);
    }else{
        console.log("Error");
    }
   
    $("#guardar").show();
}

function eliminar(index) {
    $("#fila" + index).remove();
   }

</script>

@endsection