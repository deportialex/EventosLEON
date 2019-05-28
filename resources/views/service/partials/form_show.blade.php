<div class="form-group">
  <div class="form-group col-md-6">
    <label for="name">Nombre del servicio</label>
    <input type="text" class="form-control" name="name" id="name" required value="{{$service->name}}" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="description">Descripción</label>
    <input type="text" class="form-control" name="description" id="description" value="{{$service->description}}" readonly>
  </div>
  <div class="form-group col-md-6">
    <label for="cost">Costo</label>
    <input type="text" class="form-control" name="cost" id="cost" required value="{{$service->cost}}" readonly>
  </div>
</div>

<div class="form-group">
  <div class="form-group col-md-6">
    <label for="provider_name">Proveedor</label>
    <input type="text" class="form-control" name="provider_name" id="provider_name" required value="{{$service->provider->data_contact->name}}" readonly>
  </div>
</div>
