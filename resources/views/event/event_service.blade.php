@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>Eventos<small>Agregar Servicios</small></h1>
    </section>

    <form action="{{url('event')}}" method="post">
        {{csrf_field()}}

        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="service">Servicios adicionales:</label>
                <select class="form-control" name="service_id" id="service_id">
                    @foreach($services as $service)
                        <option value="{{$service->id}}">{{$service->name}} - {{$service->cost}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <br>
                <button id="serv" name="serv"  class="btn btn-info">Agregar servicio</button>
            </div>
        </div>

        <div class="box-body">
        <div class="form-group col-md-12">
            <table id="event_services_create_table" class="table table-striped table-bordered" style="width:100%">
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

        <div class="form-group">
            <div class="form-group col-md-6">
                <label for="subtotal">Costo sin servicios</label>
                <input type="number" class="form-control" readonly name="subtotal" id="subtotal" value={{ $data->total }}>
            </div>
            <div class="form-group col-md-6">
                <label for="total">Total</label>
                <input type="number" class="form-control" readonly name="total" id="total">
            </div>
        </div>

        <input type="hidden" name="event_id" id="event_id" value="{{ $data->id }}">
        @include('event.partials.data_event')

        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </div>
    </form>
@endsection

@section('adminlte_js')
    @include('event.partials.script_service')
@stop
