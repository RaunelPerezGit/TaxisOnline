<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$correo=$_POST['correo'];
			$ncuenta=$_POST["ncuenta"];
			$password=sha1($_POST["password"]);
			$matricula=$_POST['matricula'];
			$modelo=$_POST["modelo"];
			$marca=$_POST["marca"];
			$vigencia=$_POST["vigencia"];
			$descripcion=$_POST["descripcion"];
			$tipoServicio=$_POST["tipoServicio"];
			$ciudad=$_POST["ciudad"];
			$poliza=$_POST["poliza"];
			$datos=array($nombre,$correo,$ncuenta,$password,$matricula,$modelo,$marca,$vigencia,$descripcion,$tipoServicio,$poliza,$ciudad);
			$usuario=new metodosUsuario();
			$usuario->registrarDuenioVehiculo($datos);
			//$usuario->listarUsuario();
		}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modalEditDuenioVehiculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">DUEÑO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="registrarDuenioVehiculo.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdDuenio">
 
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

										<div class="col-md-6 mb-3">
											<br>
											<label>Nombre:</label>
											<input type="text" class="form-control is-valid" name="nombre" placeholder="Nombre" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Contraseña:</label>
											<input type="password" class="form-control is-valid" name="password" placeholder="contraseña" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Correo:</label>
											<input type="Email" class="form-control is-valid" name="correo" placeholder="Correo" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>N° Cuenta:</label>
											<input type="text" class="form-control is-valid" name="ncuenta" placeholder="N° Cuenta" required="">
										</div>
										
										<div class="col-md-12 " style="padding-top: 40px; font-size: 18px;">
											<label>Datos de vehículo</label>		
										</div>

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