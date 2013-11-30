<?php

session_start();

include 'lib/conexion.php';
include 'lib/seguridad.php';

try{
	$sql = 'SELECT * FROM clientes WHERE correo = :correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo', $_SESSION['correo']);
	$s->execute();
}
catch(PDOException $e){
	echo "ha ocurrido un error";
	exit();
}

if ($row = $s->fetch()){
	$idcliente = $row['id'];
}

try{
	$sql = 'INSERT INTO compra SET
	idcliente = :idcliente,
	idarticulo = :idarticulo,
	foto = :foto,
	talla = :talla,
	oro = :oro,
	observacion = :observacion';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente', $idcliente);
	$s->bindValue(':idarticulo', $_POST['id']);
	$s->bindValue(':foto', $_POST['foto']);
	$s->bindValue(':talla', $_POST['talla']);
	$s->bindValue(':oro', $_POST['oro']);
	$s->bindValue(':observacion', $_POST['observaciones']);
	$s->execute();
}

catch(PDOException $e){
	echo "ha ocurrido un error".$e;
	exit();
}

header( "refresh:5;url=categorias.html.php" )
?>
				
<h2>Solicitud Realizada</h2><br>
<p>El navegador lo redireccionara automaticamente en 5 segundos</p>
<a href="categorias.html.php">Volver al inicio</a>