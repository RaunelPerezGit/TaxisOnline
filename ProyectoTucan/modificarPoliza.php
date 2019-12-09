<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['tipoSeguro'])){
			$tiposeg=$_POST["tipoSeguro"];
			$descripcion=$_POST["descripcion"];
			$periodo=$_POST["periodo"];
			$monto=$_POST["monto"];
			$datos=array($tiposeg,$descripcion,$periodo,$monto);
			$usuario=new metodosUsuario();
			$usuario->actualizarPoliza($datos);
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
	      <form class="form-horizontal" action="modificarPoliza.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdUsuario">
	      	
			<div class="box-body">
		        <div class="form-group col-md-12 mb-3">


								<div class="col-md-6 mb-3">
									<br>
									<label>Número:</label>
									<input type="text" class="form-control is-valid" name="numero" placeholder="Número" required="">
								</div>
								<div></div>
								<div class="col-md-6 mb-3">
									<br>
									<label>Institución:</label>
									<input type="text" class="form-control is-valid" name="institucion" placeholder="Institución:" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>PIN:</label>
									<input type="password" class="form-control is-valid" name="pin" placeholder="PIN" required="">	
								</div>
								<div class="col-md-8 mb-3">
									<br>
									<label>Vigencia:</label>
									<input type="text" class="form-control is-valid" name="vigencia" placeholder="Vigencia" required="">
								</div>
								<div class="col-md-4 mb-3">
									<br>
									<label>Titular:</label>
									<input type="text" class="form-control is-valid" name="titular" placeholder="Titular" required="">
								</div>

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