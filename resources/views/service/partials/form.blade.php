<div class="form-group">
  <div class="form-group col-md-6">
    <label for="name">Nombre del servicio</label>
    <input type="text" class="form-control" name="name" id="name" required>
  </div>
  <div class="form-group col-md-6">
    <label for="description">Descripción</label>
    <input type="text" class="form-control" name="description" id="description">
  </div>
  <div class="form-group col-md-6">
    <label for="cost">Costo</label>
    <input type="number" class="form-control" name="cost" id="cost" required>
  </div>
</div>

<div class="form-group">
  <div class="form-group col-md-6">
    <label for="provider_id">Proveedor</label>
    <select class="form-control" name="provider_id" id="provider_id" required>
        @foreach($providers as $provider)
            <option value="{{$provider->id}}">{{$provider->data_contact->name}}</option>
        @endforeach
    </select>
  </div>
</div>
