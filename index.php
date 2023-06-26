<?php 
// Include config file
require_once "panel/admin/assets/db.config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Catálogo - Inicio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="assets/css/bootstrap.css" rel="stylesheet">
  <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="assets/css/flexslider.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

</head>


<body>
  <div id="wrapper">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/assets/templates/navbar.php"; ?>
    <section id="intro">
    </section>
    <section id="maincontent">
      <div class="container">

        <div class="row">
          <div class="span12">
            <div class="call-action">
				<center>
                <h2>Catálogo de Precios</h2>
                <p>
                  Bienvenid@ al Catálogo de Precios, esta es la web para conocer<br> todos los precios de todos los rares, 
				  megas y LTD del hotel, <br>para que no te surjan problemas a la hora de tradearlos.
                </p></center>
            </div>
            <!-- end tagline -->
          </div>
        </div>
        <div class="row">
          <div class="span12">
            <h3><center>Ultimos añadidos</center></h3>
			<div class="row">
			  <?php 
	$sql = ("SELECT ID, Imagen, Nombre, Valor, Descripcion, categoria FROM rares ORDER BY ID DESC LIMIT 4");
	$result = $link->query($sql);
	if ($row = mysqli_fetch_array($result)){ 
	do { 
		echo "<div class='span3'>
                <div class='priceBox'>
                  <h4 class='light'><img src='".$row["Imagen"]."'</img></h4>
				  <h4 class='light'>".$row["Nombre"]."</h4>
                  <hr>
                  <span class='emphasis'>".$row["Valor"]." <img src='$furniurl'></img></span>
                  <hr>
                  <span>".$row["Descripcion"]."</span>
                  <hr>
                  <span class='emphasis-2'><a class='btn btn-theme'>".$row["categoria"]."</a></span>
                </div>
			</div>";
	} while ($row = mysqli_fetch_array($result)); 
	echo "</div>";
	} else { 
	}
?>
          </div>
		</div>
      </div>
    </section>
	<?php require_once $_SERVER['DOCUMENT_ROOT']."/assets/templates/footer.php"; ?>
  </div>
  <!-- end wrapper -->
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>

  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/raphael-min.js"></script>
  <script src="assets/js/jquery.easing.1.3.js"></script>
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/google-code-prettify/prettify.js"></script>
  <script src="assets/js/jquery.elastislide.js"></script>
  <script src="assets/js/jquery.prettyPhoto.js"></script>
  <script src="assets/js/jquery.flexslider.js"></script>
  <script src="assets/js/jquery-hover-effect.js"></script>
  <script src="assets/js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="assets/js/custom.js"></script>

</body>
</html>
