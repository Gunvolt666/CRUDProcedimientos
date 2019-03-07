<?php  

	require_once('MySQL.class.php');

	Class Persona extends MySQL{
		public function evitarCache()
		{
			header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");//Aqui le decimos que expiro ya hace tiempo para que no lo precargue de una fecha reciente
			header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //su ultima modificacion para engañar al navegador(creo)
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");//No validar la cache ni en almacenamiento
			header("Cache-Control: post-check=0, pre-check=0", false);//para elementos post
			header("Pragma: no-cache");
		} 
		public function read($info){
			
			if ($info == 2) {
				$consulta = "SELECT id, CONCAT(primer_ap,' ',segundo_ap,' ',nombres) nombre, 
			                 direccion, telefono, IF(status = 1, 'Activo', 'Inactivo') status
			                 FROM personas"; 
			}
			else{
				$consulta = "SELECT id, CONCAT(primer_ap,' ',segundo_ap,' ',nombres) nombre, 
			                 direccion, telefono, IF(status = 1, 'Activo', 'Inactivo') status
			                 FROM personas WHERE status = $info"; 
			}

			return $this->query_row($consulta); 
		}
		public function insertar($info)
		{

			$primer_ap = $info['primer_ap'];
			$segundo_ap = $info['segundo_ap'];
			$nombres = $info['nombres'];
			$direccion = $info['direccion'];
			$telefono = $info['telefono'];
			
			$consulta = "INSERT INTO personas (primer_ap, segundo_ap, nombres, direccion, telefono, status) VALUES ('$primer_ap', '$segundo_ap', '$nombres', '$direccion', '$telefono', '1')";  
			$info = $consulta;
			

			return $this->query($consulta);
		}
		public function reactivar($info)
		{		
			$id = $info['id'];
			$update = "UPDATE personas SET status = 1 WHERE id = $id";
			$info = $this->query($update);
			return $info;
		}
		public function desactivar($info)
		{
			$id = $info['id'];
			$update = "UPDATE personas SET status = 0 WHERE id = $id";
			$info = $this->query($update);
			return $info;
		}
		public function modificar($info)
		{	$id = $info['id'];
			$hola ="hola";
			$primer_ap_m = $info['primer_ap_m'];
			$segundo_ap_m = $info['segundo_ap_m'];
			$nombres_m = $info['nombres_m'];
			$direccion_m = $info['direccion_m'];
			$telefono_m = $info['telefono_m'];
			
			$consulta = "UPDATE personas SET nombres = '$nombres_m', primer_ap = '$primer_ap_m', segundo_ap = '$segundo_ap_m', telefono = '$telefono_m', direccion = '$direccion_m' WHERE id = '$id'";
			

			$info = $this->query($consulta);
			return $info['id'];

		}
		public function usuarioSeleccionado($info)
		{
			$id = $info;	
			$select = "SELECT * FROM personas WHERE id = '$id'";
			$info = $this->query_assoc($select);

			return $info;
			//var_dump($info);
			
		}
		public function busqueda($info){
			$consulta = "SELECT id, CONCAT(primer_ap,' ',segundo_ap,' ',nombres) nombre, 
			             direccion, telefono, IF(status = 1, 'Activo', 'Inactivo') status
			             FROM personas 
			             WHERE nombres LIKE '%{$info}%' 
			             OR primer_ap LIKE '%{$info}%'
			             OR segundo_ap LIKE '%{$info}%'";

			             // echo $consulta; exit;

			return $this->query_row($consulta); 
		}

	}
	
?>