<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');	
	$usuario=new metodosUsuario();
	$usuario->listarDuenio();
?>