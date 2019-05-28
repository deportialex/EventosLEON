@extends('admin.layout')
@section('content')

    <section class="content-header">
      <h1>Servicios<small>Agregar Servicio</small></h1>
    </section>

    <form action="{{url('service')}}" method="post">
        {{csrf_field()}}
        @include('service.partials.form')
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </form>
@endsection
