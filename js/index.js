$(document).ready(function(){

	// alert();
	// var info = {primer_ap: $('#primer_ap').val()};
	loadData();
	//insertPersona();
	// toast1("asdasdasd!", error, 8000, "success");
})

var error = "Ocurrió un error insesperado en el sitio, por favor intentelo mas tarde o pongase en contacto con su administrador.";
var success = "La accion se ralizó con exito";
var datosIncorrectos = "Datos incorrectos, vuelve a intentarlo.";

function loadData(){

	var filtro = $('#select_status').val();
	// console.log($('#select_status').val());

	$.ajax({
		url:'routes/routePersonas.php',
		type:'POST',
		data: {info: filtro, action: "read"},
		dataType:'JSON',
		beforeSend: function(){
			showSpinner();
		},
		error: function(error){
			console.log(error);
			toast1("Error!", error, 8000, "error");
			removeSpinner();
		},
		success: function(data){
			console.log(data);
			removeSpinner();

			if(data != ""){
				var headers = ["NO.", "NOMBRE", "DIRECCION", "TELEFONO", "ESTATUS", "OPCIONES"];
				jQueryTable("tableContainer", headers, data, 8, "450px", "Persona");
			  //jQueryTable(id_container, headers, data, LimitRow, maxHeight, NameFunc);
			}
			else{
				$('tbody').empty();
				toast1("Atencion!", "No hay clientes para mostrar", 8000, "error");
			}
		}
	});

}



function editPersona(id){
	
	
	//var info = { id: $('#id').val(),primer_ap: $('#primer_ap').val(), segundo_ap: $('#segundo_ap').val(), nombres: $('#nombres').val(), direccion: $('#direccion').val(), telefono: $('#telefono').val() };
	$.ajax({
		url: 'routes/routePersonas.php',
		type: 'POST',
		async: false,
		data: {info: id, action: "extraer"},
		dataType: 'JSON',
	
		error: function(error)
		{
			console.log(error);
			toast1("Error!", error, 8000, "error");
		},
		success: function(data)
		{
			toast1("Hey You!!!", "Usuario Extraido", 8000, "success");
			console.log(data);

			if (data.length > 0) 
			{
					$('#id').val(data[0].id);
					$('#primer_ap_m').val(data[0].primer_ap);
					$('#segundo_ap_m').val(data[0].segundo_ap);
					$('#nombres_m').val(data[0].nombres);
					
					$('#direccion_m').val(data[0].direccion);
					$('#telefono_m').val(data[0].telefono);
					
					console.log(data);
			}
			else
			{
				toast1("Danger!!","Algo anda mal", 8000, "error");
			}
		}
	});
}
	
$(document).on('click', '#btn_modificar', function(e)
{	
	var mensaje;
	var opcion = confirm("Estas seguro que quieres modificar este usuario?");
	var info = { id: $('#id').val(),primer_ap_m: $('#primer_ap_m').val(), segundo_ap_m: $('#segundo_ap_m').val(), nombres_m: $('#nombres_m').val(), direccion_m: $('#direccion_m').val(), telefono_m: $('#telefono_m').val() };
	$.ajax({
		url: 'routes/routePersonas.php',
		type: 'POST',
		async: false,
		data: {info: info, action: "modificar"},
		dataType: 'JSON',
		beforeSend: function()
		{
		
		},
		error: function(error)
		{
			console.log(error);
			toast1("Error!", error, 8000, "error");
		},
		success: function(data)
		{
			console.log(data);
			if (opcion == true) 

			{
				toast1("Hey You!!!", "Usuario Modificado ", 8000, "success");
				
				$('#modalModificar').modal('hide');
				loadData();
				if (data == true) 
			{

				
			}
			}
		
		}
	});
});

function deletePersona(id){
	
	var parametro = {id: id}
	var mensaje;
	var opcion = confirm("Va a dar de baja un usuario, desea continuar?");
	$.ajax({
		url:'routes/routePersonas.php',
		type: 'POST',
		async: false,
		data: {info: parametro, action:"desactivar"},
		dataType: 'JSON',
			beforSend: function()
		{
			
		},
		success: function(data)
		{
			if (opcion == true) 
			{
				if (data) 
			{
				
				toast1("Atencion!!", "Se a dado de baja este usuario", 8000, "Success");
				loadData();
			}
			}
			
			else{
				toast1("Atencion!", "Algo anda mal con la modificacion", 8000, "Error");
			}
		}
	});

}

function reactivaPersona(id)
{
	var mensaje;
	var opcion = confirm("Seguro que quieres reactivar este usuario");
	var parametro = {id:id}

	$.ajax({
		url: 'routes/routePersonas.php',
		type: 'POST',
		async: false,
		data: {info:parametro, action: "reactivar"},
		dataType: 'JSON',
		beforeSend: function()
		{
			
		},
		success: function(data)
		{
			if (opcion == true) 
			{
				if (data) 
			{
				
				toast1("Atención!!", "Se a modificado el registro a activo", 8000, "Success");
				loadData();
			}
			}
			
			else
			{
				toast1("DANGER", "Algo anda mal, revisa el codigo en la linea", 8000, "error");
			}
		}
	});
}

	 
$(document).on('click', '#btn_insertar', function(e){
		var opcion = confirm("Desea registrar? verifique que la informacion esta correcta");
		var info = {primer_ap: $('#primer_ap').val(), segundo_ap: $('#segundo_ap').val(), nombres: $('#nombres').val(), direccion: $('#direccion').val(), telefono: $('#telefono').val() };
		$.ajax({
			url:'routes/routePersonas.php',
			type:'POST',
			async: false,
			data: {info: info, action: "insertar"},
			dataType:'JSON',
			beforeSend: function(){
				// showSpinner();
			},
			error: function(error){
				console.log(error);
				toast1("Error!", error, 8000, "error");
				// removeSpinner();
			},
			success: function(data){
				console.log(data);
				// removeSpinner();

				if(data == true){
					toast1("ATENCION", "Usuario Registrado", 8000, "success");
					loadData();
					Limpieza();
					$('#exampleModal').modal('hide');
				}
				else{
					
					toast1("Atencion!", "Algo anda mal", 8000, "error");
				}
			}
		});
});

$(document).on('change', '#select_status', function(e){
	loadData();
});


$(document).on('keyup', '#txt_busqueda', function(e){
	$.ajax({
		url:'routes/routePersonas.php',
		type:'POST',
		async: false,
		data: {info: $(this).val(), action: "busqueda"},
		dataType:'JSON',
		beforeSend: function(){
			// showSpinner();
		},
		error: function(error){
			console.log(error);
			toast1("Error!", error, 8000, "error");
			// removeSpinner();
		},
		success: function(data){
			console.log(data);
			// removeSpinner();

			if(data != ""){
				var headers = ["NO.", "NOMBRE", "DIRECCION", "TELEFONO", "ESTATUS", "OPCIONES"];
				jQueryTable("tableContainer", headers, data, 8, "450px", "Persona");
			  //jQueryTable(id_container, headers, data, LimitRow, maxHeight, NameFunc);
			}
			else{
				$('tbody').empty();
				toast1("Atencion!", "No hay clientes para mostrar", 8000, "error");
			}
		}
	})
});



function Limpieza()
{
	document.getElementById("FormularioModificar").reset();
	document.getElementById("FormularioGuardar").reset();
}



//validaOnlyNumbers('txt_busqueda');