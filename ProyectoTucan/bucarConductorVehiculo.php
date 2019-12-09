<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$orig=$_POST['origen'];
	$usuario=new metodosUsuario();
	$usuario->listarConductorVehiculo($orig);
?>
