<?php
// Initialize the session
session_start();

// Include config file
require_once "assets/db.config.php";

	$id = $_GET['id'];
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];
	
	$sqlu = ("SELECT titulo FROM contenidos WHERE ID = '$id'");
	$result = $link->query($sqlu);
	$row = mysqli_fetch_array($result);
	$titulo = $row["titulo"];
	

	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha eliminado la noticia $titulo', '$horario')";
	$link->query($sqls);
	
	$sql = ("DELETE FROM contenidos WHERE ID = '$id'");
	$link->query($sql);

	
	header("location: ../listar-n.php");
?>