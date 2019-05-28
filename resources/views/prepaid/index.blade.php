@extends('admin.layout')

@section('content-header')
  <h1>
    Anticipos
    <small>Administración de Anticipos</small>
  </h1>
@stop

@section('content')
    @include('prepaid.modal')
      <h2>Lista de Anticipos</h2>

      <div class="box-body">
          <table id="services_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th>Evento</th>
                  <th>Cliente</th>
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
    @include('prepaid.partials.script')
@stop
