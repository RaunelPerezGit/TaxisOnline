<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php include("menu.php") ?>
	<?php include("modificarCliente.php") ?>
	<?php include("registrarClienteTarjeta.php") ?>


	<div class="col-sm-offset-5 col-sm-4">
		<button  style="width: 200px; font-size: 18px;" type="button" class="btn btn-success btn-lg active fa fa-user-plus" aria-hidden="true" id='agregarClienteTarjeta' data-toggle='modal' data-target='#modalEditClienteTarjeta' class='btn btn-success'> Agregar cliente</button>
	</div>

	<div class="col-sm-offset-6 col-sm-6 col-sm-offset-3 col-m-4" style="padding-top: 20px; ">
		<form class="form-inline">
			<div class="col-sm-offset-0 col-sm-12">
			    <div class="form-group has-success has-feedback  col-sm-9">
			      <div class="col-sm-2 col-m-1">
				  <label class="control-label" for="inputGroupSuccess1" style="padding-top: 15px;">Cliente</label>
				  </div>
				  <div class="input-group col-sm-10 col-m-11">
				    <span class="input-group-addon"><i class="fa fa-search" aria-hidden="true"></i></span>
				    <input type="text" class="form-control" id="cajaBuscarCliente" aria-describedby="inputGroupSuccess1Status" placeholder="Buscar">
				  </div>
			    </div>
			    <div class="col-sm-3">
			    	<button type="submit" class="btn btn-primary">Buscar</button>
			    </div>
		  	</div>
		</form>
	</div>

	<div class="col-sm-offset-0 col-md-12" id="datosCliente" style='padding-top: 80px'>
				
	</div>

	<script src="consulta.js"></script>
	
</body>
</html>