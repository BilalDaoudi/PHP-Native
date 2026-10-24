<?php
	//$hostname = "vs-wamp";
	$hostname = "localhost";	
	$base= "Location_Voitures";
	//$loginBD= "Base";	
	$loginBD= "root";	
	//$passBD="Base";
	$passBD="";
	//$pdo = null;
	try {
		$dsn = "mysql:server=$hostname ; dbname=$base";
		$pdo = new PDO ($dsn, $loginBD, $passBD,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
		echo utf8_encode("Echec de connexion : " . $e->getMessage() . "\n");
		die(); // On arrête tout.
	}
?>	