<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php include("menu.php") ?>
<?php include("registrarTarifa.php") ?>

<div class="col-sm-offset-5 col-sm-4">
	<button  style="width: 190px; height: 50px; font-size: 20px;" type="button" class="btn btn-primary btn-lg active fa fa-money" aria-hidden="true" id='tarifadd' data-toggle='modal' data-target='#modalEditTarifa' class='btn btn-success'> Nueva tarífa</button>
</div>

<div class="col-sm-offset-0 col-md-12" id="datosTarifa" style='padding-top: 30px'>
	
</div>

<script type="text/javascript" src="consulta.js"></script>
</body>
</html>
<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$usuario=new metodosUsuario();
	$usuario->verTarifa();
?>