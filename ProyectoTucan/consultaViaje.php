<?php 
require_once('conexionTucan.php');
require_once('metodosUsuario.php');
if (isset($_POST['cve_via'])) {
	$id=$_POST['cve_via'];
	$usuario=new metodosUsuario();
	$ruta=$usuario->getRuta($id);
	$ruta->data_seek(0);
	$fila=$ruta->fetch_assoc();
	$lt1=$fila['lat1'];
	$ln1=$fila['lon1'];
	$lt2=$fila['lat2'];
	$ln2=$fila['lon2'];
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="container"  style="width: 100%; height:500px; " id="res">
	<div class="row" style="background:#F0F4F9;">
      <div style="width: 83%; height: 5px; overflow: auto;">
        <h5></h5>
      </div>
      <div  id="mapa" style="width: 85%; height:300px; margin-left: 15%; overflow: auto;" >
      </div>
	</div>
</div>
 

<script type="text/javascript">
            var x='<?php echo $lt2;?>';
            var y='<?php echo $ln2;?>';
            var w='<?php echo $lt1;?>';
            var z='<?php echo $ln1;?>';
            var divMapa=document.getElementById('mapa');
            navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
            function fn_mal(){}
            function fn_ok(rta){
                var lat=rta.coords.latitude;
                var lon=rta.coords.longitude;
                var gLatLon=new google.maps.LatLng(lat,lon);
                //dibujando el mapa
                var objConfig={
                    zoom:17,
                    center:gLatLon
                };
                var gMapa=new google.maps.Map(divMapa, objConfig);//instancia de un mapa para dibujar
                var longiLat=new google.maps.LatLng(w,z);
                var objConfigMarker={
                    position:longiLat,
                    map:gMapa,
                    title:'estoy aqui',
                    animation:google.maps.Animation.DROP,
                    draggable:true
                };
                //agregando el primer marcador
                var marker=new google.maps.Marker(objConfigMarker);
                marker.setMap(gMapa);
                var gCoder=new google.maps.Geocoder();
                
                var objInformation={
                    address:'la%palma%zitacuaro'
                };
                gCoder.geocode(objInformation, fn_coder);
                var coor=new google.maps.LatLng(x,y);
                function fn_coder(datos){
                   
                   var config={
                       map:gMapa,
                       position:coor,
                       title:'nada',
                       animation:google.maps.Animation.DROP,
                       draggable:true
                   };
                   //agregando el segundo marcador
                    var gMarkerDV=new google.maps.Marker(config);
                    gMarkerDV.setMap(gMapa);
                }
                var objConfigDR={
                    map:gMapa,
                    draggable:true
                };
                
                //transando la ruta de los dos marques aqui altermaos ok
                var objConfigDS={
                    origin:longiLat,
                    destination:coor,
                    travelMode:google.maps.TravelMode.DRIVING

                };
                var ds=new google.maps.DirectionsService();
                var dr=new google.maps.DirectionsRenderer(objConfigDR);
                ds.route(objConfigDS, fnRutear);
                function fnRutear(resultados, status){
                    if(status=='OK'){
                        dr.setDirections(resultados);
                    }else{
                        alert('Eroor'+status);
                    }
                }
            }
          
        </script>

	<script src="consulta.js"></script>

</body>
</html>

<?php 
	}else{
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAowxT1H-l2-olhAn_h-gwq6jSDxfbwQrg & sensor=true"></script>
</head>
<body>
	<?php include("menu.php") ?>
	<?php include("modificarCliente.php") ?>
	<?php include("modificarRuta.php") ?>
	
	<div class="col-sm-offset-5 col-sm-3">
			<h2>VIAJES</h2>
	</div>
	<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$usuario=new metodosUsuario();
	$usuario->listarViajes();
?>
	
	
	<div class="col-sm-12">
		<div  id="mapa" style="width: 100%; height:380px;  overflow: auto;" >
	      </div>
	 </div>


	
	
</body>
</html>

<?php 
	}
?>



