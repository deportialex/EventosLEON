@extends('admin.layout')
@section('content')

<section class="content-header">
  <h1>
    Anticipos
    <small>Agregar Anticipo</small>
  </h1>
</section>

<form action="{{url('prepaid')}}" method="post">
  {{csrf_field()}}
@include('prepaid.form')
<div class="form-group col-md-12">
<button type="submit" class="btn btn-primary">Guardar</button>
</div>
</form>
@endsection
