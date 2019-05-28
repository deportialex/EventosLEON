<div class="form-row">
    <div class="form-group col-md-6">
        <label for="name">Nombre</label>
        <input type="text" class="form-control" value="{{$data->name}}" readonly name="name" id="name">
    </div>
    <div class="form-group col-md-6">
        <label for="lastname">Apellido</label>
        <input type="text" class="form-control" value="{{$data->lastname}}" readonly name="lastname" id="lastname">
    </div>
    <div class="form-group col-md-6">
        <label for="phone1">Teléfono 1</label>
        <input type="text" class="form-control" value="{{$data->phone1}}" readonly name="phone1" id="phone1">
    </div>
    <div class="form-group col-md-6">
        <label for="phone2">Teléfono 2</label>
        <input type="text" class="form-control" value="{{$data->phone2}}" readonly name="phone2" id="phone2">
    </div>
    <div class="form-group col-md-6">
        <label for="email">Correo</label>
        <input type="email" class="form-control" value="{{$data->email}}" readonly name="email" id="email">
    </div>
</div>
