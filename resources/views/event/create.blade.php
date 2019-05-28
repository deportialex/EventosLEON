@extends('admin.layout')

@section('content')
    <section class="content-header">
        <h1>Eventos<small>Agregar Evento</small></h1>
    </section>

    <form action="{{ route('event.eventservice') }}" method="post">
        {{csrf_field()}}
        @include('event.partials.form')
        <div class="form-group col-md-6">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </div>
    </form>
@endsection

@section('adminlte_js')
    @include('event.partials.script_create')
@stop
