<script>
//DATATABLE
var table=null;
table = $('#services_table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{route('prepaid.showTablePre')}}",
    "columns": [
        {data: 'date_start'},
        {data: 'client_name'},
        {data: 'date'},
        {data: 'total'},
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
    var id = button.data('id')
    var total = button.data('total')
    var status = button.data('status')
    if(status == "Anticipado")
        status = 0;
    else
        status = 1;
    var modal = $(this)
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #total').val(total);
    modal.find('.modal-body #status').val(status);
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
