var tabla;
var tablaUserSIGA;

function init()
{
    $("#usuario_form").on("submit",function(e)
    {
        guardaryeditar(e);	
    });
}


$(document).ready(function()
{     
    tabla=$('#usuario_data').dataTable({
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
            url: '../../controller/usuarioController.php?opcion=get_TodosLosUsuarios',
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
        success: function(response)
        {
            var result = JSON.parse(response);

            if (result.status === "success") 
            {  
                $('#usuario_form')[0].reset();
                $("#modalnuevo").modal('hide');
                $('#usuario_data').DataTable().ajax.reload();

                swal({
                    title: "¡Gestión Documental!",
                    text: "Guardado con éxito.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            } else if (result.status === "error") 
            { 
                swal({
                    title: "Error!",
                    text:"¡Esta persona ya se encuentra registrada en el sistema!.",
                    type: "error",
                    confirmButtonClass: "btn-danger"
                });
            }
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

//Desactivar usuario
function Desactivar(enlace)
{   
    swal({
        title: "Gestión Documental",
        text: "¿Esta seguro que desea desactivar el usuario seleccionado?",
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
            $.post("../../controller/usuarioController.php?opcion=DesactivarUsuario", {enlace : enlace}, function (data) 
            {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            swal({
                title: "Gestión Documental",
                text: "Usuario desactivado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//Activar Usuario
function Activar(enlace)
{   
    swal({
        title: "Gestión Documental",
        text: "¿Esta seguro que desea Activar el usuario seleccionado?",
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
            $.post("../../controller/usuarioController.php?opcion=ActivarUsuario", {enlace : enlace}, function (data) 
            {

            }); 

            $('#usuario_data').DataTable().ajax.reload();	

            swal({
                title: "Gestión Documental",
                text: "Usuario activado",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
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


//Modal Usuarios en Siga
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


//Funcion al seleccionar una persona del modal Empleados SIGA
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