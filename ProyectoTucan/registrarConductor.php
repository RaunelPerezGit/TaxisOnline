<script type="text/javascript">
	navigator.geolocation.getCurrentPosition(funcion_ok, funcion_mal);
	function funcion_mal(){}
	function funcion_ok(ruta){
		var latitud=ruta.coords.latitude;
		var longitud=ruta.coords.longitude;
		document.cookie='latitud1='+ latitud;
		document.cookie='longitud1='+ longitud;
	}
</script>


<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$lat=$_COOKIE['latitud1'];
	$lon=$_COOKIE['longitud1'];
	$latlon=$lat.','.$lon;


	$url="http://maps.googleapis.com/maps/api/geocode/json?latlng=$latlon&sensor=true";

				$jsonData=file_get_contents($url);
				$data = json_decode($jsonData);
				$d=$data->{"results"};
				$lugar=$data->{"results"}[0]->{"formatted_address"};


		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$status=$_POST['status'];
			$tipo=$_POST['tipo'];
			$turno=$_POST["turno"];
			$password=sha1($_POST['password']);//encriptacion de la contraseña
			$telefono=$_POST["telefono"];
			$correo=$_POST["correo"];
			$apellidos=$_POST["apellidos"];
			$vehiculo=$_POST["vehiculo"];
			$datos=array($nombre,$status,$tipo,$turno,$password,$telefono,$correo,$apellidos,$vehiculo,$latlon,$lugar);
			$usuario=new metodosUsuario();
			$usuario->registrarConductor($datos);
			//$usuario->listarUsuario();
		}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modalEditConductor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">CONDUCTOR</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="registrarConductor.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdCliente">
 
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

										<div class="col-md-6 mb-3">
											<br>
											<label>Nombre:</label>
											<input type="text" class="form-control is-valid" name="nombre" placeholder="Nombre" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Apellidos:</label>
											<input type="text" class="form-control is-valid" name="apellidos" placeholder="Apellidos" required="">
										</div>
										<div></div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Status:</label>
										  <select class="form-control form-control-sm" name="status">
										  	<option>Activo</option>
										  	<option>Inactivo</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Tipo de conductor:</label>
										  <select class="form-control form-control-sm" name="tipo">
										  	<option>Fijo</option>
										  	<option>Suplente</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Turno:</label>
										  <select class="form-control form-control-sm" name="turno">
										  	<option>Matutino de 7:00AM a 3:00PM</option>
										  	<option>Vespertino de 3:00PM a 11:00PM</option>
										  	<option>Nocturno de 11:00PM a 7:00AM</option>
										  	<option>Mixto/Indefinido</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Teléfono:</label>
											<input type="text" class="form-control is-valid" name="telefono" placeholder="(044)+" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Correo:</label>
											<input type="Email" class="form-control is-valid" name="correo" placeholder="ejemplo@" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Contraseña:</label>
											<input type="password" class="form-control is-valid" name="password" placeholder="Contraseña" required="">
										</div>

										<div class="col-md-12 " style="padding-top: 40px; font-size: 18px;">
											<label>Asignar Vehículo</label>		
										</div>

										<div class="col-md-6 mb-3">
											<br>
											<label>Clave del vehículo:</label>
											<input type="text" class="form-control is-valid" name="vehiculo" placeholder="Vehículo" required="">
										</div>
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>

		  </form>
      </div>

      
    </div>
  </div>
</div>

</body>
</html>