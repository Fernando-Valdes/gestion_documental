function init()
{
    $("#usuario_form").on("submit",function(e)
    {
        guardaryeditar(e);	
    });
}


$(document).ready(function()
{     
    
    $.post("../../controller/usuarioController.php?opcion=get_usuario_x_id", {Enlace : Enlace}, function (data) 
    {
        data = JSON.parse(data);
        $('#Enlace_Apoyo').val(data.enlace);
        $('#Enlace').val(data.enlace);
        $('#Prefijo').val(data.Prefijo);
        $('#Nombres').val(data.nombre);
        $('#Apellido_Paterno').val(data.paterno);
        $('#Apellido_Materno').val(data.materno);
        $('#Correo_electronico').val(data.email);
        $('#Puesto').val(data.puesto_usuario);
        $('#rol_id').val(data.id_rol).trigger('change');
    
    }); 
});










//Guardar o editar los registros del usuario
function guardaryeditar(e)
{ 
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);
    $.ajax({
        url: "../../controller/usuarioController.php?opcion=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){    
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalnuevo").modal('hide');
            $('#usuario_data').DataTable().ajax.reload();
            swal({
                title: "¡Gestión Documental!",
                text: "Guardado con éxito.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    }); 
}

//Mostrar modal editar los datos del usuario 
function editar(Enlace)
{   
    $('#usuario_form')[0].reset();
    $("#btnEmpleadoSiga").hide();
    $('#mdltitulo').html('Editar los datos del Usuario'); 

    $.post("../../controller/catalogoController.php?opcion=GetRolComboBox", function(data, status) 
    {   
        $('#rol_id').html(data);
    });

    $.post("../../controller/usuarioController.php?opcion=get_usuario_x_id", {Enlace : Enlace}, function (data) 
    {
        data = JSON.parse(data);
        $('#Enlace_Apoyo').val(data.enlace);
        $('#Enlace').val(data.enlace);
        $('#Prefijo').val(data.Prefijo);
        $('#Nombres').val(data.nombre);
        $('#Apellido_Paterno').val(data.paterno);
        $('#Apellido_Materno').val(data.materno);
        $('#Correo_electronico').val(data.email);
        $('#Puesto').val(data.puesto_usuario);
        $('#rol_id').val(data.id_rol).trigger('change');
    
    }); 

    $('#modalnuevo').modal('show');
}


//Modal Agregar usuario
$(document).on("click","#btnnuevo", function()
{ 
    $('#usuario_form')[0].reset();
    $("#btnEmpleadoSiga").show();
    $('#mdltitulo').html(''); 
    $('#modalnuevo').modal('show');

    $.post("../../controller/catalogoController.php?opcion=GetRolComboBox", function(data, status) 
    {   
        $('#rol_id').html(data);
    });

});


//Funcion al seleccionar una persona del modal Empleados SIGA
$(document).on("click", ".nombrePersona", function(e) 
{
    e.preventDefault(); 
    var Enlace = $(this).data("id");


    $('#modalUsuariosSIGA').modal('hide');

    $.ajax({
        url: '../../controller/usuarioController.php?opcion=obtener_Datos_Empleados_SIGA_Xid',
        type: 'POST',
        data: { Enlace: Enlace },
        dataType: 'json',
        success: function(response) 
        {
            $('#Enlace').val(response.Enlace);
            $('#Prefijo').val(response.Prefijo);
            $('#Nombres').val(response.Nombres);
            $('#Apellido_Paterno').val(response.Paterno);
            $('#Apellido_Materno').val(response.Materno);
            $('#Correo_electronico').val(response.Correo);
            $('#Puesto').val(response.Puesto);
        },
        error: function(xhr, status, error) 
        {
            console.error("Error al obtener los datos de la persona:", error);
        }
    });
});

init();