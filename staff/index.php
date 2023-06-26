<?php

// Include config file
require_once "../panel/admin/assets/db.config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Catálogo de HLandia - Administración</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- styles -->
  <link href="../assets/css/bootstrap.css" rel="stylesheet">
  <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">
  <link href="../assets/css/prettyPhoto.css" rel="stylesheet">
  <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet">
  <link href="../assets/css/flexslider.css" rel="stylesheet">

  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/color/default.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,600,400italic|Open+Sans:400,600,700" rel="stylesheet">

  <!-- fav and touch icons -->
  <link rel="shortcut icon" href="../assets/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
</head>


<body>
  <div id="wrapper">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/assets/templates/navbar.php"; ?>
    <!-- Subintro
================================================== -->
    <section id="subintro">
      <div class="container">
        <div class="row">
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">Administración</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="maincontent" class="demo">
      <div class="container">
        <div class="row">
          <div class="span7">
			  <div class="tabbable tabs-top">
                  <ul class="nav nav-tabs">
                    <li class="active"><a href="#one" data-toggle="tab"><i class="icon-cogs"></i> Administradores</a></li>
					<li><a href="#two" data-toggle="tab"><i class="icon-edit"></i> Economistas</a></li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane active" id="one">
			  <?php
	$sql = ("SELECT ID, Keko, Nombre, Rango FROM users WHERE Rango = 'Administrador'");
	$result = $link->query($sql);
	if ($row = mysqli_fetch_array($result)){ 
	do { 
		echo "<div class='span3'>
                <div class='priceBox'>
                  <h4 class='light'><img src='".$row["Keko"]."'</img></h4>
				  <h4 class='light'>".$row["Nombre"]."</h4>
                </div>
			</div>";
	} while ($row = mysqli_fetch_array($result)); 
	} else { 
	}
?>
</div>
					<div class="tab-pane" id="two">
					<?php 
	$sql = ("SELECT ID, Keko, Nombre, Rango FROM users WHERE Rango = 'Economista'");
	$result = $link->query($sql);
	if ($row = mysqli_fetch_array($result)){ 
	do { 
		echo "<div class='span3'>
                <div class='priceBox'>
                  <h4 class='light'><img src='".$row["Keko"]."'</img></h4>
				  <h4 class='light'>".$row["Nombre"]."</h4>
                </div>
			</div>";
	} while ($row = mysqli_fetch_array($result)); 
	} else { 
	}
?>
					</div>
                  </div>
                </div>
				</div>
			<div class="row">
			<div class="span4">
                <!-- start: Accordion -->
                <div class="accordion" id="accordion2">
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle active" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
									<i class="icon-minus"></i> Administrador </a>
                    </div>
                    <div id="collapseOne" class="accordion-body collapse in">
                      <div class="accordion-inner">
                        Se encarga de la programación del catálogo, además de dar los respectivos rangos. Trabaja junto al Economista para lograr que todos los elementos aquí listados sean correctos.
                      </div>
                    </div>
                  </div>
                  <div class="accordion-group">
                    <div class="accordion-heading">
                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
									<i class="icon-plus"></i> Economista </a>
                    </div>
                    <div id="collapseThree" class="accordion-body collapse">
                      <div class="accordion-inner">
                        El Economista está encargado de la adición, administración y corrección de precios de los distintos rares/megas/ltd que se encuentran en este catálogo, revisa minuciosamente la relación cantidad/precio para obtener el mejor precio asequible que le corresponde a cada uno.
                      </div>
                    </div>
                  </div>
                </div>
				</div>
				</div>
              </div>
			</div>
			
    </section>
 
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/assets/templates/footer.php"; ?>

  </div>
  <!-- end wrapper -->
  <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-48 active"></i></a>
  <script src="../assets/js/jquery.js"></script>
  <script src="../assets/js/raphael-min.js"></script>
  <script src="../assets/js/jquery.easing.1.3.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
  <script src="../assets/js/google-code-prettify/prettify.js"></script>
  <script src="../assets/js/jquery.elastislide.js"></script>
  <script src="../assets/js/jquery.prettyPhoto.js"></script>
  <script src="../assets/js/jquery.flexslider.js"></script>
  <script src="../assets/js/jquery-hover-effect.js"></script>
  <script src="../assets/js/animate.js"></script>

  <!-- Template Custom JavaScript File -->
  <script src="../assets/js/custom.js"></script>

</body>

</html>