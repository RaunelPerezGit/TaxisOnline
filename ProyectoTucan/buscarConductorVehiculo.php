<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$matricula=$_POST['matricula_veh'];
	$usuario=new metodosUsuario();
	$usuario->getVehiculo($matricula);
?>