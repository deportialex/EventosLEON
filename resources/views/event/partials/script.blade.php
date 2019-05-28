<script>
//DATATABLE
var table=null;
table = $('#events_table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{route('event.showTableE')}}",
    "columns": [
        {data: 'client_name'},
        {data: 'total'},
        {data: 'date_start'},
        {data: 'date_end'},
        {data: 'status'},
        {data: 'btn'}
    ],
    "language": {
  "info": "_TOTAL_ registros",
  "search": "Buscar",
  "paginate": {
    "next": "Siguiente",
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
}
});

//EDIT
$('#edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var idevent = button.data('idevent')
    var name = button.data('nameevent')
    var lastname = button.data('lastnameevent')
    var phone1 = button.data('phone1event')
    var phone2 = button.data('phone2event')
    var email = button.data('emailevent')
    var modal = $(this)
    modal.find('.modal-body #id').val(idevent);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #lastname').val(lastname);
    modal.find('.modal-body #phone1').val(phone1);
    modal.find('.modal-body #phone2').val(phone2);
    modal.find('.modal-body #email').val(email);
});

//DELETE
$('body').delegate('.status-event','click',function(){
        event_id = $(this).attr('event_id');
        var csrf_token=$('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Estás seguro?",
            text: "Se eliminará el proveedor",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            $.ajax({
                url: "{{url('/event')}}" + '/' + event_id,
                headers: {'X-CSRF-TOKEN': csrf_token},
                type: 'DELETE',
                dataType: 'json',
                data: {id: event_id}
            }).done(function(data){
              table.ajax.reload();
              sAlert(data.title, data.text, data.icon);
            });
          }
        });
    });


//SWETALERT
@if (Session::has('message'))
        sAlert(
        "{{ Session::get('message.title') }}",
        "{{ Session::get('message.text') }}",
        "{{ Session::get('message.icon') }}"
    );
@endif

function sAlert(title, text, icon)
{
  swal({
    title: title,
    text: text,
    icon: icon,
    button: "Continue",
    timer: 3000
  });
}
</script>
