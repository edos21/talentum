<?php
session_start();

include '../lib/conexion.php';

try {
	$sql = 'SELECT * FROM usuarios WHERE
		usuario = :usuario AND
		clave = :clave';
	$s = $pdo-> prepare($sql);
	$s-> bindValue(':usuario', $_POST['usuario']);
	$s-> bindValue(':clave', $_POST['clave']);
	$s-> execute();
}
catch (PDOException $e){
	echo 'error al iniciar sesion';
	exit();
}

if($s->rowCount() == 1){
	$_SESSION['admin'] = true;
	header('location: menu.html.php');
	exit();
}
else {
	if (isset($_POST['error'])){
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	}else{
		header('Location: ' . $_SERVER['HTTP_REFERER']."?error");
}

		}