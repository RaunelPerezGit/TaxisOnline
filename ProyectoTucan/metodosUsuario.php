<?php
require_once("conexionTucan.php");
/**
* 
*/
class metodosUsuario extends Conexion
{
	
	function registrarClienteTarjeta($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->cubrid_fetch_array(result)assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{

			$queri1="select cve_cli from cliente where telefono_cli='".$datos[4]."'";
			$resultado=$this->select($queri1);
			$resultado->data_seek(0);
			$fila=$resultado->fetch_assoc();
			$clave=$fila['cve_cli'];
			if($resultado->num_rows>0){
				$query2="INSERT into tarjeta values('".$datos[6]."','".$datos[7]."','".$datos[8]."','".$datos[9]."','".$datos[10]."', $clave);";
				$insertar3=$this->insertar($query2);
				if ($inserta3==1) {
					echo "<script>alert('Registrado con exito!!!');</script>";
				} else {
					echo "<script>alert('Error al registrar la tarjeta!!!');</script>";
				}
			}else{
				$this->transaccion();
				$query1="INSERT into cliente values(null,'".$datos[0]."',curdate(),'cliente','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."');";
			
				$inserta1=$this->insertar($query1);
				$id=$this->lastId();
				$query2="INSERT into tarjeta values('".$datos[6]."','".$datos[7]."','".$datos[8]."','".$datos[9]."','".$datos[10]."', $id);";
				$inserta2=$this->insertar($query2);

				if ($inserta1==1 && $inserta2==1) {
					$this->commit();
					echo "<script>alert('Registrado con exito!!!');</script>";
				} else {
					$this->rollback;
					echo "<script>alert('Error al registrar!!!');</script>";
				}
				
			}
			
			
			
			//header('Location:../registroUsuario.php');
			$this->desconectar();
			header("location: cliente.php");
		//}
		
	}

	function registrarCliente($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->cubrid_fetch_array(result)assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{
			$query1="INSERT into cliente values(null,'".$datos[0]."',curdate(),'cliente','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."');";
			
			$this->insertar($query1);
			//header('Location:../registroUsuario.php');
			$this->desconectar();
		//}
		
	}


	function listarCliente(){
		$this->conectar();
		$salida="";
		$query="SELECT nom_cli,apellidos_usu,nombreusu_cli,correo_cli,telefono_cli,clasif_cli from cliente";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT nom_cli,apellidos_usu,nombreusu_cli,correo_cli,telefono_cli,clasif_cli from cliente WHERE nom_cli LIKE '%".$q."%' OR telefono_cli LIKE '%".$q."%' OR correo_cli LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Apellidos</th>
				      <th scope='col'>Usuario</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>teléfono</th>
				      <th scope='col'>tipo de Usuario</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$fila['nom_cli']."</th>
				      <th scope='col'>".$fila['apellidos_usu']."</th>
				      <th scope='col'>".$fila['nombreusu_cli']."</th>
				      <th scope='col'>".$fila['correo_cli']."</th>
				      <th scope='col'>".$fila['telefono_cli']."</th>
				      <th scope='col'>".$fila['clasif_cli']."</th>
				      <th scope='col'><button id='eliminar' data-telefono_cli='".$fila['telefono_cli']."' class='btn btn-danger'>Eliminar</button></th>
				      <th scope='col'><a href='#' id='modificarCliente' data-toggle='modal' data-target='#modalEditCliente' data-telefono_cli='".$fila['telefono_cli']."' onClick=getPersona('".$fila['telefono_cli']."'); class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}



		function listarTarjeta($telefono){
		$this->conectar();
		$salida1="";
		$querycve="select cve_cli from cliente where telefono_cli='".$telefono."'";
		$result=$this->select($querycve);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$clave=$fila["cve_cli"];
		$query="SELECT num_tar,instit_tar,vigencia_tar,titular_tar from tarjeta WHERE cve_cli='".$clave."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida1.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Número</th>
				      <th scope='col'>Institución</th>
				      <th scope='col'>Vigencia</th>
				      <th scope='col'>Titular</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($filaTar=$result->fetch_assoc()) {
				$salida1.="<tr>
				      <th scope='col'>".$filaTar['num_tar']."</th>
				      <th scope='col'>".$filaTar['instit_tar']."</th>
				      <th scope='col'>".$filaTar['vigencia_tar']."</th>
				      <th scope='col'>".$filaTar['titular_tar']."</th>
				    </tr>";
			}
			$salida1.="</tbody></table>";
		} else {
			$salida1="No hay datos :(";
		}
		echo $salida1;
		$this->desconectar();
	}



////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////TABLA DE VEHÍCULOS////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////
	function listarVehiculo($mail){
		$this->conectar();
		$salida="";
		$querycve="select cve_due from duenio where mail_due='".$mail."'";
		$result=$this->select($querycve);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$clave=$fila["cve_due"];
		$query="SELECT matricula_veh, modelo_veh, marca_veh, vigencia_veh, desc_veh, tiposerv_veh,ciudad_veh,cve_pol from vehiculo WHERE cve_due='".$clave."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Matrícula</th>
				      <th scope='col'>Modelo</th>
				      <th scope='col'>Marca</th>
				      <th scope='col'>Vigencia</th>
				      <th scope='col'>Descripción</th>
				      <th scope='col'>Tipo Servicio</th>
				      <th scope='col'>Clave ciudad</th>
				      <th scope='col'>Póliza</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($filaVeh=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$filaVeh['matricula_veh']."</th>
				      <th scope='col'>".$filaVeh['modelo_veh']."</th>
				      <th scope='col'>".$filaVeh['marca_veh']."</th>
				      <th scope='col'>".$filaVeh['vigencia_veh']."</th>
				      <th scope='col'>".$filaVeh['desc_veh']."</th>
				      <th scope='col'>".$filaVeh['tiposerv_veh']."</th>
				      <th scope='col'>".$filaVeh['ciudad_veh']."</th>
				      <th scope='col'>".$filaVeh['cve_pol']."</th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////TERMINA TABLA VEHÍCULOS///////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////////////



	function eliminarCliente($telefono){
		$this->conectar();
		$querycve="select cve_cli from cliente where telefono_cli='".$telefono."'";
		$result=$this->select($querycve);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$clave=$fila["cve_cli"];
		echo $clave;
		$query1="delete * from tarjeta where cve_cli=$clave";
		$this->eliminar($query1);
		$query="DELETE * FROM cliente WHERE telefono_cli='".$telefono."'";
		$result=$this->eliminar($query);
		if (!$result) {
			echo "Error al eliminar";
			exit();
		}else{	
			echo "Eliminado con exito";
		}
		$this->desconectar();
	}

	function validarUsuario($datos){
		$this->conectar();
		$pass=sha1($datos[1]);
		$query="select cve_adm from administrador where nom_adm='".$datos[0]."' and contra_adm='".$pass."'";
		$query2="select cve_usu from usuario where nom_usu='".$datos[0]."' and pass_usu='".$pass."'";

		$result=$this->select($query);
		$result2=$this->select($query2);
		if($result->num_rows>0 || $result2->num_rows>0){
			header('Location:menuTabsa.php');
		} else{
			echo "<script>alert('El usuario no fue encontrado!!!');</script>";
		}
	}




	function registrarDuenioVehiculo($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->cubrid_fetch_array(result)assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{


			$this->transaccion();
			$query1="INSERT into duenio values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."',curdate(),'".$datos[3]."');";
			
			$this->insertar($query1);
			$id=$this->lastId();
			echo $query1;
			
			$query2="INSERT into vehiculo values(null,'".$datos[4]."','".$datos[5]."','".$datos[6]."','".$datos[7]."','".$datos[8]."','".$datos[9]."', $id ,'".$datos[10]."','".$datos[11]."');";
			echo $query2;

			$this->insertar($query2);
			$this->commit();
			header('location:duenio.php');
			$this->desconectar();
			
		//}
		
	}


		function listarDuenio(){
		$this->conectar();
		$salida="";
		$query="SELECT nom_due, mail_due, ncuenta_due from duenio";
		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT nom_due, mail_due, ncuenta_due from duenio WHERE nom_due LIKE '%".$q."%' OR mail_due LIKE '%".$q."%' OR ncuenta_due LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>Número de cuenta</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$fila['nom_due']."</th>
				      <th scope='col'>".$fila['mail_due']."</th>
				      <th scope='col'>".$fila['ncuenta_due']."</th>
				      <th scope='col'><button id='eliminarDue' data-mail_due='".$fila['mail_due']."' class='btn btn-danger'>Eliminar</button></th>

				      <th scope='col'><a href='#' id='modificarDue' data-toggle='modal' data-target='#modalEditDuenio' data-mail_due='".$fila['mail_due']."' onClick=getPersona('".$fila['mail_due']."'); class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////CONDUCTOR////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function registrarConductor($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->cubrid_fetch_array(result)assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{
			$this->transaccion();
			$queryx="INSERT into conductor values(null,'".$datos[0]."',curdate(),'".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."','".$datos[5]."','".$datos[6]."','".$datos[7]."');";
			
			$this->insertar($queryx);
			$id=$this->lastId();
			echo $queryx;
			
			$queryy="INSERT into conductorvehiculo values(null,curdate(), $id ,'".$datos[8]."','".$datos[9]."','disponible','".$datos[10]."');";
			echo $queryy;

			$this->insertar($queryy);
			$this->commit();
			$this->desconectar();
			header("location: conductor.php");
		//}
		
	}



function listarConductor(){
		$this->conectar();
		$salida="";
		$query="SELECT nom_con, apellidos_con, status_con, tipo_con, turno_con, telefono_con, correo_con from conductor";

		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT nom_con, apellidos_con, status_con, tipo_con, turno_con, telefono_con, correo_con from conductor WHERE nom_con LIKE '%".$q."%' OR apellidos_con LIKE '%".$q."%' OR telefono_con LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Apellidos</th>
				      <th scope='col'>Status</th>
				      <th scope='col'>Tipo de conductor</th>
				      <th scope='col'>Turno</th>
				      <th scope='col'>Teléfono</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$fila['nom_con']."</th>
				      <th scope='col'>".$fila['apellidos_con']."</th>
				      <th scope='col'>".$fila['status_con']."</th>
				      <th scope='col'>".$fila['tipo_con']."</th>
				      <th scope='col'>".$fila['turno_con']."</th>
				      <th scope='col'>".$fila['telefono_con']."</th>
				      <th scope='col'>".$fila['correo_con']."</th>
				      <th scope='col'><button id='eliminarCon' data-telefono_con='".$fila['telefono_con']."' class='btn btn-danger'>Eliminar</button></th>

				      <th scope='col'><a href='#' id='modificarCon' data-toggle='modal' data-target='#modalEditConductor' data-telefono_con='".$fila['telefono_con']."' onClick=getPersona('".$fila['telefono_con']."'); class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////TERMINA CONDUCTOR/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////





////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////ASEGURADORA////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function registrarAseguradora($datos)
	{
		$this->conectar();
		//$queryExiste="SELECT cve_usu from usuario where tel_usu='".$datos[3]."'";
		//$existe=$this->select($queryExiste);
		//$existe->data_seek(0);
		//$contenido=$existe->cubrid_fetch_array(result)assoc();
		//echo $queryExiste;

		//if($existe){
			//echo "hola";
			//$querysi="UPDATE on usuario set "
		//}else{
			$this->transaccion();
			$queryx="INSERT into aseguradora values(null,'".$datos[0]."','".$datos[1]."','".$datos[2]."','".$datos[3]."','".$datos[4]."');";
			
			$this->insertar($queryx);
			$id=$this->lastId();
			echo $queryx;
			
			$queryy="INSERT into poliza values(null,'".$datos[5]."','".$datos[6]."','".$datos[7]."','".$datos[8]."',$id,curdate());";
			echo $queryy;

			$this->insertar($queryy);
			$this->commit();
			$this->desconectar();
			header("location: aseguradora.php");
		//}
		
	}



function listarAseguradora(){
		$this->conectar();
		$salida="";
		$query="SELECT nom_ase, tel_ase, mail_ase, ncuenta_ase, infoextra_ase from aseguradora";

		if (isset($_POST['consulta'])) {
			$q=$this->escape($_POST['consulta']);
			$query="SELECT nom_ase, tel_ase, mail_ase, ncuenta_ase, infoextra_ase from aseguradora WHERE nom_ase LIKE '%".$q."%' OR tel_ase LIKE '%".$q."%' OR mail_ase LIKE '%".$q."%' ";
		}
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Nombre</th>
				      <th scope='col'>Teléfono</th>
				      <th scope='col'>Correo</th>
				      <th scope='col'>N°. Cuenta</th>
				      <th scope='col'>Información extra</th>
				      <th scope='col'>Eliminar</th>
				      <th scope='col'>Modificar</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$fila['nom_ase']."</th>
				      <th scope='col'>".$fila['tel_ase']."</th>
				      <th scope='col'>".$fila['mail_ase']."</th>
				      <th scope='col'>".$fila['ncuenta_ase']."</th>
				      <th scope='col'>".$fila['infoextra_ase']."</th>
				      <th scope='col'><button id='eliminarCon' data-tel_ase='".$fila['tel_ase']."' class='btn btn-danger'>Eliminar</button></th>

				      <th scope='col'><a href='#' id='modificarAseguradora' data-toggle='modal' data-target='#modalEditAseguradora' data-tel_ase='".$fila['tel_ase']."' onClick=getPersona('".$fila['tel_ase']."'); class='btn btn-success'>Modificar</a></th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}





	function listarPoliza($telefono){
		$this->conectar();
		$salida="";
		$querycve="select cve_ase from aseguradora where tel_ase='".$telefono."'";
		$result=$this->select($querycve);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$clave=$fila["cve_ase"];
		$query="SELECT tiposeg_pol,periodopag_pol,monto_pol,desc_pol from poliza WHERE cve_ase='".$clave."'";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Tipo de seguro</th>
				      <th scope='col'>Periodo de pago</th>
				      <th scope='col'>Monto</th>
				      <th scope='col'>Descripción</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($filaTar=$result->fetch_assoc()) {
				$salida.="<tr>
				      <th scope='col'>".$filaTar['tiposeg_pol']."</th>
				      <th scope='col'>".$filaTar['periodopag_pol']."</th>
				      <th scope='col'>".$filaTar['monto_pol']."</th>
				      <th scope='col'>".$filaTar['desc_pol']."</th>
				    </tr>";
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////TERMINA ASEGURADORA/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////



////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////INICIA TARIFA/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////
function registrarTarifa($datos)
	{
		$this->conectar();
			$query1="INSERT into tarifa values(null,'".$datos[0]."','".$datos[1]."',now(),'".$datos[2]."');";
			$this->insertar($query1);
			header('location:tarifa.php');
			$this->desconectar();
			
		//}
		
	}


		function verTarifa(){
		$this->conectar();
		$salida="";
		$querymax1="select max(fecha_tari)as f1 from tarifa where tipo_tari='Lujo'";
		$resultm1=$this->select($querymax1);
		$resultm1->data_seek(0);
		$filam1=$resultm1->fetch_assoc();
		$fecha1=$filam1['f1'];
		$querymax2="select max(fecha_tari)as f2 from tarifa where tipo_tari='Semi-Lujo'";
		$resultm2=$this->select($querymax2);
		$resultm2->data_seek(0);
		$filam2=$resultm2->fetch_assoc();
		$fecha2=$filam2['f2'];
		$query="SELECT preciokm_tari, precio5min_tari from tarifa WHERE tipo_tari='Lujo' and fecha_tari='".$fecha1."' ";
		$result=$this->select($query);
		$query2="SELECT preciokm_tari, precio5min_tari from tarifa WHERE tipo_tari='Semi-Lujo' and fecha_tari='".$fecha2."' ";
		$result2=$this->select($query2);
		$result->data_seek(0);
			$filaTar=$result->fetch_assoc();

			$result2->data_seek(0);
			$filaTar2=$result2->fetch_assoc();

		if ($result->num_rows>0) {

			$salida.="<div class='form-group col-md-12 mb-3' style='padding-top: 70px;'>
	<div class='form-group col-sm-offset-2 col-md-3 mb-3'>
		<div class='panel panel-default' style='border-radius: 5px;'>
		  <div class='panel-heading' style='background: #3DC7BE; border-radius: 3px;'>
		    <h3 class='panel-title' style='font-size: 30px; color: white; text-align: center; font-family: inherit;'>LUJO</h3>
		  </div>
		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar['preciokm_tari']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Precio por Km.</h4>
			  	</div>
		  	</div>
		  </div>

		  <div class='panel-body' style='text-align: center; background: #616161; color: white; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-1 mb-3'>
			  		<h1>".$filaTar['precio5min_tari']."</h1>
			  	</div>
			  	<div class='form-group col-sm-offset-2 col-md-7 mb-3' style='padding-top: 20px;'>
			  		<h4>Precio C/5 Min.</h4>
			  	</div>
		  	</div>
		  </div>


		</div>
	</div>


		<div class='form-group col-sm-offset-2 col-md-3 mb-3'>
		<div class='panel panel-default' style='border-radius: 5px;'>
		  <div class='panel-heading' style='background: #FCAC0C; border-radius: 3px;'>
		    <h3 class='panel-title' style='font-size: 30px; color: white; text-align: center; font-family: inherit;'>SEMILUJO</h3>
		  </div>
		  <div class='panel-body' style='text-align: center; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-2 mb-3'>
			  		<h1>".$filaTar2['preciokm_tari']."</h1>
			  	</div>
			  	<div class='form-group col-md-8 mb-3' style='padding-top: 20px;'>
			  		<h4>Precio por Km.</h4>
			  	</div>
		  	</div>
		  </div>

		  <div class='panel-body' style='text-align: center; background: #616161; color: white; border-radius: 3px;'>
		  	<div class='form-group col-md-12 mb-3'>
		  		<div class='form-group col-sm-offset-0 col-md-1 mb-3'>
			  		<h2>$</h2>
			  	</div>
			  	<div class='form-group col-md-1 mb-3'>
			  		<h1>".$filaTar2['precio5min_tari']."</h1>
			  	</div>
			  	<div class='form-group col-sm-offset-2 col-md-7 mb-3' style='padding-top: 20px;'>
			  		<h4>Precio C/Min.</h4>
			  	</div>
		  	</div>
		  </div>

		  
		</div>
	</div>

</div>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////TERMINA TARIFA/////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////



	function buscarUsuario($numero){
		$this->conectar();
		$query="select nom_cli, correo_cli from cliente where telefono_cli='".$numero."'";
		$result=$this->select($query);
		echo $query;
		return $result;
	}

	function listarVehiculos2(){
		$this->conectar();
		$query="select marca_veh from vehiculo";
		echo $query;
		$result=$this->select($query);
		return $result;
	}

    function registrarServicio($datos,$ruta){
    	$this->conectar();
    	echo "entrar";

		$matricula1= explode(",", $datos[4]);


    	$querycve="select cve_convehi from conductorvehiculo join vehiculo on conductorvehiculo.cve_veh=vehiculo.cve_veh where matricula_veh='".$matricula1[3]."' ";
    	echo $querycve;
		$result=$this->select($querycve);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$clave1=$fila["cve_convehi"];

    	/*$querycve1="select cve_convehi from conductorvehiculo where cve_veh=$clave";
		$result1=$this->select($querycve1);
		$result1->data_seek(0);
		$fila1=$result1->fetch_assoc();
		$clave1=$fila1["cve_convehi"];*/

		$querycve2="select cve_cli from cliente where correo_cli='".$datos[5]."'";
		$result2=$this->select($querycve2);
		$result2->data_seek(0);
		$fila2=$result2->fetch_assoc();
		$clave2=$fila2["cve_cli"];

    	$query1="INSERT into viaje values(null,'".$datos[0]."',curdate(),now(),null,'".$datos[1]."','".$datos[2]."','".$datos[3]."',$clave1,$clave2,null,'".$datos[6]."','en espera');";
			$this->insertar($query1);
    	$id=$this->lastId();
    	$queryz="INSERT into ruta values(null,'".$ruta[0]."','".$ruta[1]."','".$ruta[2]."','".$ruta[3]."',$id)";
    	echo $queryz;
    	$this->insertar($queryz);
			$this->desconectar();


    }


	function listarViajes(){
		$this->conectar();
		$salida="";
		$query="select cve_via, tiposerv_via,fecha_via,horaini_via,horafin_via,puntoini_via,puntofin_via,cantkm_via,nom_cli,apellidos_usu,nom_con,apellidos_con,tiempoest_via,status_via,matricula_veh from viaje join conductorvehiculo on viaje.cve_convehi=conductorvehiculo.cve_convehi join conductor on conductorvehiculo.cve_con=conductor.cve_con join cliente on viaje.cve_cli=cliente.cve_cli join vehiculo on conductorvehiculo.cve_veh=vehiculo.cve_veh";
		$result=$this->select($query);
		$result->data_seek(0);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead style='background: #33425B; color: white;'>
				    <tr>
					   <th scope='col'>Conductor</th>
					   <th scope='col'>Cliente</th>
				      <th scope='col'>Tipo de servicio</th>
				      <th scope='col'>fecha</th>
				      <th scope='col'>Hora de inicio</th>
				      <th scope='col'>Hora final</th>
				      <th scope='col'>Tiempo estimado</th>
				      <th scope='col'>Partida</th>
				      <th scope='col'>Arrivo</th>
				      <th scope='col'>Distancia</th>
				      <th scope='col'>Ver ruta</th>
				      <th scope='col'>Cambiar ruta</th>
				      <th scope='col'>Status</th>
				    </tr>
				  </thead>
				  <tbody>";
			$result->data_seek(0);
			while ($fila=$result->fetch_assoc()) {
				$claveviaje=$fila['cve_via'];
				if($fila['status_via']==='en espera'){
					$salida.="<tr>
					  <th scope='col'>".$fila['nom_con']." ".$fila['apellidos_con']."</th>
					  <th scope='col'>".$fila['nom_cli']." ".$fila['apellidos_usu']."</th>
				      <th scope='col'>".$fila['tiposerv_via']."</th>
				      <th scope='col'>".$fila['fecha_via']."</th>
				      <th scope='col'>".$fila['horaini_via']."</th>
				      <th scope='col'>".$fila['horafin_via']."</th>
				      <th scope='col'>".$fila['tiempoest_via']."</th>
				      <th scope='col'>".$fila['puntoini_via']."</th>
				      <th scope='col'>".$fila['puntofin_via']."</th>
				      <th scope='col'>".$fila['cantkm_via']."</th>
				      <th scope='col'><a href='#' id='verruta'  data-cve_via='".$claveviaje."' class='btn btn-info'>Ver Ruta</a></th>
				      <th scope='col'><a href='#' id='cambiarruta'  data-cve_via='".$claveviaje."' data-toggle='modal' data-target='#modificarRuta' class='btn btn-warning'>Cambiar Ruta</a></th>
				      <th scope='col'><a href='#' id='iniciarviaje'  data-cve_via='".$claveviaje."' class='btn btn-primary'>Iniciar</a></th>
				    </tr>";
				}else{
					$salida.="<tr>
					  <th scope='col'>".$fila['nom_con']." ".$fila['apellidos_con']."</th>
					  <th scope='col'>".$fila['nom_cli']." ".$fila['apellidos_usu']."</th>
				      <th scope='col'>".$fila['tiposerv_via']."</th>
				      <th scope='col'>".$fila['fecha_via']."</th>
				      <th scope='col'>".$fila['horaini_via']."</th>
				      <th scope='col'>".$fila['horafin_via']."</th>
				      <th scope='col'>".$fila['tiempoest_via']."</th>
				      <th scope='col'>".$fila['puntoini_via']."</th>
				      <th scope='col'>".$fila['puntofin_via']."</th>
				      <th scope='col'>".$fila['cantkm_via']."</th>
				      <th scope='col'><a href='#' id='verruta'  data-nom_con='".$fila['nom_con']."' class='btn btn-info'>Ver Ruta</a></th>
				      <th scope='col'><a href='#' id='cambiarruta'  data-nom_con='".$fila['nom_con']."' data-toggle='modal' data-target='#modificarRuta' class='btn btn-warning'>Cambiar Ruta</a></th>
				      <th scope='col'><a href='#' id='terminarviaje'  data-nom_con='".$fila['nom_con']."' class='btn btn-danger'>Terminar</a></th>
				    </tr>";
				}

				
			}
			$salida.="</tbody></table>";
		} else {
			$salida="No hay datos :(";
		}
		echo $salida;
		$this->desconectar();
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////LISTAR CONDUCTOR-VEHICULO////////////////////////////////////////////
	///////////////////////////////////////////////////////////////////////////////////////////////////////////

		/*function getTiempo($l1,$l2){
				$ubicacion=$l1;
				echo $ubicacion;
				$url="http://maps.googleapis.com/maps/api/geocode/json?latlng=$l1&sensor=true";

				echo $url;

				$jsonData=file_get_contents($url);
				$data = json_decode($jsonData);
				$d=$data->{"results"};
				$lugar=$data->{"results"}[0]->{"formatted_address"};
				echo $lugar;


				$url2 = "http://maps.googleapis.com/maps/api/directions/json?origin=$lugar&destination=$l2&sensor=false&mode=driving";
				echo $url2;
				$jsonData2   = file_get_contents($url2);
				$data2 = json_decode($jsonData2);
				$d2=$data2->{"geocoded_waypoints"};
				//$distancia=$data2->{"routes"}[0]->{"legs"}[0]->{"distance"}->{"text"};
				//$latIni=$data2->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lat"};
				//$lonIni=$data2->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lng"};
				//$latFin=$data2->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lat"};
				//$lonFin=$data2->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lng"};
				$tiempo=$data2->{"routes"}[0]->{"legs"}[0]->{"duration"}->{"text"};

				return $tiempo;
		}*/


		function listarConductorVehiculo($orig){
		$this->conectar();
		$salida="";
		$query="SELECT nom_con,apellidos_con, marca_veh, modelo_veh, matricula_veh, desc_veh, latLong_convehi,ciudad_convehi from conductor join conductorvehiculo on conductor.cve_con=conductorvehiculo.cve_con join vehiculo on conductorvehiculo.cve_veh=vehiculo.cve_veh where status_convehi='disponible' and ciudad_veh= '".$orig."' ";
		$result=$this->select($query);
		if ($result->num_rows>0) {
			$salida.="<br><table class='table table-hover table table-bordered'>
				  <thead>
				    <tr>
				      <th scope='col'>Conductor</th>
				      <th scope='col'>Marca</th>
				      <th scope='col'>Modelo</th>
				      <th scope='col'>Matrícula</th>
				      <th scope='col'>Descripción vehículo</th>
				      <th scope='col'>Tiempo de espera</th>
				      <th scope='col'>Elegir</th>
				    </tr>
				  </thead>
				  <tbody>";
				//$ubicacion=$fila['latLong_convehi'];
				//echo $ubicacion;

			$result->data_seek(0);
			//$i=1;
			
			while ($fila=$result->fetch_assoc()) {
				
				$or=$fila['ciudad_convehi'];
				$url2 = "http://maps.googleapis.com/maps/api/directions/json?origin=".urlencode($or)."&destination=".urlencode($orig)."&sensor=false&mode=driving";
				//echo $url2;


				$page = file_get_contents($url2);
//echo $page;
				



				//$jsonData2   = file_get_contents($url2);
				$data2 = json_decode($page);
				//$d2=$data2->{"geocoded_waypoints"};
				

				//$distancia=$data2->{"routes"}[0]->{"legs"}[0]->{"distance"}->{"text"};
				//$latIni=$data2->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lat"};
				//$lonIni=$data2->{"routes"}[0]->{"legs"}[0]->{"start_location"}->{"lng"};
				//$latFin=$data2->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lat"};
				//$lonFin=$data2->{"routes"}[0]->{"legs"}[0]->{"end_location"}->{"lng"};


				$tiempo=$data2->{"routes"}[0]->{"legs"}[0]->{"duration"}->{"text"};

				$salida.="<tr>
				      <th scope='col'>".$fila['nom_con']." ".$fila['apellidos_con']."</th>
				      <th scope='col'>".$fila['marca_veh']."</th>
				      <th scope='col'>".$fila['modelo_veh']."</th>
				      <th scope='col'>".$fila['matricula_veh']."</th>
				      <th scope='col'>".$fila['desc_veh']."</th>
				      <th scope='col'>".$tiempo."</th>
				      <th scope='col'><a href='#' id='ElegirVehiculo'  data-matricula_veh='".$fila['matricula_veh']."' class='btn btn-success'>Elegir</a></th>
				    </tr>";

				 //$i=$i+1;
				 //echo "contador: ".$i;
			}
			$salida.="</tbody></table>";
		} else {
			$salida="Seleccione un origen para calcular el tiempo de recogida!!";
		}
		echo $salida;
		$this->desconectar();
	}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	////////////////////////////////////TERMINA LA LISTA-CODUTCOR///////////////////////////////////////////////////////
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	function getVehiculo($matricula){
		$this->conectar();
		$salida="";
		$query="SELECT nom_con,apellidos_con, marca_veh, modelo_veh, matricula_veh from conductor join conductorvehiculo on conductor.cve_con=conductorvehiculo.cve_con join vehiculo on conductorvehiculo.cve_veh=vehiculo.cve_veh where matricula_veh='".$matricula."' ";
		$result=$this->select($query);
		$result->data_seek(0);
		$fila=$result->fetch_assoc();
		$salida.=$fila['nom_con'].",";
		$salida.=$fila['marca_veh'].",";
		$salida.=$fila['modelo_veh'].",";
		$salida.=$fila['matricula_veh'];
		echo $salida;
		$this->desconectar();
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
	function getRuta($id){
		$this->conectar();
		$query="SELECT lat1,lon1,lat2,lon2 from ruta where cve_via=$id";
		$result=$this->select($query);
		return $result;
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
	function modifyRuta($vector){
		$this->conectar();
		$query1="update viaje set puntofin_via='".$vector[1]."' where cve_via='".$vector[0]."'";
		$query2="update viaje set cantkm_via='".$vector[6]."' where cve_via='".$vector[0]."'";
		$query3="update viaje set tiempoest_via='".$vector[7]."' where cve_via='".$vector[0]."'";
		//$query4="update ruta set lat1='".$vector[2]."' where cve_via='".$vector[0]."'";
		//$query5="update ruta set lon1='".$vector[3]."' where cve_via='".$vector[0]."'";
		$query6="update ruta set lat2='".$vector[4]."' where cve_via='".$vector[0]."'";
		$query7="update ruta set lon2='".$vector[5]."' where cve_via='".$vector[0]."'";

		$this->select($query1);
		$this->select($query2);
		$this->select($query3);
		//$this->select($query4);
		//$this->select($query5);
		$this->select($query6);
		$this->select($query7);

		header('location:consultaViaje.php');
		$this->desconectar();
	}

///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////
	function getOrigen($id){
		$this->conectar();
		$query="SELECT puntoini_via from viaje where cve_via=$id";
		$result=$this->select($query);
		return $result;
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////




///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
	function iniciarViaje($viaje){
		$this->conectar();
		$query="update viaje set status_via='en proceso' where cve_via=$viaje";
		$this->select($query);
		header('location:consultaViaje.php');
		$this->desconectar();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////



///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////
	function terminarViaje($viaje){
		$this->conectar();
		$query="update viaje set status_via='libre' where cve_via=$viaje";
		$this->select($query);
		header('location:consultaViaje.php');
		$this->desconectar();
	}
///////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////

}

	
?>