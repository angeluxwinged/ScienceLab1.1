<script src="../js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>

<script>
    // Cambia a modo active el menu seleccionado
    $(document).ready(function() {
        var URLactual = window.location.pathname;

        URLactual = URLactual.split('/').pop();
        URLactual = URLactual.split('.');

        $('.' + URLactual[0] ).addClass('active');

        // Hace funcionar el dropdown de boostrap
        $('.dropdown-toggle').dropdown();
    });
</script>