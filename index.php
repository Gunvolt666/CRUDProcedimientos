

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<!-- Meta, title, CSS, favicons, etc. -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">	<title>Estructura base</title>

	<meta http-equiv="Expires" content="0">
	  <meta http-equiv="Last-Modified" content="0">
	  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	  <meta http-equiv="Pragma" content="no-cache">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="css/animate.min.css" rel="stylesheet">
  	<link href="plugins/pnotify/pnotify.custom.min.css" rel="stylesheet">
  	<link href="plugins/CustomAlerts/css/jquery-confirm.css" rel="stylesheet">
  	<link href="css/spinner.css" rel="stylesheet">
  	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	

	<div class="container">
		<!-- <div class="row"> -->

			<div class="row">
				<h1>SODE 0.0.0</h1>
				<hr>
			</div>
			<div class="row" style="margin-bottom: 20px">
				<button class="btn btn-primary col-xs-4" data-toggle="modal" data-target="#exampleModal" id="btn_new">NUEVA PERSONA</button>
				<div class="col-xs-4 form-group">
					<select name="" id="select_status" class="form-control">
						<option value="2">TODOS</option>
						<option value="1">ACTIVOS</option>
						<option value="0">INACTIVOS</option>
					</select>
				</div>
				<div class="col-xs-4 form-group">
					<input type="text" class="form-control" id="txt_busqueda" placeholder="busqueda...">
				</div>
			</div>
			<div id="tableContainer" class="table-responsive row">

				<table class="table table-striped table-bordered">
					<thead id="thead">
					</thead>
					<tbody id="tbody">
					</tbody>
				</table>

            </div>
		<!-- </div> -->
	</div>
	<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form id="FormularioGuardar" >
         <div class="modal-body">
        <div class="row">

        <div class="col-lg-7">
        <label>Primer Apellido</label>
        <input required="" maxlength="9" class="form-control" type="text" id="primer_ap" name="primer_ap "  >
      </div>

      <div class="col-lg-7">
        <label>Segundo Apellido</label>
        <input required="" maxlength="9" class="form-control" type="text" id="segundo_ap" name="segundo_ap "  >
      </div>
      <div class="col-lg-7">
        <label>Nombres</label>
        <input required="" maxlength="25" class="form-control" type="text" id="nombres" name="nombres "  >
      </div>
      <div class="col-lg-7">
        <label>Direccion</label>
        <input required="" class="form-control" type="text" id="direccion" name="direccion"  >
      </div>
      <div class="col-lg-7">
        <label>Telefono</label>
        <input required="" maxlength="10" class="form-control" type="text" id="telefono" name="telefono "  >
      </div>
     
      </div>
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btn_insertar" onclick="Limpieza()" type="button" class="btn btn-primary">Guardar Registro</button>
      </div>
      </form>

     
    </div>
  </div>
</div>




<div class="modal fade" id="modificarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Registro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="FormularioModificar" >
        <div class="modal-body">
        <label>Primer Apellido</label>
        <input maxlength="10" type="text" id="primer_ap_m" name="primer_ap_m  ">
      </div>

      <div class="modal-body">
        <label>Segundo Apellido</label>
        <input maxlength="10" type="text" id="segundo_ap_m" name="segundo_ap_m  ">
      </div>
      <div class="modal-body">
        <label>Nombres</label>
        <input maxlength="30" type="text" id="nombres_m" name="nombres_m  ">
      </div>
      <div class="modal-body">
        <label>Direccion</label>
        <input  type="text" id="direccion_m" name="direccion_m">
      </div>
      <div class="modal-body">
        <label>Telefono</label>
        <input maxlength="10" type="text" id="telefono_m" name="telefono_m  ">
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button id="btn_modificar" onclick="Limpieza()"  type="button" class="btn btn-primary">Guardar Cambios</button>
      </div>
      </form>
      
    </div>
  </div>
</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script src="js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="plugins/pnotify/pnotify.custom.min.js"></script>
	<script src="js/main.js"></script>
	<script src="plugins/CustomAlerts/js/jquery-confirm.js"></script>
	<script src="js/jQueryTables.js"></script>
	<script src="js/spinner.js"></script>
	<script src="js/index.js"></script>
</body>
</html>