<div class="form-group">
  <label for="name"> <strong>Nombre</strong> </label>
  <input type="text" name="name" id="name" class="form-control" required>
  @error('name')
            <small>*{{$message}}</small>
  @enderror
</div>

<div class="form-group">
  <label for="description"> <strong>Descripción</strong> </label>
  <textarea class="form-control" name="description" id="description" rows="3"></textarea>
  @error('description')
            <small>*{{$message}}</small>
  @enderror
</div>