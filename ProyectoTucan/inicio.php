<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript"
    src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDmGswAT-Xp8SViDrXrt3ufrylpxhmfp0s & sensor=true"></script>

	<title></title>
</head>
<body>
	<?php include("menu.php") ?>

	<div class="col-sm-offset-0 col-sm-12">
		<form class="form-horizontal" style="">
		  <div class="form-group">
		    <label for="inputEmail3" class="col-sm-1 control-label">Partida</label>
		    <div class="col-sm-3">
		      <input type="email" class="form-control" id="origen" placeholder="Punto de partida">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="inputPassword3" class="col-sm-1 control-label">Destino</label>
		    <div class="col-sm-3">
		      <input type="text" class="form-control" id="destino" placeholder="Punto de destino">
		    </div>
		    <div class="col-sm-2">
		    	<button type="submit" class="btn btn-default">Calcular <i class="fa fa-sign-in" aria-hidden="true"></i></button>
		    </div>
		  </div>
		</form>
	</div>
<div class="col-sm-12">
	<div id="mapa" style="border- margin-top:900px; margin-left:20px; width: 97%; height:500px; float: left; position: relative;">

        <!-- Grey navigation panel -->
    </div>
</div>

<script type="text/javascript">

            var divMapa=document.getElementById('mapa');
            navigator.geolocation.getCurrentPosition(fn_ok, fn_mal);
            function fn_mal(){}
            function fn_ok(rta){

                
                


                var lat=rta.coords.latitude;
                var lon=rta.coords.longitude;
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
                var objInformation={
                    address:'Garis, Zitácuaro Centro, Av. Revolución Sur 70Mariano Matamoros'
                };
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
                    origin:gLatLon,
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
                        alert('Eroor'+status);
                    }
                }

                /*alert(objConfigDS.destination);*/
                var x=objConfigDS.destination;
                alert(x.lat());
                var lat2=0;
                var lon2=0;

               
                Distancia = Dist(lat, lon, lat2, lon2);   
                alert(Distancia);
                function Dist(lat, lon, lat2, lon2)
                  {
                  rad = function(x) {return x*Math.PI/180;}

                  var R     = 6378.137;                          
                  var dLat  = rad( lat2 - lat );
                  var dLong = rad( lon2 - lon );

                  var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
                  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                  var d = R * c;

                  return d.toFixed(3);                      
                }



            }
        </script>



</body>
</html>