<script>
//DATATABLE
var table=null;
table = $('#provider_table').DataTable({
    "processing": true,
    "serverSide": true,
    "ajax": "{{route('provider.showTableP')}}",
    "columns": [
        {data: 'name'},
        {data: 'lastname'},
        {data: 'phone1'},
        {data: 'email'},
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
    var idprovider = button.data('idprovider')
    var name = button.data('nameprovider')
    var lastname = button.data('lastnameprovider')
    var phone1 = button.data('phone1provider')
    var phone2 = button.data('phone2provider')
    var email = button.data('emailprovider')
    var modal = $(this)
    modal.find('.modal-body #id').val(idprovider);
    modal.find('.modal-body #name').val(name);
    modal.find('.modal-body #lastname').val(lastname);
    modal.find('.modal-body #phone1').val(phone1);
    modal.find('.modal-body #phone2').val(phone2);
    modal.find('.modal-body #email').val(email);
});

//DELETE
$('body').delegate('.status-provider','click',function(){
        provider_id = $(this).attr('provider_id');
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
                url: "{{url('/provider')}}" + '/' + provider_id,
                headers: {'X-CSRF-TOKEN': csrf_token},
                type: 'DELETE',
                dataType: 'json',
                data: {id: provider_id}
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
