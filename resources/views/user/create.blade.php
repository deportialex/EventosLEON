@extends('admin.layout')
@section('content')

<section class="content-header">
  <h1>
    Usuarios
    <small>Agregar usuario</small>
  </h1>
</section>

<form action="{{url('user')}}" method="post">
  {{csrf_field()}}
@include('user.form')
<div class="form-group col-md-12">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
@endsection
