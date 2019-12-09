
<?php

	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
		if(isset($_POST['destino'])){
			$destino=$_POST['destino'];
			$viaje=$_POST['viaje'];
			$usuario=new metodosUsuario();
			$result=$usuario->getOrigen($viaje);
			$result->data_seek(0);
			$fila=$result->fetch_assoc();
			$origen=$fila['puntoini_via'];


			$url = "http://maps.googleapis.com/maps/api/directions/json?origin=$origen&destination=$destino&sensor=false&mode=driving";
			$jsonData = file_get_contents($url);
			$data = json_decode($jsonData);
			$d=$data->{"geocoded_waypoints"};
			$distancia=$data->{"routes"}[0]->{"legs"}[0]->{"distance"}->{"text"};
			$latIni=$data->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lat"};
			$lonIni=$data->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lng"};
			$latFin=$data->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lat"};
			$lonFin=$data->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lng"};
			$tiempo=$data->{"routes"}[0]->{"legs"}[0]->{"duration"}->{"text"};
			$vector=array($viaje,$destino,$latFin,$lonFin,$latIni,$lonFin,$distancia,$tiempo);

			$usuario->modifyRuta($vector);
			//$usuario->listarUsuario();
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

</head>
<body>


<div class="modal fade" id="modificarRuta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">

      <div class="modal-header bg-blue" style="background: #334252; border-radius: 4px; height: 70px;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel" style="color: white; font-size: 20px;">Modifica la ruta</h4>
      </div>

      <div class="modal-body">
	      <form class="form-horizontal" action="modificarRuta.php" method="POST">
	      	<!-- parametros ocultos -->
	      	<input type="hidden" id="mhdnIdTarifa">
 
					<div class="box-body">
				        <div class="form-group col-md-12 mb-3">

										<div class="col-md-12 mb-3">
											<br>
											<label>Cambio de ruta al destino:</label>
											<input type="text" class="form-control is-valid" name="destino" placeholder="Ruta" required="">
										</div>

										<div class="col-md-12 mb-3">
											
											<label>Viaje:</label>
											<input type="text" class="form-control is-valid" name="viaje" placeholder="" id="viaje" required="">
										</div>
											
										
						</div>

				        <div class="modal-footer">
				        	<br>
				        	<button type="submit" id="IdTarifa" class="btn btn-primary">Aceptar</button>
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