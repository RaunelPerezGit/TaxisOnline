<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$telefono=$_POST['telefono'];
			$mail=$_POST["mail"];
			$ncuenta=$_POST['cuenta'];
			$infoextra=$_POST["info"];
			$tiposeg=$_POST["tipoSeguro"];
			$descripcion=$_POST["descripcion"];
			$periodo=$_POST["periodo"];
			$monto=$_POST["monto"];
			$datos=array($nombre,$telefono,$mail,$ncuenta,$infoextra,$tiposeg,$descripcion,$periodo,$monto);
			$usuario=new metodosUsuario();
			$usuario->registrarAseguradora($datos);
			//$usuario->listarUsuario();
		}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modalInsertAseguradora" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">ASEGURADORA</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="registrarAseguradora.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdCliente">
 
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

										<div class="col-md-6 mb-3">
											<br>
											<label>Nombre:</label>
											<input type="text" class="form-control is-valid" name="nombre" placeholder="Nombre" required="">
										</div>
										<div></div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Teléfono:</label>
											<input type="text" class="form-control is-valid" name="telefono" placeholder="(044)+" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Mail:</label>
											<input type="Email" class="form-control is-valid" name="mail" placeholder="ejemplo@" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>N° Cuenta:</label>
											<input type="e-mail" class="form-control is-valid" name="cuenta" placeholder="N Cuenta" required="">
										</div>

										<div class="col-md-12 mb-3">
											<br>
											<label>Info. Extra:</label>
											<textarea class="form-control" rows="3" required="" name="info"></textarea>
										</div>

										<div class="col-md-12 " style="padding-top: 40px; font-size: 18px;">
											<label>Póliza</label>		
										</div>

										<div class="col-md-6 mb-3">
										  <br>
										  <label>Tipo de seguro:</label>
										  <select class="form-control form-control-sm" name="tipoSeguro">
										  	<option>Univehícular</option>
										  	<option>Multivehículo</option>
										  	<option>De pasajeros</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
										  <br>
										  <label>Periodo de pago:</label>
										  <select class="form-control form-control-sm" name="periodo">
										  	<option>Mensual</option>
										  	<option>Semestral</option>
										  	<option>Anual</option>
										  </select>
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Monto:</label>
											<input type="text" class="form-control is-valid" name="monto" placeholder="$ 0.00" required="">
										</div>
										<div class="col-md-12 mb-3">
											<br>
											<label>Descripción de póliza:</label>
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