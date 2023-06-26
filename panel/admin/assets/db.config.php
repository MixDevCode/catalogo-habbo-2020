<?php

header("Content-Type: text/html; charset=utf-8");

date_default_timezone_set("America/Argentina/Buenos_Aires");

/* Database credentials. Assuming you are running MySQL
	server with default setting (user 'root' with no password) */
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'rareshl');
	 
	/* Attempt to connect to MySQL database */
	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}		

$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];

$furniurl = "https://static.habbo-happy.net/img/furni/small/251239090226590.gif";

if (strpos($url,'panel') !== false) {
    // User select
	$user = $_SESSION['username'];
	$sql = ("SELECT Nombre, Rango, Keko FROM users where Nombre = '$user'");
	$result = $link->query($sql);
	$row = mysqli_fetch_array($result);
}
?>