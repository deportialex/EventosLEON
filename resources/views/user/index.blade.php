@extends('admin.layout')

@section('adminlte_css')
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <meta name="csrf-token" = content="{{ csrf_token() }}">
@stop

@section('content-header')
  <h1>
    Usuarios
    <small>Administración de usuarios</small>
  </h1>
@stop

@section('content')
      <h2>Lista de usuarios</h2>
        <a class="btn btn-success btn-md addNew" style="float: right;" href="{{ url('user/create') }}"><b>Agregar Nuevo</b></a><br><br>

      <div class="box-body">
          <table id="users_table" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
                  <th width="10px">Id</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th width="120px">Acciones</th>
              </tr>
          </thead>
      </table>
      </div>

      @include('user.modal')

@stop

@section('adminlte_js')
  <script>

  /*function add(id)
  {
    var csrf_token=$('meta[name="csrf-token"]').attr('content');
    swal({
      title: "Estás seguro?",
      text: "Se eliminará el cliente",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          url: "{{url('/client')}}" + '/' + id,
            type: "POST",
            data: {'_method' : 'DELETE', '_token' : csrf_token},
            success: function (data) {
              //clients_table.ajax.reload();
              swal("Cliente eliminado exitosamente", {
                icon: "success",
              });
              }
        });

      };
    });
  }
*/
  $('#edit').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('iduser')
      var name = button.data('nameuser')
      var email = button.data('emailuser')
      var modal = $(this)
      modal.find('.modal-body #user_id').val(id);
      modal.find('.modal-body #name').val(name);
      modal.find('.modal-body #email').val(email);
  });


  </script>



  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#users_table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{{route('user.showTable')}}",
              "columns": [
                  {data: 'id'},
                  {data: 'name'},
                  {data: 'email'},
                  {data: 'btn'}
              ],
              "language": {
                "info": "_TOTAL_ registros",
                "search": "Buscar",
                "paginate": {
                  "next": "Siguinte",
                  "previous": "Anterior",
                },
                "lengthMenu": 'Mostrar <select>'+
                    '<option value="10">10</option>'+
                    '<option value="30">30</option>'+
                    '<option value="-1">Todos</option>'+
                    '</select> registros',
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "emptyTable": "No hay datos",
                "zeroRecords": "No hay coincidencias",
                "infoEmpty": "",
                "infoFiltered": ""
              }/*,
              "initComplete":function(settings, json){
      console.log(json);
    }*/
          });


      });


  </script>
@stop
