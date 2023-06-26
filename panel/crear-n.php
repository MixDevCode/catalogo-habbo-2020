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

// Insert record
if (!empty($_POST)) {
  $titulo = mysqli_real_escape_string($link,$_POST['titulo']);
  $short_desc = mysqli_real_escape_string($link,$_POST['short_desc']);
  $long_desc = mysqli_real_escape_string($link,$_POST['long_desc']);
  $fecha = date ('Y-m-d', time());
  $horario = date ('Y-m-d H:i:s', time());
  $nombreu = $_SESSION["username"];

    mysqli_query($link, "INSERT INTO contenidos(titulo,short_desc,long_desc,fecha) VALUES('".$titulo."','".$short_desc."','".$long_desc."','".$fecha."') ");
	
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha creado la noticia $titulo', '$horario')";
	$link->query($sqls);
	
    header('location: index.php');
}

?>
<?php
$query = mysqli_query($link, "SELECT * FROM users WHERE nombre='".$_SESSION['username']."'");

if(mysqli_num_rows($query) > 0){
}else{
    header("location: login/");
	session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Panel de Administración - Crear Noticia</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
  </head>
  <body class="app sidebar-mini rtl">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/panel/templates/navbar.php"; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><img src="admin/assets/user-c.png" /> Crear noticia</h1>
          <p>Estás creando una nueva noticia.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Crear noticia</a></li>
        </ul>
      </div>
      <div class="row">
		<div class="col-md-12">
		<form method="post" action="" enctype="multipart/form-data">
          <div class="form-group" data-validate = "Titulo es requerido">
					<label class="control-label col-md-3">Titulo de la noticia</label>
					<input class="form-control" type="text" name="titulo" value="">
					<span class="shadow-input1"></span>
			</div>
			<div class="form-group" data-validate = "Descripcion es requerida">
					<label class="control-label col-md-3">Descripcion</label>
					<input class="form-control" type="text" name="short_desc" value="">
					<span class="shadow-input1"></span>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Noticia</label>
				
       <textarea name="long_desc" id="editor1"></textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
		</div>
		<div class="col-md-8 col-md-offset-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Crear">
		</div>
    </form>
	 
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
    <script type="text/javascript" src="js/plugins/chart.js"></script>
  </body>
</html>