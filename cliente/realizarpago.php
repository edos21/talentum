<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';

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
	$sql = 'INSERT INTO pagos SET
	idcliente = :idcliente,
	tipo = :tipo,
	ndocumento = :ndocumento,
	monto = :monto,
	observacion = :observacion,
	estado = :estado';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente', $idcliente);
	$s->bindValue(':tipo', $_POST['tipo']);
	$s->bindValue(':ndocumento', $_POST['ndocumento']);
	$s->bindValue(':monto', $_POST['monto']);
	$s->bindValue(':observacion', $_POST['observaciones']);
	$s->bindValue(':estado', 'Espera');
	$s->execute();
}

catch(PDOException $e){
	echo "ha ocurrido un error".$e;
	exit();
}

header( "refresh:5;url=../" )
?>
				
<h2>Pago Realizado</h2><br>
<p>El navegador lo redireccionara automaticamente en 5 segundos</p>
<a href="../">Volver al inicio</a>
