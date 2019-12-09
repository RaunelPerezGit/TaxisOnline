<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['matricula'])){
			$matricula=$_POST['matricula'];
			$modelo=$_POST["modelo"];
			$marca=$_POST["marca"];
			$vigencia=$_POST["vigencia"];
			$descripcion=$_POST["descripcion"];
			$tipoServicio=$_POST["tipoServicio"];
			$ciudad=$_POST["ciudad"];
			$poliza=$_POST["poliza"];
			$datos=array($matricula,$modelo,$marca,$vigencia,$descripcion,$tipoServicio,$ciudad,$poliza);
			$usuario=new metodosUsuario();
			$usuario->actualizarVehiculo($datos);
			//$usuario->listarUsuario();
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="modal-body">
	      <form class="form-horizontal" action="modificarVehiculo.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">


								<div class="col-md-6 mb-3">
											<br>
											<label>Matrícula:</label>
											<input type="text" class="form-control is-valid" name="matricula" placeholder="Matrícula" required="">
										</div>
										<div></div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Modelo:</label>
											<input type="text" class="form-control is-valid" name="modelo" placeholder="Modelo:" required="">
										</div>
										<div class="col-sm-offset-0  col-md-6 mb-3">
											<br>
											<label>Marca:</label>
											<input type="text" class="form-control is-valid" name="marca" placeholder="Marca" required="">	
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Vigencia:</label>
											<input type="text" class="form-control is-valid" name="vigencia" placeholder="YYYY/MM/DD" required="">
										</div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Tipo de Servicio:</label>
										  <select class="form-control form-control-sm" name="tipoServicio">
										  	<option>Lujo</option>
										  	<option>Semilujo</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Ciudad:</label>
											<input type="text" class="form-control is-valid" name="ciudad" placeholder="Ciudad" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Póliza:</label>
											<input type="text" class="form-control is-valid" name="poliza" placeholder="Póliza" required="">
										</div>
										<div class="col-md-12 mb-3">
											<br>
											<label>Descripción:</label>
											<textarea class="form-control" rows="3" required="" name="descripcion"></textarea>
										</div>
										

							</div>

							<div class="col-sm-offset-0 col-md-12" id="datosTarjeta" style='padding-top: 80px'>
				
	                        </div>

							<script src="consulta.js"></script>

								

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