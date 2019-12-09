<?php
	require_once('conexionTucan.php');
	require_once('metodosUsuario.php');
	$telefono=$_POST['tel_ase'];
	$usuario=new metodosUsuario();
	$usuario->listarPoliza($telefono);
?>