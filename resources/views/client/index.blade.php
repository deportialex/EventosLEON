@extends('admin.layout')

@section('adminlte_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <meta name="csrf-token" = content="{{ csrf_token() }}">
@stop

@section('content-header')
  <h1>
    Clintes
    <small>Administración de clientes</small>
  </h1>
@stop

@section('content')
      <h2>Lista de clientes</h2>
          <a class="btn btn-success btn-md addNew" style="float: right;" href="{{ url('client/create') }}"><b>Agregar Nuevo</b></a><br><br>


      <div class="box-body">
          <table id="clients_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th width="10px">Id</th>
                  <th>Nombre</th>
                  <th>Apellido</th>
                  <th>Teléfono 1</th>
                  <th>Visitas</th>
                  <th width="120px">Acciones</th>
              </tr>
          </thead>
      </table>
      </div>


      @include('client.modal')

@stop

@section('adminlte_js')
  @include('client.partials.script')
@stop
