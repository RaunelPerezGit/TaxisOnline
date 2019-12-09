<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
			$nombreusu=$_POST['nombreusu'];
			$apellidos=$_POST["apellidos"];
			$password=sha1($_POST['passwd']);//encriptacion de la contraseña
			$telefono=$_POST["telefono"];
			$correo=$_POST["correo"];
			$numero=$_POST["numero"];
			$institucion=$_POST["institucion"];
			$pin=$_POST["pin"];
			$vigencia=$_POST["vigencia"];
			$titular=$_POST["titular"];
			$datos=array($nombre,$nombreusu,$apellidos,$password,$telefono,$correo,$numero,$institucion,$pin,$vigencia,$titular);
			$usuario=new metodosUsuario();
			$usuario->registrarClienteTarjeta($datos);
			//$usuario->listarUsuario();
		}

?>



<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modalEditClienteTarjeta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">CLIENTE</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="registrarClienteTarjeta.php" method="POST">
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
											<label>Apellidos:</label>
											<input type="text" class="form-control is-valid" name="apellidos" placeholder="Apellidos" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Teléfono:</label>
											<input type="text" class="form-control is-valid" name="telefono" placeholder="Teléfono" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Correo:</label>
											<input type="e-mail" class="form-control is-valid" name="correo" placeholder="Correo" required="">
										</div>

										<div class="col-md-6 mb-3">
											<br>
											<label>Nombre de usuario:</label>
											<input type="text" class="form-control is-valid" name="nombreusu" placeholder="Nombre Usuario" required="">
										</div>
										<div class="col-md-6 mb-3">
											<br>
											<label>Contraseña:</label>
											<input type="password" class="form-control is-valid" name="passwd" placeholder="Contraseña" required="">
										</div>

										<div class="col-md-12 " style="padding-top: 40px; font-size: 18px;">
											<label>Datos de tarjeta</label>		
										</div>

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
										<div class="col-sm-offset-2  col-md-4 mb-3">
											<br>
											<label>PIN:</label>
											<input type="password" class="form-control is-valid" name="pin" placeholder="PIN" required="">	
										</div>
										<div class="col-md-4 mb-3">
											<br>
											<label>Vigencia:</label>
											<input type="text" class="form-control is-valid" name="vigencia" placeholder="Vigencia" required="">
										</div>
										<div class="col-md-12 mb-3">
											<br>
											<label>Titular:</label>
											<input type="text" class="form-control is-valid" name="titular" placeholder="Titular" required="">
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