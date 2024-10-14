function init()
{
    $("#configGeneral_form").on("submit",function(e)
    {
        guardar(e);	
    });
}


$(document).ready(function()
{     
    $.post("../../controller/catalogoController.php?opcion=GetConfiguracionGeneral", function (data) 
    {
        data = JSON.parse(data);
        $('#A_ACTUAL').val(data.general_a_actual);
        $('#LEYENDA').val(data.general_leyenda);
        $('#TELEFONO').val(data.general_telefono);
        $('#DIRECCION').val(data.general_direccion);
        $('#PRESIDENCIA').val(data.user_presidencia);
        $('#ARCHIVOS').val(data.user_archivo);
        $('#ADMINISTRATIVO').val(data.user_uaa);
        $('#fk_user_presidencia').val(data.fk_user_presidencia);
        $('#fk_user_uaa').val(data.fk_user_uaa);
        $('#fk_user_coordinacion_archivo').val(data.fk_user_coordinacion_archivo);
        $('#Logo').attr('src', data.logo);
    }); 
});



document.getElementById('formFile').addEventListener('change', function(event)
{
    var input = event.target;

    if (input.files && input.files[0]) 
        {
        var reader = new FileReader();

        reader.onload = function(e) 
        {
            document.getElementById('Logo').src = e.target.result;
        };

        reader.readAsDataURL(input.files[0]);
    }
});


function guardar(e)
{ 
    e.preventDefault();
	var formData = new FormData($("#configGeneral_form")[0]);  

    $.ajax({
        url: "../../controller/catalogoController.php?opcion=guardarConfigGeneral",
        type: "POST",
        data: formData,  
        contentType: false, 
        processData: false,  
        success: function(datos) 
        {    
            $('#configGeneral_form')[0].reset(); 

 
            $.post("../../controller/catalogoController.php?opcion=GetConfiguracionGeneral", function (data) 
            {
                data = JSON.parse(data);
                $('#A_ACTUAL').val(data.general_a_actual);
                $('#LEYENDA').val(data.general_leyenda);
                $('#TELEFONO').val(data.general_telefono);
                $('#DIRECCION').val(data.general_direccion);
                $('#PRESIDENCIA').val(data.user_presidencia);
                $('#ARCHIVOS').val(data.user_archivo);
                $('#ADMINISTRATIVO').val(data.user_uaa);
                $('#fk_user_presidencia').val(data.fk_user_presidencia);
                $('#fk_user_uaa').val(data.fk_user_uaa);
                $('#fk_user_coordinacion_archivo').val(data.fk_user_coordinacion_archivo);
                $('#Logo').attr('src', data.logo);
            }); 
            
            swal({
                title: "¡Gestión Documental!",
                text: "Guardado con éxito.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}


$(document).on("click","#btnMagistrado", function()
{ 
    $('#TitulomodalUsuariosPresidencia').html('Lista de Usuarios');
    $('#modalUsuariosPresidencia').modal('show');

    var Opcion = $(this).val();

    tablaUserSIGA=$('#tablamodalUsuariosPresidencia').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                ],
        "ajax":{
            url: '../../controller/usuarioController.php?opcion=obtener_Todos_EmpleadosModal',
            type : 'POST',
            data: { Opcion: Opcion },
            dataType : 'json',					
            error: function(e){
                console.log(e.responseText);	
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }     
    }).DataTable(); 
});


$(document).on("click", ".nombrePersona", function(e) 
{
    e.preventDefault(); 
    var Enlace = $(this).data("id");
    var Opcion = $(this).data("opcion");

    $('#modalUsuariosPresidencia').modal('hide');

    $.ajax({
        url: '../../controller/usuarioController.php?opcion=get_usuario_x_id',
        type: 'POST',
        data: { Enlace: Enlace},
        dataType: 'json',
        success: function(response) 
        {
            switch (Opcion) 
            {
                case 'user_presidencia':
                        $('#fk_user_presidencia').val(response.enlace);
                        $('#PRESIDENCIA').val(response.Prefijo + " " + response.nombre + " " + response.paterno + " " + response.materno);
                break;

                case 'user_uaa':
                        $('#fk_user_uaa').val(response.enlace);
                        $('#ADMINISTRATIVO').val(response.Prefijo + " " + response.nombre + " " + response.paterno + " " + response.materno);
                break;

                case 'user_archivo':
                        $('#fk_user_coordinacion_archivo').val(response.enlace);
                        $('#ARCHIVOS').val(response.Prefijo + " " + response.nombre + " " + response.paterno + " " + response.materno);
                break;
            }
        },
        error: function(xhr, status, error) 
        {
            console.error("Error al obtener los datos de la persona:", error);
        }
    });
});

init();