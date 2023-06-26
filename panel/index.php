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
    <title>Panel de Administración - Inicio</title>
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
          <h1><img src="admin/assets/inicio.png" /> Inicio</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Inicio</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>Usuarios</h4>
			  <?php 
				$sqlu = ("SELECT * FROM users");
				$resultu = $link->query($sqlu);
				$rowu = mysqli_num_rows($resultu);
				?>
              <p><b><?php echo $rowu;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
            <div class="info">
              <h4>Megas</h4>
              <?php 
				$sqlu = ("SELECT * FROM rares where categoria = 'megas'");
				$resultu = $link->query($sqlu);
				$rowu = mysqli_num_rows($resultu);
				?>
              <p><b><?php echo $rowu;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-4">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
            <div class="info">
              <h4>Rares</h4>
              <?php 
				$sqlu = ("SELECT * FROM rares where categoria = 'rares'");
				$resultu = $link->query($sqlu);
				$rowu = mysqli_num_rows($resultu);
				?>
              <p><b><?php echo $rowu;?></b></p>
            </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-6">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-star fa-3x"></i>
            <div class="info">
              <h4>LTD</h4>
              <?php 
				$sqlu = ("SELECT * FROM rares where categoria = 'ltd'");
				$resultu = $link->query($sqlu);
				$rowu = mysqli_num_rows($resultu);
				?>
              <p><b><?php echo $rowu;?></b></p>
            </div>
          </div>
        </div>
		<div class="col-md-12 col-lg-6">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-newspaper-o fa-3x"></i>
            <div class="info">
              <h4>Noticias</h4>
              <?php 
				$sqlu = ("SELECT * FROM contenidos");
				$resultu = $link->query($sqlu);
				$rowu = mysqli_num_rows($resultu);
				?>
              <p><b><?php echo $rowu;?></b></p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
		<div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title"><center>ULTIMOS MOVIMIENTOS</h3></center>
            <table id="myTable" cellspacing="0" class="table table-hover table-bordered">
      <thead>
	  <tr>
         <th><b>NOMBRE</b></th>
		 <th width="430"><b>ACCION</b></th>
		 <td><b>HORARIO</b></td>
      </tr>
	  </thead>
	  <tbody>
    <?php 
		$sql = ("SELECT ID, nombre, accion, horario FROM logs ORDER BY ID DESC LIMIT 6");
		$result = $link->query($sql);
		if ($row = mysqli_fetch_array($result)){ 
		do { 
			echo "<tr>
				<td>".$row["nombre"]."</td>
				<td>".$row["accion"]."</td>
				<td>".$row["horario"]."</td>
				";
			echo	"</tr> \n";		
		} while ($row = mysqli_fetch_array($result)); 
			echo "</table> \n"; 
		} else {
		}
	?>
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