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
    <title>Panel de Administración - Listar Noticias</title>
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
          <h1><img src="admin/assets/noticias.png" /> Noticias</h1>
          <p>Aquí puedes editar o eliminar noticias.</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item active"><a href="#">Noticias</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <table id="myTable" cellspacing="0" class="table table-hover table-bordered">
      <thead>
	  <tr>
         <th><b>ID</b></th>
         <th><b>TITULO</b></th>
      </tr>
	  </thead>
	  <tbody>
      <?php
	$sql = ("SELECT ID, titulo FROM contenidos");
	$result = $link->query($sql);
	if ($row = mysqli_fetch_array($result)){ 
	do { 
		echo "<tr>
				<td>".$row["ID"]."</td>
				<td>".$row["titulo"]."</td>";
				if(isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] == true){
					echo "<td><a class='btn btn-info' href='editar-n.php?id=".$row["ID"]."'>Editar</a></td>";
					echo "<td><a class='btn btn-info' href='admin/eliminar-n.php?id=".$row["ID"]."'>Eliminar</a></td>";
				}
					
		echo	"</tr> \n";
				
	} while ($row = mysqli_fetch_array($result)); 
	echo "</table> \n"; 
	} else {
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