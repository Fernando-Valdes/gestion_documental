function init(){
   
}

$(document).ready(function()
{
    var Id_Organo_User = $('#organo_idUser').val();
    var NombreUSer = $('#NombreUSer').val();
    
    if(Id_Organo_User == 0)
    {
        $('#modalActualizarOrgano').modal('show');
        $('#usu_nom').val(NombreUSer);

        $.post("../../controller/organoGeneradorController.php?opcion=getorgano",function(data, status){
            $('#Ubicaciones').html(data);
        });
    }
});

init();