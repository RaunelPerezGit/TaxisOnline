<?php

	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');	
	if(isset($_POST["buscar"])){
		$numero=$_POST['buscar'];
		$usuario=new metodosUsuario();
		$result=$usuario->buscarUsuario($numero);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
	}else{
		if (isset($_POST["origen"])) {
	$tiposer=$_POST["tipoviaje"];
	$direccion1=str_replace(" ", "%", $_POST["origen"]);
	$direccion2=str_replace(" ", "%", $_POST["destino"]);
	$vehiculox=$_POST["vehiculoConductor"];
	$mail=$_POST["mail"];
	//$auto=$_POST["autoS"];
	$url = "http://maps.googleapis.com/maps/api/directions/json?origin=$direccion1&destination=$direccion2&sensor=false&mode=driving";
	$jsonData   = file_get_contents($url);
	$data = json_decode($jsonData);
	$d=$data->{"geocoded_waypoints"};
	$distancia=$data->{"routes"}[0]->{"legs"}[0]->{"distance"}->{"text"};
	$latIni=$data->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lat"};
	$lonIni=$data->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lng"};
	$latFin=$data->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lat"};
	$lonFin=$data->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lng"};
	$tiempo=$data->{"routes"}[0]->{"legs"}[0]->{"duration"}->{"text"};

	echo "<script>alert($distancia);</script>";
	echo "<script>alert($tiempo);</script>";


	$datos=array($tiposer,$direccion1,$direccion2,$distancia,$vehiculox,$mail,$tiempo);
	$ruta=array($latIni,$lonIni,$latFin,$lonFin,$direccion1,$direccion2);
	$servicio=new  metodosUsuario();
	$servicio->registrarServicio($datos,$ruta);
	}

	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDmGswAT-Xp8SViDrXrt3ufrylpxhmfp0s & sensor=true"></script>
	<title></title>
</head>
<body style="background: #f9f9f9">
	<?php include("menu.php") ?>

<div class="col-sm-offset-0 col-sm-8">
<div class="col-sm-8" style="padding-top: 50px;">
	<div class="col-sm-12 col-m-4">
		<form class="form-inline" action="iniciarViaje.php" method="POST">
			<div class="col-sm-offset-0 col-sm-12">
			    <div class="form-group has-success has-feedback  col-sm-9">
			      <div class="col-sm-2 col-m-1">
				  <label class="control-label" for="inputGroupSuccess1" style="padding-top: 10px;">Usuario</label>
				  </div>
				  <div class="input-group col-sm-10 col-m-11">
				    <span class="input-group-addon">@</span>
				    <input type="text" class="form-control" id="inputGroupSuccess1" aria-describedby="inputGroupSuccess1Status" placeholder="(044)+" name="buscar">
				  </div>
			    </div>
			    <div class="col-sm-3">
			    	<button type="submit" class="btn btn-primary" name="buscarbtn">Buscar</button>
			    </div>
		  	</div>
		</form>
	</div>
</div>


	<div class="col-sm-offset-0 col-sm-12 " style=" padding-top: 50px;">
		<form action="iniciarViaje.php" method="POST">
		<?php if(isset($result)) {?>
		  <div class="form-group col-sm-6">
		    <label for="exampleInputEmail1">Dirección Email</label>
		    <input value="<?php echo $fila['correo_cli'] ?>" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="mail">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="exampleInputPassword1">Nombre</label>
		    <input value="<?php echo $fila['nom_cli'] ?>" type="text" name="nombre" class="form-control" id="exampleInputPassword1" placeholder="Nombre">
		  </div>
		<?php } else {?>
		<div class="form-group col-sm-6">
		    <label for="exampleInputEmail1">Dirección Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="mail">
		  </div>
		  <div class="form-group col-sm-6">
		    <label for="exampleInputPassword1">Nombre</label>
		    <input type="text" name="nombre" class="form-control" id="exampleInputPassword1" placeholder="Nombre">
		  </div>
		  <?php } ?>


		   <div class="form-group">
			<label style="font-size: 20px; padding-top: 30px;">Información del viaje</label>	
		  </div>

		  <div class="form-group">
		    <label for="exampleInputEmail1">Origen</label>
		    <input type="text" class="form-control" id="origin" placeholder="Punto de origen" name="origen">
		  </div>
		  <div class="form-group ">
		    <label for="exampleInputPassword1" >Destino</label>
		    <input type="text" class="form-control" id="destinous" placeholder="Punto de destino" name="destino">
		  </div>
		  <div class="form-group col-sm-12">
		  	<div class="form-group col-sm-offset-0 col-md-6">
				<label>Tipo de viaje</label>
				<select class="form-control form-control-sm"  name="tipoviaje">
				<option>Lujo</option>
				<option>Semilujo</option>
				</select>
		    </div>

		    <div class="form-group col-sm-offset-0 col-md-6">
				<label>Selecciona la fecha</label>
				<select class="form-control form-control-sm" name="fecha">
				<option>Ahora</option>
				<option><button type="submit" class="btn btn-default">Seleccionar una fecha</button></option>
				</select>
		  	</div>

		  	<div class="form-group " >
		  		 <div class="form-group col-sm-offset-0 col-md-12" style="padding-top: 40px;">
			  	<button type="button" aria-hidden="true" id='elegirVehiculo' data-toggle='modal' data-target='#modaleligeVehiculo' class='btn btn-default'>Elegir vehículo</button>
			  </div>

		    <label for="exampleInputPassword1" >Vehículo elegido</label>
		    <input type="text" class="form-control" id="vehiculoConductor" placeholder="" name="vehiculoConductor">
		  </div>

		  </div>
		  <div class="form-inline col-md-12" style="padding-top: 0px; padding-bottom: : 10px">
			  <div class="form-group col-md-3">
			  	<button type="submit" class="btn btn-default" style="width: 135px; height: 45px;" name="iniciar">Pedir viaje</button>
			  </div>
			  
		  </div>
		 
		  
		</form>
	</div>
</div>

<!--<div class="col-sm-4" id="mapa" style="width: 450px; height: 450px; padding-top: 150px;"></div> -->

<script type="text/javascript">
	
			function pasarParametrosMapa(origen, destino){
				var a='"'+origen+'"';
				var b='"'+destino+'"';
				alert("a"+a+"b"+b);
				 var divMapa=document.getElementById('mapa');
            navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
            function fn_mal(){}
            alert("entre");
            function fn_ok(rta){
                var lat=rta.coords.latitude;
                var lon=rta.coords.longitude;
                alert("lat "+lat+"lon "+lon);
                var gLatLon=new google.maps.LatLng(lat,lon);
                var objConfig={
                    zoom:17,
                    center:gLatLon
                };
                var gMapa=new google.maps.Map(divMapa, objConfig);
                var objConfigMarker={
                    position:gLatLon,
                    map:gMapa,
                    title:'estoy aqui',
                    animation:google.maps.Animation.DROP,
                    draggable:true
                };
                var marker=new google.maps.Marker(objConfigMarker);
                marker.setMap(gMapa);
                var gCoder=new google.maps.Geocoder();
                var gDestino=new google.maps.Geocoder();
                var objInformation={
                    address:b
                    
                };
                var origen={
                	address:a
                	
                };
                gDestino.geocode(origen,fn_inicio);
                function fn_inicio(ori){
                	var coor=ori[0].geometry.location;
                	var marOrigen={
                		map:gMapa,
                		position:coor,
                		title:'zitacuaro',
                		animation:google.maps.Animation.DROP,
                		draggable:true
                	};
                	var markerOrigen=new google.maps.Marker(config);
                	markerOrigen.setMap(gMapa);
                }
                gCoder.geocode(objInformation, fn_coder);
                function fn_coder(datos){
                   var coordenadas= datos[0].geometry.location;
                   var config={
                       map:gMapa,
                       position:coordenadas,
                       title:'Garis',
                       animation:google.maps.Animation.DROP,
                       draggable:true
                   };
                    var gMarkerDV=new google.maps.Marker(config);
                    gMarkerDV.setMap(gMapa);



                }
                
                
                var objConfigDR={
                    map:gMapa,
                    draggable: true
                };
                var objConfigDS={
                    origin:origen.address,
                    destination:objInformation.address,
                    travelMode:google.maps.TravelMode.DRIVING
                };
                var ds=new google.maps.DirectionsService();
                var dr=new google.maps.DirectionsRenderer(objConfigDR);
                ds.route(objConfigDS, fnRutear);
                function fnRutear(resultados, status){
                    if(status=='OK'){
                        dr.setDirections(resultados);
                    }else{
                        //alert('Eroor'+status);
                    }
                }

               
			}
	}
           
        </script>


        <script type="text/javascript">


        	/*$(document).on('keyup','#origin', function(){
				var ori=$(this).val();
				if (ori!="") {
					$(document).on('keyup','#destinous', function(){
						var desti=$(this).val();
						if (desti!="") {
							pasarParametrosMapa(ori, desti);
							alert(ori+" "+desti);
						} else {
							pasarParametrosMapa(ori, desti);
						}
					});
				} else {
					pasarParametrosMapa(ori, desti);
				}
			});*/

			    function ver_ruta(){
        		var origen = document.getElementById('origin').value;
        		var destino = document.getElementById('destinous').value;
        		alert("  "+origen+"  "+destino)
        		pasarParametrosMapa(origen, destino);
        	}

        </script>
 	<?php include("modalElegirVehiculo.php") ?>

</body>
</html>