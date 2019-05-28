@extends('admin.layout')

@section('adminlte_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <meta name="csrf-token" = content="{{ csrf_token() }}">
@stop

@section('content-header')
  <h1>
    Eventos
    <small>Administración de Eventos</small>
  </h1>
@stop

@section('content')
      <h2>Lista de Eventos</h2>
          <a class="btn btn-success btn-md addNew" style="float: right;" href="{{ url('event/create') }}"><b>Agregar Nuevo</b></a><br><br>

      <div class="box-body">
          <table id="events_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Cliente</th>
                  <th>Costo</th>
                  <th>Fecha de inicio</th>
                  <th>Fecha de fin</th>
                  <th>Status</th>
                  <th width="120px">Acciones</th>
              </tr>
          </thead>
      </table>
      </div>

@stop

@section('adminlte_js')
    @include('event.partials.script')
@stop
