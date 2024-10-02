function init()
{
    $("#usuario_form").on("submit",function(e)
    {
        guardarUbicacion(e);	
    });
}

function guardarUbicacion(e)
{ 
    e.preventDefault();
	var formData = new FormData($("#usuario_form")[0]);

    $.ajax({
        url: "../../controller/usuarioController.php?opcion=actualizarOrgano",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos)
        {    
            console.log(datos);
            $('#usuario_form')[0].reset();
            $("#modalActualizarOrgano").modal('hide');

            swal({
                title: "Gestión Archivistica!",
                text: "Completado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });

        }
    }); 
}

$(document).ready(function()
{
    var Id_Organo_User = $('#organo_idUser').val();
    var NombreUSer = $('#NombreUSer').val();
    
    if(Id_Organo_User == 0)
    {
        $('#modalActualizarOrgano').modal('show');
        $('#usu_nom').val(NombreUSer);

        $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorComboBox",function(data, status)
        {
            $('#Ubicaciones').html(data);
        });
    }
});

init();