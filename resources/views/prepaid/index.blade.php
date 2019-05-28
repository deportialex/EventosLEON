@extends('admin.layout')

@section('adminlte_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <meta name="csrf-token" = content="{{ csrf_token() }}">
@stop

@section('content-header')
  <h1>
    Anticipos
    <small>Administración de Anticipos</small>
  </h1>
@stop

@section('content')
      <h2>Lista de Anticipos</h2>

      <div class="box-body">
          <table id="services_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th width="10px">Id</th>
                  <th>Evento</th>
                  <th>Fecha de anticipo</th>
                  <th>Cantidad</th>
                  <th>estado</th>
                  <th width="120px">Acciones</th>
              </tr>
          </thead>
      </table>
      </div>

@stop

@section('adminlte_js')
@stop
