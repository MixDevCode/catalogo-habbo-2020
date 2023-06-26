<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login/");
    exit;
}
	
// Include config file
require_once "admin/assets/db.config.php";

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Panel de Administración - Agregar Rare/Mega/LTD</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini rtl">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/panel/templates/navbar.php"; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><img src="admin/assets/add.png" /> Agregar</h1>
          <p>Estás agregando nuevas cosas al catálogo.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Agregar</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			<?php
	  	if (!empty($_POST)) {
		
	$url = $_POST['url'];
	$nombre = $_POST['nombre'];
	$valor = $_POST['valor'];
	$desc = $_POST['desc'];
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];	
	
	switch($_POST['rare']){
	case 'rares':
	$sqls = "INSERT INTO rares (imagen, nombre, valor, descripcion, categoria)".
		"VALUES ('$url', '$nombre', '$valor', '$desc', 'Rares')";
	$result = $link->query($sqls);
	echo "¡Gracias! Hemos recibido sus datos.\n";
	echo '<div class="container-contact1-form-btn">
					<a href="agregar.php"><button class="contact1-form-btn">
						<span>
							Subir otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha agregado el rare $nombre', '$horario')";
	$link->query($sqls);
	break;
	case 'megas':
			$sqls = "INSERT INTO rares (imagen, nombre, valor, descripcion, categoria)".
			"VALUES ('$url', '$nombre', '$valor', '$desc', 'Megas')";
			$result = $link->query($sqls);
			echo "¡Gracias! Hemos recibido sus datos.\n";
			echo '<div class="container-contact1-form-btn">
					<a href="agregar.php"><button class="contact1-form-btn">
						<span>
							Subir otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha agregado el mega $nombre', '$horario')";
	$link->query($sqls);
	break;
	case 'ltd':
			$sqls = "INSERT INTO rares (imagen, nombre, valor, descripcion, categoria)".
			"VALUES ('$url', '$nombre', '$valor', '$desc', 'LTD')";
			$result = $link->query($sqls);
			echo "¡Gracias! Hemos recibido sus datos.\n";
			echo '<div class="container-contact1-form-btn">
					<a href="./añadir.php"><button class="contact1-form-btn">
						<span>
							Subir otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha agregado el LTD $nombre', '$horario')";
	$link->query($sqls);
	break;
	}
	} else {
?> 
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group" data-validate = "URL es requerido">
					<label class="control-label col-md-3">URL de la Imagen</label>
					<input class="form-control" type="text" name="url">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "Nombre es requerido">
					<label class="control-label col-md-3">Nombre</label>
					<input class="form-control" type="text" name="nombre">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "El valor es requerido">
					<label class="control-label col-md-3">Valor</label>
					<input class="form-control" type="text" name="valor">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "La descripcion es requerida">
					<label class="control-label col-md-3">Descripción</label>
					<input class="form-control" type="text" name="desc">
					<span class="shadow-input1"></span>
				</div>
				
				<div class="form-group">
				<label class="control-label col-md-3">Selecciona la categoria</label>
					<select class="form-control" name="rare">
						<option value="rares">Rare</option>
						<option value="megas">Megarare</option>
						<option value="ltd">LTD</option>
					</select>
				</div>
				<center>
				<div class="col-md-8 col-md-offset-3">
					<input type="submit" name="send" class="btn btn-primary" value="Subir">
				</div>
				</center>
			</form>
		</div>
	</div>
	<?php 
	}
	?>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Data table plugin-->
    <script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">$('#myTable').DataTable();</script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>