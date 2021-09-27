<div class="form-group">
    <label for="project_id">Proyecto</label>
    <select class="form-control" name="project_id" id="project_id" required>
        <option value="" disabled selected>Selecccione un proyecto</option>
        @foreach ($clients as $client)
        <option value="{{$client->id}}">{{$client->name}}</option>
        @endforeach
    </select>
</div>


  <div class="form-row">
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="product_id">Material</label>
            {{--  <select class="form-control selectpicker" data-live-search="true" name="product_id" id="product_id">  --}}
            <select class="form-control" name="product_id" id="product_id">
                <option value="" disabled selected>Selecccione material</option>
                @foreach ($products as $product)
                <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="">Stock actual</label>
            <input type="text" name="" id="stock" value="" class="form-control" disabled>
          </div>
    </div>
    <div class="form-group col-md-4">
        <div class="form-group">
            <label for="price">Precio de salida</label>
            <input type="number" class="form-control" name="price" id="price" aria-describedby="helpId" disabled>
        </div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="helpId">
        </div>
    </div>
    <div class="form-group col-md-6 mt-4">
        <button type="button" id="agregar" class="btn btn-primary float-right">Agregar producto</button>
    </div>
    
  </div>








<div class="form-group">
    <h4 class="card-title">Detalles de Material</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Material</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>SubTotal (Bs.)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p ><span align="right" id="total">Bs.- 0.00</span> </p>
                    </th>
                </tr>
    
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL PAGAR:</p>
                    </th>
                    <th>
                        <p ><span align="right" id="total_pagar_html">Bs.- 0.00</span> <input type="hidden"
                                name="total" id="total_pagar"></p>
                    </th>
                </tr>
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>
</div>