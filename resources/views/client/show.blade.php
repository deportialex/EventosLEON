@extends('admin.layout')
@section('content')
@include('client.modal')
<section class="content-header">
  <h1>
    Cliente
    <small>{{$client->id}}</small>
  </h1>
</section>

<div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Nombre</label>
      <input type="text" class="form-control" value="{{$client->data_contact->name}}" readonly name="name" id="name">
    </div>
    <div class="form-group col-md-6">
      <label for="lastname">Apellido</label>
      <input type="text" class="form-control" value="{{$client->data_contact->lastname}}" readonly name="lastname" id="lastname">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="phone1">Teléfono 1</label>
      <input type="number" class="form-control" name="phone1" value="{{$client->data_contact->phone1}}" readonly id="phone1">
    </div>
    <div class="form-group col-md-6">
      <label for="phone2">Teléfono 2</label>
      <input type="number" name="phone2" class="form-control" value="{{$client->data_contact->phone2}}" readonly id="phone2">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" name="email" class="form-control" aria-describedby="emailHelp" readonly value="{{$client->data_contact->email}}" id="email">
    </div>
    <div class="form-group col-md-6">
      <label for="visits">Visitas</label>
      <input type="number" name="visits" class="form-control" value="{{$client->visits}}" readonly id="visits">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="prestige">Prestigio</label>
      <input type="number" class="form-control" name="prestige" value="{{$client->prestige}}" readonly id="prestige">
    </div>
    <div class="form-group col-md-6">
      <label for="comments">Comentarios</label>
      <textarea name="comments" id="comments" cols="20" rows="3" value="{{$client->comments}}" readonly class="form-control"></textarea>
    </div>
  </div>

  <div class="form-row">
    <button class="btn btn-primary"
      data-idclient="{{$client->id}}"
      data-nameclient="{{$client->data_contact->name}}"
      data-lastnameclient="{{$client->data_contact->lastname}}"
      data-phone1client="{{$client->data_contact->phone1}}"
      data-phone2client="{{$client->data_contact->phone2}}"
      data-emailclient="{{$client->data_contact->email}}"
      data-prestigeclient="{{$client->prestige}}"
      data-commentsclient="{{$client->comments}}"
      data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>Editar</button>
  </div>
@endsection

@section('adminlte_js')
<script>
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var id = button.data('idclient')
    var name = button.data('nameclient')
    var lastname = button.data('lastnameclient')
    var phone1 = button.data('phone1client')
    var phone2 = button.data('phone2client')
    var email = button.data('emailclient')
    var prestige = button.data('prestigeclient')
    var comments = button.data('commentsclient')
    var data_id = button.data('iddata')
    var modal = $(this)
    modal.find('.modal-body #cli_id').val(id);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #lastname').val(lastname);
    modal.find('.modal-body #phone1').val(phone1);
    modal.find('.modal-body #phone2').val(phone2);
    modal.find('.modal-body #email').val(email);
    modal.find('.modal-body #prestige').val(prestige);
    modal.find('.modal-body #comments').val(comments);
    modal.find('.modal-body #data_id').val(data_id);
});
</script>
@endsection
