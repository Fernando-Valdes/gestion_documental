function init() {
    $(document).on("click", "#btnsoporte", function () {
        if ($('#rol_id').val() == 1) {
            $('#lbltitulo').html("Acceso Soporte");
            $('#btnsoporte').html("Acceso Usuario");
            $('#rol_id').val(0); // Cambio a 0 para el rol de administrador
            $("#imgtipo").attr("src", "public/2.jpg"); // Cambio de imagen para el administrador
        } else if ($('#rol_id').val() == 0) {
            $('#lbltitulo').html("Acceso Usuario");
            $('#btnsoporte').html("Acceso Soporte");
            $('#rol_id').val(1); // Cambio a 1 para el rol de usuario
            $("#imgtipo").attr("src", "public/1.jpg"); // Cambio de imagen para el usuario
        }
    });
}

$(document).ready(function () {
    init();
});
