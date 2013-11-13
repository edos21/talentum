<?php
	
	try{

		$pdo = new PDO('mysql:host=localhost;dbname=talentum','root','');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$pdo->exec('SET NAMES "utf8"');

	}

	catch(PDOException $e){

		echo "Ha ocurrido un error al conectar la base de datos".$e;
		exit();
		
	}

?>