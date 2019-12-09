<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$viaje=$_POST['cve_via'];
	$usuario=new metodosUsuario();
	$usuario->terminarViaje($viaje);
?>