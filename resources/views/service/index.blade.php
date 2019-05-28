@extends('admin.layout')
@section('content-header')
  <h1>
    Servicios
    <small>Administración de Servicios</small>
  </h1>
@stop

@section('content')
      <h2>Lista de Servicios</h2>
        <a class="btn btn-success btn-md addNew" style="float: right;" href="{{ url('service/create') }}"><b>Agregar Nuevo</b></a><br><br>

      <div class="box-body">
          <table id="services_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Costo</th>
                  <th>Proveedor</th>
                  <th width="120px">Acciones</th>
              </tr>
          </thead>
      </table>
      </div>
@include('service.modal')
@stop

@section('adminlte_js')
  @include('service.partials.script')
@stop
