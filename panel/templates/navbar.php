<!DOCTYPE html>
<!-- Navbar-->
    <header class="app-header">
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
		<center>
		<img src="<?php echo $row["Keko"];?>&headonly=1"/>
          <p class="app-sidebar__user-name" style="color:white"><?php echo $_SESSION["username"];?></p>
          <p class="app-sidebar__user-designation" style="color:white"><?php echo $row["Rango"];?></p>
		</center>
	  <hr color="white">
      <ul class="app-menu">
        <li><a class="app-menu__item" href="index.php"><img src="admin/assets/inicio.png" /><span class="app-menu__label">&nbspInicio</span></a></li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><img src="admin/assets/catalogo.png" /><span class="app-menu__label">&nbspCatálogo</span><i class="treeview-indicator fa fa-angle-right"></i></a>
			<ul class="treeview-menu">
				<li><a class="treeview-item" href="rares.php"><img src="admin/assets/rares.png" />&nbsp Rares</a></li>
				<li><a class="treeview-item" href="megas.php"><img src="admin/assets/megas.png" />&nbsp Megas</a></li>
				<li><a class="treeview-item" href="ltd.php"><img src="admin/assets/ltd.png" />&nbsp LTD</a></li>
				<li><a class="treeview-item" href="agregar.php"><img src="admin/assets/add.png" />&nbsp Agregar</a></li>
			</ul>
		</li>
		<?php if ($row["Rango"] == "Administrador") {?>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><img src="admin/assets/user.png" /><span class="app-menu__label">&nbsp Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="crear-u.php"><img src="admin/assets/user-c.png" />&nbsp Crear</a></li>
            <li><a class="treeview-item" href="listar-u.php"><img src="admin/assets/user-l.png" />&nbsp Listar</a></li>
          </ul>
        </li>
		<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><img src="admin/assets/noticias.png" /><span class="app-menu__label">&nbsp Noticias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="crear-n.php"><img src="admin/assets/user-c.png" />&nbsp Crear</a></li>
            <li><a class="treeview-item" href="listar-n.php"><img src="admin/assets/user-l.png" />&nbsp Listar</a></li>
          </ul>
        </li>
		<?php } ?>
		<li><a class="app-menu__item" href="logout.php"><img src="admin/assets/logout.png" /><span class="app-menu__label">&nbspCerrar sesión</span></a></li>
      </ul>
    </aside>