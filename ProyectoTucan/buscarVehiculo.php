<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$mail=$_POST['mail_due'];
	$usuario=new metodosUsuario();
	$usuario->listarVehiculo($mail);
?>