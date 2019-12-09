<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$correo=$_POST['correo'];
			$ncuenta=$_POST["ncuenta"];
			$password=sha1($_POST["password"]);
			$datos=array($nombre,$correo,$ncuenta,$password);
			$usuario=new metodosUsuario();
			$usuario->actualizarDuenio($datos);
			//$usuario->listarUsuario();
		}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>
<div class="modal fade" id="modalEditDuenio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">DUEÑO</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="modificarDuenio.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdCliente">

	    <div role="tabpanel">
	      	<ul class="nav nav-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#tab1" aria-controls="tab1" data-toggle="tab" role="tab" >Dueño</a></li>
			  <li role="presentation"><a href="#tab2" aria-controls="tab2" data-toggle="tab" role="tab" >Vehículo</a></li>
			</ul>
	      	
	      	<div class="tab-content"> 
		      	<div role="tabpanel" class="tab-pane active" id="tab1">
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
										
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="tab2">
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

				        				<div class="col-sm-offset-4 col-sm-4" style="padding-top: 30px;">
											<button style="width: 200px; font-size: 18px;" type="button" class="btn btn-success btn-lg active fa fa-plus-square" aria-hidden="true" id='agregarVehiculo' data-toggle='modal' data-target='#modalEditVehiculo' class='btn btn-success'> Agregar Vehículo</button>
										</div>
										

										<div class="col-sm-offset-0 col-md-12" id="datosVehiculo" style='padding-top: 30px'>
				
	                        			</div>
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" class="btn btn-primary">Aceptar</button>
				        	<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					    </div>
					</div>
				</div>

			</div>
		</div>
		  </form>
      </div>

      
    </div>
  </div>
</div>


<div style="padding-top: 80px;" class="modal fade" id="modalEditVehiculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">VEHÍCULO</h4>
      </div>

<?php include("modificarVehiculo.php") ?>
</div>
</div>
</div>

</body>
</html>