function init()
{
}

$(document).ready(function() 
{
    var Opcion = getUrlParameter('Opcion');

    if(Opcion == 'Editar')
    {
        $('#TITULO').html('FICHA TÉCNICA DE VALORACIÓN DOCUMENTAL <br> EDITAR SERIE');
    }
    else if(Opcion='Agregar')
    {
        $('#TITULO').html('FICHA TÉCNICA DE VALORACIÓN DOCUMENTAL <br> AGREGAR SERIE'); 
        CargarDatos();
    }
});


CargarDatos()
{
    $.post("../../controller/fondoController.php?opcion=GetFondoComboBox", function(data, status) 
    {
        $('#FONDO').html(data);
        var fondo = $('#FONDO').val();

        $.post("../../controller/subFondoController.php?opcion=GetSubfondoComboBox", {fondo: fondo}, function(data, status) 
        {
            $('#SUB-FONDO').html(data);
            var subfondo = $('#SUB-FONDO').val();

            $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorComboBoxXsubFondo", {subfondo: subfondo}, function(data, status) 
            {
                $('#ORGANO_GENERADOR').html(data);
                var organoGenerador = $('#ORGANO_GENERADOR').val();

                $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorXid", {organoGenerador: organoGenerador}, function(data, status) 
                {  
                    data = JSON.parse(data);
                    $('#SECCION').val(data.seccion);
                    $('#REPONSABLE_ORGANO').html(data.Usuario_Organo);
                    $('#REPONSABLE_DEL_ARCHIVO').html(data.Usuario_Responsable);
                });
            });
        });
    });

    $.post("../../controller/catalogoController.php?opcion=GetYearComboBox", function(data, status) 
    {   
        $('#YEAR_INICIO').html(data);
        $('#YEAR_CIERRE').html(data);
    });

    $.post("../../controller/catalogoController.php?opcion=GetValorDocumentalComboBox", function(data, status) 
    {   
        $('#VALORES_DOCUMENTALES').html(data);
    });

    $.post("../../controller/catalogoController.php?opcion=GetYearVigenciaComboBox", function(data, status) 
    {   
        $('#VIGENCIA_DOCUMENTAL').html(data);
    });
}



$("#FONDO").change(function()
{

});


$("#SUB-FONDO").change(function()
{
    subfondo = $(this).val();

    $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorComboBoxXsubFondo",{subfondo : subfondo},function(data, status)
    {
        $('#ORGANO_GENERADOR').html(data);

        var organoGenerador = $('#ORGANO_GENERADOR').val();

        $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorXid", {organoGenerador: organoGenerador}, function(data, status) 
        {   
            data = JSON.parse(data);
            $('#SECCION').val(data.seccion);
            $('#REPONSABLE_ORGANO').html(data.Usuario_Organo);
            $('#REPONSABLE_DEL_ARCHIVO').html(data.Usuario_Responsable);
        });
    });
});

$("#ORGANO_GENERADOR").change(function()
{
    organoGenerador = $(this).val();

    $.post("../../controller/organoGeneradorController.php?opcion=GetOrganoGeneradorXid", {organoGenerador: organoGenerador}, function(data, status) 
    { 
        data = JSON.parse(data);
        $('#SECCION').val(data.seccion);
        $('#REPONSABLE_ORGANO').html(data.Usuario_Organo);
        $('#REPONSABLE_DEL_ARCHIVO').html(data.Usuario_Responsable);
    });
});


function guardaryeditar(e){  //Documento Adicional
    e.preventDefault();
    var formData = new FormData($("#ticket_form")[0]);
    if ($('#tick_descrip').summernote('isEmpty') || $('#tick_titulo').val()=='' || $('#cats_id').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos Vacios",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Aceptar",
                    value: true,
                    visible: true,
                    className: "btn btn-primary"
                }
            },
            closeOnClickOutside: false
        }).then((value) => {
            if (value) {
                swal.close();
            }
        });

    }else{
        var totalfiles = $('#fileElem')[0].files.length;
        for (var i = 0; i < totalfiles; i++) {
            formData.append("files[]", $('#fileElem')[0].files[i]);
        }

        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData, 
            contentType: false,
            processData: false,
            success: function(datos) {
                datos = JSON.parse(datos);
                console.log(datos[0].tick_id);

                $.post("../../controller/email.php?op=ticket_abierto",{tick_id : datos[0].tick_id},function(datos){

                });

                $('#tick_titulo').val('');
                $('#tick_descrip').summernote('reset');
                swal("Correcto!", "Registrado Correctamente", "success");
            }
        });
    }
}

var getUrlParameter = function getUrlParameter(sParam) 
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

init();

