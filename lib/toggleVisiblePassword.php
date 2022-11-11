<style>
    #password+.bi {
        cursor: pointer;
        pointer-events: all;
    }
</style>
<script>
    $('#ojo-btn').on('click', function() {
        $('#ojo-icono').toggleClass('bi bi-eye-slash').toggleClass('bi bi-eye'); // toggle our classes for the eye icon
        let visibilidad = $('#password').attr('type') == 'password' ? 'text' : 'password';
        $('#password').attr('type', visibilidad);
    });

    $('#ojo-btn-new').on('click', function() {
        $('#ojo-icono-new').toggleClass('bi bi-eye-slash').toggleClass('bi bi-eye'); // toggle our classes for the eye icon
        let visibilidadNew = $('#new-password').attr('type') == 'password' ? 'text' : 'password';
        $('#new-password').attr('type', visibilidadNew);
    });

    $('#ojo-btn-confirm').on('click', function() {
        $('#ojo-icono-confirm').toggleClass('bi bi-eye-slash').toggleClass('bi bi-eye'); // toggle our classes for the eye icon
        let visibilidadConfirm = $('#confirm-password').attr('type') == 'password' ? 'text' : 'password';
        $('#confirm-password').attr('type', visibilidadConfirm);
    });
</script>