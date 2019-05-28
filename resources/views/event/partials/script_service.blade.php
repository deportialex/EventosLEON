<script>
    $(document).ready(function () {
        getTotal();
    });

    $("#serv").click(function (e) {
        e.preventDefault();
        chargeTable();
    });

    function getTotal()
    {
        subtotal = $('#subtotal').val();
        total = $('#total').val();
        total = total + subtotal;
        $('#total').val(total);
    }

    function chargeTable()
    {
        table = $('#event_services_create_table').DataTable({
            "bDestroy": true,
            stateSave: true,
            "ordering": false,
            "processing": true,
            "serverSide": true,
            "ajax": {
                type: "get",
                url: "{{route('event.showTableESC')}}",
                data: {
                    service_id: $('#service_id').val(),
                    event_id: $('#event_id').val()
                }
            },
            "columns": [
                {data: 'service_name'},
                {data: 'description'},
                {data: 'cost'},
                {data: 'provider_name'},
                {data: 'btn'}
            ],
            "footerCallback": function ( row, data, start, end, display ) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over all pages
                total = api
                    .column( 2 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                }, 0 );

                subtotal = parseFloat($('#subtotal').val());
                $('#total').val(total + subtotal);
            }
        });
    }

    //DELETE
$('body').delegate('.delete-service','click',function(){
        id_temporal_service = $(this).attr('id_temporalyService');
        console.log(id_temporal_service);
        var csrf_token=$('meta[name="csrf-token"]').attr('content');
        swal({
            title: "Estás seguro?",
            text: "Se eliminará el servicio del evento",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {
            $.ajax({
                url: "{{route('event.deleteServiceTemporal')}}",
                headers: {'X-CSRF-TOKEN': csrf_token},
                type: 'DELETE',
                dataType: 'json',
                data: {id: id_temporal_service}
            }).done(function(data){
                chargeTable();
              sAlert(data.title, data.text, data.icon);
            });
          }
        });
    });
</script>
