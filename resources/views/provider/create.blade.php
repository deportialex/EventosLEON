@extends('admin.layout')
@section('content')

<section class="content-header">
  <h1>
    Proveedores
    <small>Agregar proveedor</small>
  </h1>
</section>

<form action="{{url('provider')}}" method="post">
  {{csrf_field()}}
@include('data_contact.create')
<div class="form-group col-md-6">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
@endsection
