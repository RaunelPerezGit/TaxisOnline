<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$telefono=$_POST['telefono_cli'];
	$usuario=new metodosUsuario();
	$usuario->eliminarCliente($telefono);
?>