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

<?php
	if ($row["Rango"] !== "Administrador") {
		header("location: index.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Panel de Administración - Crear Usuario</title>
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
          <h1><img src="admin/assets/user-c.png" /> Crear usuario</h1>
          <p>Estás creando un nuevo usuario.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Crear usuario</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
			<?php
	  	if (!empty($_POST)) {
	
	$nombre = $_POST['nombre'];
	$contraseñas = $_POST['contraseña'];
	$keko = $_POST['keko'];
	$contraseña = password_hash($contraseñas, PASSWORD_DEFAULT);
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];
			
	
	switch($_POST['rank']){
	case 'admin':
	$sqls = "INSERT INTO users (nombre, contrasena, rango, keko)".
			"VALUES ('$nombre', '$contraseña', 'Administrador', '$keko')";
	$result = $link->query($sqls);
	echo "¡Gracias! Hemos recibido sus datos.\n";
	echo '<div class="container-contact1-form-btn">
					<a href="crear-u.php"><button class="contact1-form-btn">
						<span>
							Subir otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha registrado al usuario $nombre con rango Administrador', '$horario')";
	$link->query($sqls);
	break;
	case 'eco':
			$sqls = "INSERT INTO users (nombre, contrasena, rango, keko)".
			"VALUES ('$nombre', '$contraseña', 'Economista', '$keko')";
			$result = $link->query($sqls);
			echo "¡Gracias! Hemos recibido sus datos.\n";
			echo '<div class="container-contact1-form-btn">
					<a href="crear-u.php"><button class="contact1-form-btn">
						<span>
							Subir otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha registrado al usuario $nombre con rango Economista', '$horario')";
	$link->query($sqls);
	break;
	}
	} else {
?> 
			<form method="post" action="" enctype="multipart/form-data">
				<div class="form-group" data-validate = "Nombre es requerido">
					<label class="control-label col-md-3">Nombre</label>
					<input class="form-control" type="text" name="nombre">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "Contraseña es requerida">
					<label class="control-label col-md-3">Contraseña</label>
					<input class="form-control" type="text" name="contraseña">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "El keko es requerido">
					<label class="control-label col-md-3">Keko</label>
					<input class="form-control" type="text" name="keko">
					<span class="shadow-input1"></span>
				</div>
				
				<div class="form-group">
				<label class="control-label col-md-3">Selecciona el rango</label>
					<select class="form-control" name="rank">
						<option value="admin">Administrador</option>
						<option value="eco">Economista</option>
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
  </body>
</html>