<script>
        var table = null;
        table  = $('#clients_table').DataTable({
              "processing": true,
              "serverSide": true,
              "ajax": "{{route('client.showTable')}}",
              "columns": [
                  {data: 'id'},
                  {data: 'name'},
                  {data: 'lastname'},
                  {data: 'phone1'},
                  {data: 'visits'},
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
              }
      });

      //EDIT
      $('#edit').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget)
          var id = button.data('idclient')
          var name = button.data('nameclient')
          var lastname = button.data('lastnameclient')
          var phone1 = button.data('phone1client')
          var phone2 = button.data('phone2client')
          var email = button.data('emailclient')
          var prestige = button.data('prestigeclient')
          var comments = button.data('commentsclient')
          var data_id = button.data('iddata')
          var modal = $(this)
          modal.find('.modal-body #cli_id').val(id);
          modal.find('.modal-body #name').val(name);
          modal.find('.modal-body #lastname').val(lastname);
          modal.find('.modal-body #phone1').val(phone1);
          modal.find('.modal-body #phone2').val(phone2);
          modal.find('.modal-body #email').val(email);
          modal.find('.modal-body #prestige').val(prestige);
          modal.find('.modal-body #comments').val(comments);
          modal.find('.modal-body #data_id').val(data_id);
      });

      //DELETE
      $('body').delegate('.status-client','click',function(){
              client_id = $(this).attr('client_id');
              var csrf_token=$('meta[name="csrf-token"]').attr('content');
              swal({
                  title: "Estás seguro?",
                  text: "Se eliminará el cliente",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              }).then((willDelete) => {
                if (willDelete) {
                  $.ajax({
                      url: "{{url('/client')}}" + '/' + client_id,
                      headers: {'X-CSRF-TOKEN': csrf_token},
                      type: 'DELETE',
                      dataType: 'json',
                      data: {id: client_id}
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
