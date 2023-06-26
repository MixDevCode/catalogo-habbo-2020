<?php
// Initialize the session
session_start();

// Include config file
require_once "assets/db.config.php";

	$id = $_GET['id'];
	$ct = $_GET['ct'];
	$horario = date ('Y-m-d H:i:s', time());
	$nombreu = $_SESSION["username"];
	date_default_timezone_set("America/Argentina/Buenos_Aires");
	
	$sqlr = ("SELECT nombre FROM rares WHERE ID = '$id'");
	$result = $link->query($sqlr);
	$row = mysqli_fetch_array($result);
	$nombrer = $row["nombre"];

	$sqls = "INSERT INTO logs (nombre, accion, horario)".
		"VALUES ('$nombreu', 'Ha eliminado el rare/mega/ltd $nombrer', '$horario')";
	$link->query($sqls);
	
	$sql = ("DELETE FROM rares WHERE ID = '$id'");
	$link->query($sql);
	if ($ct = "rares") {
		header("location: ../rares.php");
	} else {
		if ($ct = "megas") {
			header("location: ../megas.php");
		} else {
			if ($ct = "ltd") {
				header("location: ../ltd.php");
			}
		}
	}
?>