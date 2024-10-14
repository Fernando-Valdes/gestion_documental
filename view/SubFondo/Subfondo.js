var tabla;

function init()
{
    $("#Subfondo_form").on("submit",function(e)
    {
        guardaryeditar(e);	
    });
}


$(document).ready(function()
{     
    tabla=$('#Subfondo_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/subFondoController.php?opcion=GetSubFondos',
            type : "post",
            dataType : "json",						
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



function guardaryeditar(e)
{ 
    e.preventDefault();
	var formData = new FormData($("#Subfondo_form")[0]);

    $.ajax({
        url: "../../controller/subFondoController.php?opcion=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response)
        {
            
            $('#Subfondo_form')[0].reset();
            $("#ModalSubFondo").modal('hide');
            $('#Subfondo_data').DataTable().ajax.reload();

            swal({
                title: "¡Gestión Documental!",
                text: "Guardado con éxito.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        },
        error: function(xhr, status, error) 
        {
            swal({
                title: "Error de comunicación!",
                text: "No se pudo conectar con el servidor.",
                type: "error",
                confirmButtonClass: "btn-danger"
            });
        }
    });
}


function editar(id_SubFondo)
{   
    $('#Subfondo_form')[0].reset();
    $('#mdltitulo').html('Editar los datos del SubFondo'); 

    $.post("../../controller/fondoController.php?opcion=GetFondoComboBox", function(data, status) 
    {
        $('#FONDO').html(data);
    });

    $.post("../../controller/subFondoController.php?opcion=GetSubFondoXid", {id_SubFondo : id_SubFondo}, function (data) 
    {
        data = JSON.parse(data);
        $('#id_SubFondo').val(data.id_subfondo);
        $('#Clave').val(data.clave_subfondo);
        $('#SubFondo').val(data.subfondo);
        $('#FONDO').val(data.fk_fondo).trigger('change');
    }); 

    $('#ModalSubFondo').modal('show');
}


function Desactivar(id_SubFondo)
{   
    swal({
        title: "Gestión Documental",
        text: "¿Esta seguro que desea desactivar el SubFondo seleccionado?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm)
    {  
        if (isConfirm) 
            {
            $.post("../../controller/subFondoController.php?opcion=DesactivarSubFondo", {id_SubFondo : id_SubFondo}, function (data) 
            {

            }); 

            $('#Subfondo_data').DataTable().ajax.reload();	

            swal({
                title: "Gestión Documental",
                text: "SubFondo desactivado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}


function Activar(id_SubFondo)
{   
    swal({
        title: "Gestión Documental",
        text: "¿Esta seguro que desea Activar el SubFondo seleccionado?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm)
    {  
        if (isConfirm) 
            {
            $.post("../../controller/subFondoController.php?opcion=ActivarSubFondo", {id_SubFondo : id_SubFondo}, function (data) 
            {

            }); 

            $('#Subfondo_data').DataTable().ajax.reload();	

            swal({
                title: "Gestión Documental",
                text: "SubFondo activado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}


$(document).on("click","#btnnuevoSubFondo", function()
{ 
    $('#Subfondo_form')[0].reset();
    $('#mdltitulo').html('AGREGAR SUBFONDO'); 
    $('#ModalSubFondo').modal('show');

    $.post("../../controller/fondoController.php?opcion=GetFondoComboBox", function(data, status) 
    {
        $('#FONDO').html(data);
    });
});



$(document).on("click","#btnEmpleadoSiga", function()
{ 
    $('#mdltituloModaEmpleados').html('Lista de Empleados Activos en SIGA');
    $('#modalnuevo').modal('hide');
    $('#modalUsuariosSIGA').modal('show');


    tablaUserSIGA=$('#usuario_dataModal').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                ],
        "ajax":{
            url: '../../controller/usuarioController.php?opcion=obtener_Todos_Empleados_SIGA',
            type : "post",
            dataType : "json",						
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

    $('#modalnuevo').modal('show');
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