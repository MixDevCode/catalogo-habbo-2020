<?php
// Initialize the session
session_start();

// Include config file
require_once "assets/db.config.php";

	$id = $_GET['id'];
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];
	
	$sqlu = ("SELECT nombre FROM users WHERE ID = '$id'");
	$result = $link->query($sqlu);
	$row = mysqli_fetch_array($result);
	$nombre = $row["nombre"];
	

	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha eliminado el usuario $nombre', '$horario')";
	$link->query($sqls);
	
	$sql = ("DELETE FROM users WHERE ID = '$id'");
	$link->query($sql);

	
	header("location: ../listar-u.php");
?>