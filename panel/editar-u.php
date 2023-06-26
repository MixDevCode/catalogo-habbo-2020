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
    <title>Panel de Administración - Editar Usuario</title>
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
          <h1><i class="fa fa-th-list"></i> Editar</h1>
          <p>Estás editando un usuario.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Editar usuario</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <?php
		
	if (!empty($_POST)) {
	
	$nombre = $_POST['nombre'];
	$id = $_POST['id'];
	$keko = $_POST['keko'];
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];
	
	switch($_POST['rank']){
	case 'admin':
		$sql = "UPDATE users SET nombre='$nombre', keko='$keko', Rango='Administrador' WHERE ID='$id'";
		$link->query($sql);
		
		$sqls = "INSERT INTO logs (nombre, accion, horario)".
			"VALUES ('$nombreu', 'Ha editado el usuario $nombre', '$horario')";
		$link->query($sqls);
		
	break;
	case 'eco':
		$sql = "UPDATE users SET nombre='$nombre', keko='$keko', Rango='Economista' WHERE ID='$id'";
		$link->query($sql);
		
		$sqls = "INSERT INTO logs (nombre, accion, horario)".
			"VALUES ('$nombreu', 'Ha editado el usuario  $nombre', '$horario')";
		$link->query($sqls);
		
	break;
	
	}
	
	echo "¡Gracias! Hemos recibido los datos\n";
			echo '<div class="container-contact1-form-btn">
					<a href="listar-u.php"><button class="contact1-form-btn">
						<span>
							Editar otro.
							<i class="fa fa-long-arrow-right" aria-hidden="true"></i>
						</span>
					</button>
					</a>
				</div>';
	
	} else {
?> 

			<form method="post" action="" enctype="multipart/form-data">
				<?php
				$id = $_GET['id'];
				$sql = ("SELECT ID, nombre, keko FROM users where ID = '$id'");
				$result = $link->query($sql);
				$row = mysqli_fetch_array($result)
				?>

				<div class="form-group" data-validate = "Nombre es requerido">
					<label class="control-label col-md-3">Nombre</label>
					<input class="form-control" type="text" name="nombre" value="<?php echo $row["nombre"]?>">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group" data-validate = "Keko es requerido">
					<label class="control-label col-md-3">Keko</label>
					<input class="form-control" type="text" name="keko" value="<?php echo $row["keko"]?>">
					<span class="shadow-input1"></span>
				</div>

				<div class="form-group">
				<label class="control-label col-md-3">Selecciona el rango</label>
					<select class="form-control" name="rank">
						<option value="admin">Administrador</option>
						<option value="eco">Economista</option>
					</select>
				</div>
				
				<div class="form-group" data-validate = "La ID es requerida">
					<input class="form-control" type="hidden" value="<?php echo $row["ID"]?>" name="id">
					<span class="shadow-input1"></span>
				</div>
				<center>
				<div class="col-md-8 col-md-offset-3">
					<input type="submit" name="send" class="btn btn-primary" value="Actualizar">
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