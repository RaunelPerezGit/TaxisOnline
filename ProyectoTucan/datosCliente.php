<?php
	require_once('InterfazConexion.php');
	require_once('MetodosUsuario.php');
		if(isset($_POST['nombre'])){
			$nombre=$_POST['nombre'];
		$apellidos=$_POST["apellidos"];
		$correo=$_POST["correo"];
		$telefono=$_POST["telefono"];
		$password=sha1($_POST["password"]);//encriptacion de la contraseña
		$tipoUsuario=$_POST["tipoUsuario"];
		$estado=$_POST["estado"];
		$ciudad=$_POST["ciudad"];
		$cpCod=$_POST["cpCod"];
		$colonia=$_POST["colonia"];
		$calle=$_POST["calle"];
		$orientacion=$_POST["orientacion"];
		$numero=$_POST["numero"];
		$datos=array($nombre,$apellidos,$correo,$telefono,$password,$tipoUsuario,$estado,$ciudad,$cpCod,$colonia,$calle, $orientacion,$numero);
		$usuario=new MetodosUsuario();
		$usuario->registrarUsuario($datos);
		//$usuario->listarUsuario();
		}
		
	
	
?>