<?php  
	
	// session_start();

	require('../clases/Persona.class.php');

	$Persona = new Persona();

	$action = $_POST['action'];

	if(isset($_POST['info']))
		$info = $_POST['info'];

	switch ($action) {
		case 'read':
			echo json_encode($Persona->read($info));
			break;
		case 'busqueda':
			echo json_encode($Persona->busqueda($info));
			break;
		case 'insertar':
			echo json_encode($Persona->insertar($info));
			break;
		case 'desactivar':
			echo json_encode($Persona->desactivar($info));
			break;
		case 'reactivar':
			echo json_encode($Persona->reactivar($info));
			break;
		case 'modificar':
			echo json_encode($Persona->modificar($info));
			break;
		case 'extraer':
			//var_dump($info);
			echo json_encode($Persona->usuarioSeleccionado($info));
			break;
	}
	
?>