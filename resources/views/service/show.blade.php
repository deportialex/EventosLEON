@extends('admin.layout')
@section('content')
    @include('service.modal')
    <section class="content-header">
        <h1>Servicio {{ $service->name }}</h1>
    </section>

    @include('service.partials.form_show')

    <div class="form-row">
        <div class="form-group col-md-12">
            <button class="btn btn-primary"
                data-idservice="{{$service->id}}"
                data-service_name="{{$service->name}}"
                data-cost="{{$service->cost}}"
                data-description="{{$service->description}}"
                data-provider_id="{{$service->provider_id}}"
                data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>Editar
            </button>
            <a class="btn btn-primary btn-md addNew" style="float: right;" href="{{ url('service') }}"><b>Lista de servicios</b></a>
        </div>
    </div>
@endsection

@section('adminlte_js')
    @include('service.partials.script')
@endsection
