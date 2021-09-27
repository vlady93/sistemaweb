  <div class="form-group">
    <label for="name">Nombre</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
  </div>
  
  <div class="form-group">
    <label for="description">Descripción</label>
    <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  </div>

<div class="form-group">
    <label for="client_id">Cliente</label>
    <select class="form-control" name="client_id" id="client_id">
        @foreach ($clients as $client)
        <option value="{{$client->id}}"> {{$client->name}} {{$client->ap_paterno}} {{$client->ap_materno}}</option>
        @endforeach
    </select>
</div>

<div class="form-row" >
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="id_admin">Administrador</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="id_admin" id="id_admin"">
                <option value="" disabled selected>Seleccione un Administrador</option>
                @foreach ($users1 as $admin)
                <option value="{{$admin->id}}">{{$admin->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="id_logistic">Logistica</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="id_logistic" id="id_logistic">
                <option value="" disabled selected>Seleccione Logistica</option>
                @foreach ($users2 as $user2)
                <option value="{{$user2->id}}">{{$user2->name}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="city_id">Ciudad</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="city_id" id="city_id">
                <option value="" disabled selected>Seleccione unsa Ciudad</option>
                @foreach ($cities as $city)
                <option value="{{$city->id}}">{{$city->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-row ">
  <div class="form-group col-md-6">
    <div class="form-group">
        <label for="user_id">Obreros</label>
        {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
        <select class="form-control" name="user_id" id="user_id">
            <option value="" disabled selected>Seleccione Obrero</option>
            @foreach ($users3 as $worker)
            <option value="{{$worker->id}}">{{$worker->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group col-md-6">
<div class="form-group mt-4 ">
    
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Obreros</button>
</div>
</div>
</div>

<div class="form-group">
    <h4 class="card-title">Listado de Obreros</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Obrero Asignado</th>
                </tr>
            </thead>
            <tfoot>
                
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>