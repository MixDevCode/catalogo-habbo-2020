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
    <title>Panel de Administración - Editar Noticia</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	<style type="text/css">
    .cke_textarea_inline{
       border: 1px solid black;
    }
	</style>
  </head>
  <body class="app sidebar-mini rtl">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/panel/templates/navbar.php"; ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Editar</h1>
          <p>Estás editando una noticia.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Editar noticia</a></li>
        </ul>
      </div>
      <div class="row">
		<div class="col-md-12">
		<?php
		// Insert record
if (!empty($_POST)) {
  
  $titulo = mysqli_real_escape_string($link,$_POST['titulo']);
  $short_desc = mysqli_real_escape_string($link,$_POST['short_desc']);
  $long_desc = mysqli_real_escape_string($link,$_POST['long_desc']);
  $id = $_POST['id'];
  $horario = date ('Y-m-d H:i:s', time());
  $nombreu = $_SESSION["username"];

	$sql = "UPDATE contenidos SET titulo='$titulo', short_desc='$short_desc', long_desc='$long_desc' WHERE ID='$id'";
	$link->query($sql);
	
	$sqls = "INSERT INTO logs (nombre, accion, horario)".
	"VALUES ('$nombreu', 'Ha editado la noticia $titulo', '$horario')";
	$link->query($sqls);
	
echo "¡Gracias! Hemos recibido sus datos.\n";
			echo '<div class="container-contact1-form-btn">
					<a href="listar-n.php"><button class="contact1-form-btn">
						<span>
							Editar otra noticia.
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
				$sql = ("SELECT ID, titulo, short_desc, long_desc FROM contenidos where ID = '$id'");
				$result = $link->query($sql);
				$row = mysqli_fetch_array($result)
				?>
          <div class="form-group" data-validate = "Titulo es requerido">
					<label class="control-label col-md-3">Titulo de la noticia</label>
					<input class="form-control" type="text" name="titulo" value="<?php echo $row["titulo"]?>">
					<span class="shadow-input1"></span>
			</div>
			<div class="form-group" data-validate = "Descripcion es requerida">
					<label class="control-label col-md-3">Descripcion</label>
					<input class="form-control" type="text" name="short_desc" value="<?php echo $row["short_desc"]?>">
					<span class="shadow-input1"></span>
				</div>
				<div class="form-group" data-validate = "La ID es requerida">
					<input class="form-control" type="hidden" value="<?php echo $row["ID"]?>" name="id">
					<span class="shadow-input1"></span>
				</div>
				<div class="form-group">
					<label class="control-label col-md-3">Noticia</label>
				
       <textarea name="long_desc" id="editor1"><?php echo $row["long_desc"]?></textarea>
            <script>
                CKEDITOR.replace( 'editor1' );
            </script>
		</div>
		<div class="col-md-8 col-md-offset-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Actualizar">
		</div>
    </form>
	 
          </div>
        </div>
		<?php 
	}
	?>
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