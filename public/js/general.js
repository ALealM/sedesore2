var URL = window.location.protocol + "//" + window.location.host + "/";

function notificacion(titulo, mensaje, tipo) {
    swal({title: titulo, text: mensaje, type: tipo, });
}

function notificacion_confirm(a, titulo, mensaje, tipo) {
    swal(
            {
                title: titulo,
                text: mensaje,
                type: tipo,
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Si",
                cancelButtonText: "No",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function (isConfirm) {
        if (isConfirm) {
            window.location.href = a.attr('href');
        } else {

        }
    }
    );
    return false;
}

function getLocalidad()
{
    var municipio = document.getElementById('id_municipio').value;
    $.get(URL + "getLocalidad", {'municipio': municipio}, function (respuesta) {
        $("#id_localidad > option").remove();
        $('#id_localidad').append('<option  value="">Seleccione localidad...</option>');
        $(respuesta).each(function (i, v) { // indice, valor
            $('#id_localidad').append('<option value="' + v.id + '">' + v.localidad + '</option>');
        })
    });
}

function validaDatos()
{
    var nombre = document.getElementById('nombre').value;
    var apPat = document.getElementById('apellido_paterno').value;
    var apMat = document.getElementById('apellido_materno').value;
    var email = document.getElementById('email').value;
    var curp = document.getElementById('curp').value;
    var responsable = document.getElementById('responsable').value;
    var id_municipio = document.getElementById('id_municipio').value;
    var id_localidad = document.getElementById('id_localidad').value;
    var domicilio = document.getElementById('domicilio').value;
    var facebook = document.getElementById('facebook').value;
    var telefono = document.getElementById('telefono').value;
    var cveElector = document.getElementById('cve_elector').value;
    var anio = document.getElementById('anio').value;
    var mes = document.getElementById('mes').value;
    var dia = document.getElementById('dia').value;

    if (nombre == '' || apPat == '' || apMat == '' || email == '' || curp == '' || responsable == '' || id_municipio == '' || id_localidad == '' || domicilio == '' || facebook == '' || telefono == '' || cveElector == '') {
        swal({
            title: "¡Advertencia!",
            text: "¡Todos los campos son obligatorios!",
            type: "warning"
        });
    } else {
        $.get(URL + "validaDatos", {'cveElector': cveElector, 'anio': anio, 'mes': mes, 'dia': dia}, function (respuesta) {
            if (respuesta.cantidad === 0) {
                $('#formValidar').submit();
            } else {
                console.log(respuesta);
            }
        });
    }
}

function listadoPers() {
    var nombre = document.getElementById('nombre').value;
    var apPat = document.getElementById('apellido_paterno').value;
    var apMat = document.getElementById('apellido_materno').value;
    var mun = document.getElementById('municipio').value;
    var cveElect = document.getElementById('clave_electoral').value;
    
    var tabla ='';
    $('#divBuscar').empty();
    
    $.get(URL + "listadoPersonal", {'nombre' : nombre, 'ap_pat' : apPat, 'ap_mat' : apMat, 'mun' : mun, 'cveElect' : cveElect}, function (respuesta) {
//            console.log(respuesta);
    tabla +=  '<hr><table class="table table-striped table-hover dataTable no-footer example" role="grid" aria-describedby="datatable-table_info" id="example1">'+
             '<thead style="background-color: #03A678; color: #ffffff; font-size:0.8em;">'+
             '<th>Nombre</th><th>Municipio</th><th>Domicilio</th><th>Fecha de nacimiento</th><th>Clave electoral</th></thead><tbody>';
                                                                                                
        $(respuesta.beneficiarios).each(function (i, v) { // indice, valor
            tabla += '<tr><td>'+v.nombre+' '+ v.ap_paterno+' '+ v.ap_materno+'</td>'
            +'<td>'+v.municipio+'</td>'
            +'<td>'+v.calle+' '+v.n_ext+' '+v.colonia+'</td>'
            +'<td>'+v.f_nac+'</td>';
            +'<td>'+v.clave_electoral+'</td>';
        });
        tabla += '</tbody></table>';
    $('#divBuscar').append(tabla);
    $(function () {            
            $("#example1").DataTable({
                "order": []
            });
        });
        $("body, html").animate({ 
        scrollTop: $('#divBuscar').offset().top 
    }, 600);
    });
}

function modalDatos(id) {
    var nombre = document.getElementById('nombre'+id).value;
    var domicilio = document.getElementById('domicilio'+id).value;
    var mun = document.getElementById('municipio'+id).value;
    var id_mun = document.getElementById('id_municipio'+id).value;
    var fecha_nac = document.getElementById('fecha_nacimiento'+id).value;
    var cveElect = document.getElementById('clave_electoral'+id).value;
        
    $('#nombre_').val(nombre);
    $('#fecha_nacimiento_').val(fecha_nac);
    $('#id_municipio_').val(id_mun);
    $('#id_padron_').val(id);
    $('#municipio_').val(mun);
    $('#clave_electoral_').val(cveElect);
    $('#domicilio_').val(domicilio);
    $('#datos').modal();
}

function guardaAud(id) {
    var llamada = $("input:checkbox[id='llamada" + id + "']:checked").val();
    if(llamada == 1)
        llamada =1;
    else
        llamada = 0;
    var contacto = $("input:checkbox[id='contacto" + id + "']:checked").val();
    if(contacto == 1)
        contacto =1;
    else
        contacto = 0;
    var carta = $("input:checkbox[id='carta" + id + "']:checked").val();
    if(carta == 1)
        carta =1;
    else
        carta = 0;
    var asistencia = $("input:checkbox[id='asistencia" + id + "']:checked").val();
    if(asistencia == 1)
        asistencia =1;
    else
        asistencia = 0;

    $.get(URL + "guardaAud", {'llamada' : llamada, 'carta' : carta, 'contacto' : contacto, 'asistencia' : asistencia, 'id':id}, function (respuesta) {
        swal({
            title: "¡Guardado exitoso!",
            text: "¡Registro guardado exitosamente!",
            type: "success"
        });
    });
}