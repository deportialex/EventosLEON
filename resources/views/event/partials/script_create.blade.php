<script>
    var sub_total = document.getElementById("subtotal");
    sub_total.addEventListener("click", function() {
        getTotal();
    });
    sub_total.addEventListener("change", function() {
        getTotal();
    });

    var disc = document.getElementById("discount");
    disc.addEventListener("click", function() {
        getTotal();
    });
    disc.addEventListener("change", function() {
        getTotal();
    });

    function getTotal()
    {
        discount = $('#discount').val();
        subtotal = $('#subtotal').val();
        total = subtotal - discount;
        $('#total').val(total);
    }
</script>
