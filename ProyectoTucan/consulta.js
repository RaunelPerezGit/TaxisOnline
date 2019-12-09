$(buscar_datos());
$(buscar_datosDuenio());
$(buscar_datosConductor());
$(buscar_datosAseguradora());

function buscar_datos(consulta){
	$.ajax({
		url:'buscarCliente.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosCliente').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarCliente', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datos(valor);
	} else {
		buscar_datos();
	}
});

$(document).on('click','#eliminar', function(){
	if (confirm('¿Está seguro que desea eliminar este registro?')) {
		var telefono_cli=$(this).data('telefono_cli');
		$.ajax({
			url:'eliminarCliente.php',
			type:'POST',
			data:{telefono_cli:telefono_cli},
			success: function(data){
				buscar_datos();
				alert(data);
			}
		})

		
	};
});


////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////// /////BUSCAR DUENIO///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function buscar_datosDuenio(consulta){
	$.ajax({
		url:'buscarDuenio.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosDuenio').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarDuenio', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datosDuenio(valor);
	} else {
		buscar_datosDuenio();
	}
});

//////////////////////////////////////////////////////////////////////////////////
////////////////////////TERMINA DUENIO///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////7
///////////////////////CREAR TABLA TARJETA///////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////

/*function buscar_tarjeta(consultaTar){
	$.ajax({
		url:'buscarTarjeta.php',
		type:'POST',
		dataType:'html',
		data:{consultaTar:consultaTar},
	})
	.done(function(respuesta1){
		$('#datosTarjeta').html(respuesta1);
	})
	.fail(function () {
		console.log('error');
	})
}*/


$(document).on('click','#modificarCliente', function(){
		var telefono_cli=$(this).data('telefono_cli');
		$.ajax({
			url:'buscarTarjeta.php',
			type:'POST',
			dataType:'html',
			data:{telefono_cli:telefono_cli},
		})
		.done(function(respuesta){
		$('#datosTarjeta').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})

		

});
//////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////Fin de la creacio de la tabla tarjeta/////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////CREAR TABLA VEHÍCULOS/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
$(document).on('click','#modificarDue', function(){
		var mail_due=$(this).data('mail_due');
		$.ajax({
			url:'buscarVehiculo.php',
			type:'POST',
			dataType:'html',
			data:{mail_due:mail_due},
		})
		.done(function(respuesta){
		$('#datosVehiculo').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})
});
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////TERMINA TABLA VEHÍCULOS//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////




/////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////CREAR TABLA CONDUCTORES/////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////
function buscar_datosConductor(consulta){
	$.ajax({
		url:'buscarConductor.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosConductor').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarConductor', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datos(valor);
	} else {
		buscar_datos();
	}
});
////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////TERMINA TABLA CONDUCTORES//////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////




////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////
//////////////// /////BUSCAR ASEGURADORA///////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////
function buscar_datosAseguradora(consulta){
	$.ajax({
		url:'buscarAseguradora.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosAseguradora').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}
$(document).on('keyup','#cajaBuscarAseguradora', function(){
	var valor=$(this).val();
	if (valor!="") {
		buscar_datosAseguradora(valor);
	} else {
		buscar_datosAseguradora();
	}
});



$(document).on('click','#modificarAseguradora', function(){
		var tel_ase=$(this).data('tel_ase');
		$.ajax({
			url:'buscarPoliza.php',
			type:'POST',
			dataType:'html',
			data:{tel_ase:tel_ase},
		})
		.done(function(respuesta){
		$('#datosPoliza').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})

		

});

//////////////////////////////////////////////////////////////////////////////////
////////////////////////TERMINA ASEGURADORA///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////
////////////////////////INICIA TARIFA///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////
$(document).on('click','#IdTarifa', function(){
		$.ajax({
			url:'buscarTarifa.php',
			type:'POST',
			dataType:'html',
		})
		.done(function(respuesta){
		$('#datosTarifa').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})

});
//////////////////////////////////////////////////////////////////////////////////
////////////////////////TERMINA TARIFA///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////


function listarViajes(consulta){
	$.ajax({
		url:'consultaViaje.php',
		type:'POST',
		dataType:'html',
		data:{consulta:consulta},
	})
	.done(function(respuesta){
		$('#datosViaje').html(respuesta);
	})
	.fail(function () {
		console.log('error');
	})
}





//////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////LISTAR VEHICULO-CONDUCTOR/////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////


$(document).on('click','#elegirVehiculo', function(){
	    var origen=document.getElementById("origin").value;
		$.ajax({
			url:'bucarConductorVehiculo.php',
			type:'POST',
			dataType:'html',
			data:{origen:origen},
		})
		.done(function(respuesta){
		$('#datosconductorVehiculo').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})

});


//////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////TERMINA LISTA DE VEHICULO-CONDUCTOR/////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////

$(document).on('click','#ElegirVehiculo', function(){
		var matricula_veh=$(this).data('matricula_veh');
		alert(matricula_veh);
		$.ajax({
			url:'buscarConductorVehiculo.php',
			type:'POST',
			dataType:'html',
			data:{matricula_veh:matricula_veh},
		})
		.done(function(respuesta){
			document.getElementById('vehiculoConductor').value=respuesta;
			alert(respuesta);
		//$('#datosTarjeta').html(respuesta);
		})
		.fail(function () {
			console.log('error');
		})

		

});
//////////////////////////////////////////////////////////////////////


/////////////////////////////////////////////////////////////////////
$(document).on('click','#verruta',function(){

	var cve_via=$(this).data('cve_via');
	$.ajax({
		url:'consultaViaje.php',
		type:'POST',
		dataType:'html',
		data:{cve_via:cve_via},
		success:function(data){
			//alert(data);
			$('#mapa').html(data);
		}
	})
});
/////////////////////////////////////////////////////////////////////



$(document).on('click','#cambiarruta',function(){

	var cve_via=$(this).data('cve_via');
	$.ajax({
		url:'modificarRuta.php',
		type:'POST',
		dataType:'html',
		data:{cve_via:cve_via},
		success:function(data){
			//alert(data);
			document.getElementById('viaje').value=cve_via;
		}
	})
});



$(document).on('click','#iniciarviaje',function(){

	var cve_via=$(this).data('cve_via');
	alert(cve_via);
	$.ajax({
		url:'buscarIniciarviaje.php',
		type:'POST',
		dataType:'html',
		data:{cve_via:cve_via},
	})
});


$(document).on('click','#terminarviaje',function(){

	var cve_via=$(this).data('cve_via');
	alert(cve_via);
	$.ajax({
		url:'buscarTerminarviaje.php',
		type:'POST',
		dataType:'html',
		data:{cve_via:cve_via},
	})
});



getPersona = function(nombre){
	//var nombre="isaac";
	$('#nombre').val(nombre);
	//$('#apellidos').val(app);
	//$('#telefono').val(telefono);
	//$('#correo').val(correo);
  // $('#mcboOtro value(3)').prop('selected', true);
  //$('[name=mcboOtro]').val(7);
  
};