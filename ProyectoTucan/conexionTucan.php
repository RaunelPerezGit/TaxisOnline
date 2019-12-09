<?php

class Conexion {
	private $conexion;
	function conectar(){ 
		$this->conexion = new mysqli("127.0.0.1","root","","tucan");
		if (mysqli_connect_errno()) {
			echo "no conecta";
			exit();
		}else{
			//echo "conectado";
		}
	}
	function transaccion(){
		$con = $this->conexion;
		$con->query("START TRANSACTION");
	}
	function lastId(){
		$con=$this->conexion;
		$resultado=$con->insert_id;
		return $resultado;
	}
	function commit(){
		$con = $this->conexion;
		$con->query("commit");
	}
	function rollback(){
		$co = $this->conexion;
		$co->query("rollback");
	}
	function select($query){
		$con = $this->conexion;
		$resultado = $con->query($query);
		return $resultado;
	}
	function eliminar($query){
		$con = $this->conexion;
		$resultado = $con->query($query);
		return $resultado;
	}
	function escape($query){
		$con = $this->conexion;
		$resultado = $con->real_escape_string($query);
		return $resultado;
	}
	function insertar($qry){
		$con = $this->conexion;
		if ($con->query($qry)===TRUE) {
			return 1;
		}else{
			
			return 0;
		}
	}
	
	function desconectar(){
		$con = $this->conexion;
		$con->close();
	}
}
date_default_timezone_set('America/Mexico_City');
?>