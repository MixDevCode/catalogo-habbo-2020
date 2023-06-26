<?php

// Include config file
require_once "../panel/admin/assets/db.config.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Catálogo - Megas</title>
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
              <li class="active">Megas</li>
            </ul>
          </div>
          <div class="span4">
            <div class="search">
              <form class="input-append">
                <input class="search-form" id="myInput" type="text" onkeyup="myFunction()" placeholder="Buscar un mega por su nombre.." />
                <button class="btn btn-dark" type="submit">Buscar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="maincontent">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="centered">
              <table class="table table-hover" id="myTable" cellspacing="0">
						<thead>
							<tr>
								<th></th>
								<th>Nombre</th>
								<th>Valor</th>
								<th>Descripción</th>
							</tr>
						</thead>
						<tbody>
							<?php
	$sql = ("SELECT ID, imagen, nombre, valor, descripcion, categoria FROM rares WHERE categoria = 'Megas' order by valor DESC");
	$result = $link->query($sql);
	if ($row = mysqli_fetch_array($result)){ 
	do { 
		echo "<tr>
				<td><img src='".$row["imagen"]."'</img></td>
				<td>".$row["nombre"]."</td>
				<td>".$row["valor"]." <img src='$furniurl'></img></td>
				<td>".$row["descripcion"]."</td>";
		echo	"</tr> \n";
				
	} while ($row = mysqli_fetch_array($result)); 
	echo "</table> \n"; 
	} else { 
		echo "<tr>
				<td>No</td>
				<td>se</td>
				<td>encontró</td>
				<td>valores.</td>
				</tr> \n";
		echo "</table> \n"; 
	}
?>
						</tbody>
					</table>
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
  <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

</body>

</html>
