<?php

	include '../lib/conexion.php';

	$tipo = $_POST['tipo'];
	$monto = $_POST['monto'];
	$estado = $_POST['estado'];
	$correo = $_POST['correo'];

	if ($tipo == "" || $monto== "" || $estado == "" || $correo == "") 
	{
		?>

		<h2>Favor ingrese todos los datos</h2><br>
		<a href="javascript:history.back()">Volver</a>

		<?php
	}else
	{
		try{
			$sql = 'SELECT * FROM clientes WHERE correo = :correo';

			$s = $pdo->prepare($sql);
			$s->bindValue(':correo', $correo);
			$s->execute();
		}
		catch(PDOException $e){
			echo "ha ocurrido un error";
			exit();
		}

		if ($row = $s->fetch()){
			$idcliente = $row['id'];

		try{

			$sql = 'INSERT INTO pagos SET
			idcliente = :idcliente,
			tipo = :tipo,
			ndocumento = :ndocumento,
			monto = :monto,
			observacion = :observaciones,
			estado = :estado
			';

			$s = $pdo->prepare($sql);
			$s->bindValue(':idcliente',$idcliente);
			$s->bindValue(':tipo',$tipo);
			$s->bindValue(':ndocumento',$_POST['ndocumento']);
			$s->bindValue(':monto',$monto);
			$s->bindValue(':observaciones',$_POST['observaciones']);
			$s->bindValue(':estado',$estado);
			$s->execute();

		?>

			<h2>Pago Guardado</h2><br>
			<a href="agregarPago.php">Agregar otro Pago</a>
			<a href="menu.html.php">Volver al menu</a>

		<?php
		}

		catch(PDOException $e){

			echo "Ha ocurrido un error".$e;
			exit();

		}
	}
}