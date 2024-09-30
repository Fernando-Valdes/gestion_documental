var fondo;
var subfondo;

function init()
{

}

$(document).ready(function() 
{

    $.post("../../controller/catalogoController.php?opcion=get_fondo",function(data, status)
    {
        $('#FONDO').html(data);
        fondo = $('#FONDO').val();
    });

    $.post("../../controller/catalogoController.php?opcion=get_subfondo",{fondo : fondo},function(data, status)
    {
        $('#SUB-FONDO').html(data);
        console.log(data);
    });

    $.post("../../controller/catalogoController.php?opcion=get_OrganoXsubfondo",{subfondo : subfondo},function(data, status)
    {
        $('#ORGANO_GENERADOR').html(data);
        console.log(data);
    });


    $("#FONDO").change(function()
    {
        id_subfondo = $(this).val();

        $.post("../../controller/catalogoController.php?opcion=get_subfondo",{id_subfondo : id_subfondo},function(data, status)
        {
            $('#SUB-FONDO').html(data);
            console.log(data);
        });
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



