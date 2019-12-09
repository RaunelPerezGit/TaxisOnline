<!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
 	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font-awesome/css/font-awesome.min.css">    
    
 	<title>Tucán</title>
 </head>
 <body style="background: #f9f9f9">
	
<nav class="navbar navbar-inverse"" style="background: #305973;">
  <div class="container-fluid" style="font-size: 16px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header form-group col-lg-3 col-sm-6 mb-3" style="">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="inicio.php"><img style="height: 40px; width: 40px; border-radius: 25px;" src="TucanIcon.jpg"></a>
      <a class="navbar-brand" href="inicio.php" style="padding-top: 25px; color: white; font-size: 25px;">Tucán</a>

    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="background: #305973; padding-top: 15px;">
      <ul class="nav navbar-nav">
        <li><a href="cliente.php"  class="fa fa-user" aria-hidden="true"> Cliente</a></li>
        <li><a href="conductor.php" class="fa fa-car" aria-hidden="true"> Conductor</a></li>
        <li><a href="duenio.php" class="fa fa-user-plus" aria-hidden="true"> Dueño</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fa fa-money" aria-hidden="true"" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Pagos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Pagos a aseguradora</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Pagos a dueño</a></li>
          </ul>
        </li>
        <li><a href="aseguradora.php" class="fa fa-building" aria-hidden="true"> Aseguradora</a></li>
        <li><a href="tarifa.php" class="fa fa-th" aria-hidden="true">Tarifa</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle fa fa-plane" aria-hidden="true"" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Viaje<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="iniciarViaje.php">Iniciar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="consultaViaje.php">Consultar</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/myscript.js"></script>
 </body>
 </html> 