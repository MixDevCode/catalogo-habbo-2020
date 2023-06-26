<?php

// Include config file
require_once "../panel/admin/assets/db.config.php";

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$no_of_records_per_page = 3;
$offset = ($pagina-1) * $no_of_records_per_page; 

$total_pages_sql = "SELECT COUNT(*) FROM contenidos";
$result = mysqli_query($link,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Catálogo de HLandia - Noticias</title>
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
  <link href="../assets/css/noticias.css" rel="stylesheet">
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
    <header>
      <?php require_once $_SERVER['DOCUMENT_ROOT']."/assets/templates/navbar.php"; ?>
    <!-- Subintro
================================================== -->
    <section id="subintro">
      <div class="container">
        <div class="row">
          <div class="span8">
            <ul class="breadcrumb">
              <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
              <li class="active">Noticias</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section id="maincontent">
      <div class="container">
        <div class="row">
          <div class="span4">
            <aside>
              <div class="widget">
                <h4 class="rheading">Noticias recientes<span></span></h4>
				<?php
					$sql = ("SELECT ID, Titulo, Fecha FROM contenidos order by ID DESC LIMIT 4");
					$result = $link->query($sql);
						if ($row = mysqli_fetch_array($result)){
							do { 
		echo "<ul>
				<li><a href='vernot.php?id=".$row["ID"]."'>".$row["Titulo"]."</a>
				<div class='clear'>
                </div>
				<span class='date'><i class='icon-calendar'></i>".$row["Fecha"]."</span>
				</li>";
		echo	"</ul>";
				
	} while ($row = mysqli_fetch_array($result)); 
	echo "</div> \n";
	} else {
	}	?>
            </aside>
          </div>
          <div class="span8">
            <!-- start article -->
			<?php
					$sql = ("SELECT ID, Titulo, Fecha, short_desc FROM contenidos order by ID DESC LIMIT $offset, $no_of_records_per_page");
					$result = $link->query($sql);
						if ($row = mysqli_fetch_array($result)){
							do { 
		echo "<article class='blog-post'>
              <div class='post-heading'>
                <h3><a href='vernot.php?id=".$row["ID"]."'>".$row["Titulo"]."</a></h3>
              </div>
              <div class='row'>
                <div class='span8'>
                  <ul class='post-meta'>
                    <li class='first'><i class='icon-calendar'></i><span>".$row["Fecha"]."</span></li>
                  </ul>
                  <div class='clearfix'>
                  </div>
				  <p>
                  ".$row["short_desc"]."
				  </p>
                  <a href='vernot.php?id=".$row["ID"]."' class='btn btn-small btn-theme'>Leer más</a>
                </div>
              </div>
            </article>";
	} while ($row = mysqli_fetch_array($result)); 
	} else {
	}	?>
            
            <!-- end article -->
            <div class="pagination">
              <ul>
    <li><a href="?pagina=1">Primera</a></li>
    <li class="<?php if($pagina <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($pagina <= 1){ echo '#'; } else { echo "?pagina=".($pagina - 1); } ?>">Anterior</a>
    </li>
    <li class="<?php if($pagina >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($pagina >= $total_pages){ echo '#'; } else { echo "?pagina=".($pagina + 1); } ?>">Siguiente</a>
    </li>
    <li><a href="?pagina=<?php echo $total_pages; ?>">Ultima</a></li>
			</ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer
 ================================================== -->
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