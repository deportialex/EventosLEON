<div class="form-group">
    <div class="form-group col-md-6">
        <label for="date_start">Fecha y hora de inicio</label>
        <input type="datetime-local" class="form-control" name="date_start" id="date_start" required>
    </div>
    <div class="form-group col-md-6">
        <label for="date_end">Fecha y hora de terminación</label>
        <input type="datetime-local" class="form-control" name="date_end" id="date_end" required>
        </div>
</div>

<div class="form-group">
    <div class="form-group col-md-4">
        <label for="aditional_hour">Precio por hora adicional</label>
        <input type="number" class="form-control" name="aditional_hour" id="aditional_hour">
    </div>
    <div class="form-group col-md-4">
        <label for="people">Cantidad de personas</label>
        <input type="number" class="form-control" name="people" id="people">
    </div>
    <div class="form-group col-md-4">
        <label for="additional_people">Precio por persona adicional</label>
        <input type="number" class="form-control" name="additional_people" id="additional_people" required>
    </div>
</div>

<div class="form-group">
    <div class="form-group col-md-6">
        <label for="discount">Descuento</label>
        <input type="number" class="form-control" name="discount" id="discount">
    </div>
    <div class="form-group col-md-6">
        <label for="subtotal">Subtotal</label>
        <input type="number" class="form-control" name="subtotal" id="subtotal" required>
    </div>
</div>

<div class="form-group">
    <div class="form-group col-md-6">
        <label for="date">Fecha y hora de entrega de anticipo</label>
        <input type="datetime-local" class="form-control" name="date" id="date" required>
    </div>
    <div class="form-group col-md-6">
        <label for="amount">Cantidad a anticipar</label>
        <input type="number" class="form-control" name="amount" id="amount" required>
    </div>
</div>

<div class="form-group">
    <div class="form-group col-md-6">
        <label for="client_id">Selecciona el cliente</label>
        <select class="form-control" name="client_id" id="client_id" required>
            @foreach($clients as $client)
                <option value="{{$client->id}}">{{$client->data_contact->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group">
    <div class="form-group col-md-6">
        <label for="total">Total</label>
        <input type="number" class="form-control" readonly name="total" id="total" required>
    </div>
</div>
