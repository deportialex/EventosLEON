@extends('admin.layout')
@section('content')
    @include('provider.modal')
    <section class="content-header">
        <h1>Proveedor {{ $provider->data_contact->name }}</h1>
    </section>

    @include('data_contact.form_show', ['data' => $provider->data_contact])

    <div class="box-body">
        <div class="form-group col-md-12">
        <h3>Servicios:</h3>
            <table id="services_provider_table" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Obra</th>
                        <th>Proveedor</th>
                        <th>Fecha de captura</th>
                        <th>Concepto de captura</th>
                        <th>Total</th>
                        <th>Comprobante</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <button class="btn btn-primary"
                data-idprovider="{{$provider->id}}"
                data-nameprovider="{{$provider->data_contact->name}}"
                data-lastnameprovider="{{$provider->data_contact->lastname}}"
                data-phone1provider="{{$provider->data_contact->phone1}}"
                data-phone2provider="{{$provider->data_contact->phone2}}"
                data-emailprovider="{{$provider->data_contact->email}}"
                data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i>Editar
            </button>
            <a class="btn btn-primary btn-md addNew" style="float: right;" href="{{ url('provider') }}"><b>Lista de proveedores</b></a>
        </div>
    </div>
@endsection

@section('adminlte_js')
    @include('provider.partials.script')
@endsection
