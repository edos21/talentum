<?php
error_reporting(0);
session_start();

include '../lib/conexion.php';
include '../lib/seguridadcliente.php';
$compraTotal = 0;
$pagoTotal = 0;
//buscar el id en funcion de su correo
try{

	$sql= 'SELECT * FROM clientes WHERE
	correo=:correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo',$_SESSION['correo']);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar clientes";
	exit();
}

if($row = $s->fetch()){
	$idcliente = $row['id'];
}

// Cargar articulos en espera
try{

	$sql = 'SELECT * FROM compra WHERE
	idcliente=:idcliente';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente',$idcliente);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar compras".$e;
	exit();
}
while ($row = $s->fetch()) {
	$compras[] = array(
		'foto' => $row['foto'],
		'talla' => $row['talla'],
		'oro' => $row['oro'],
		'observacion' => $row['observacion'],
		'precio' => $row['precio'],
		'estado' => $row['estado']);
}

//cargar pagos en espera
try{

	$sql = 'SELECT * FROM pagos WHERE
	idcliente=:idcliente';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente',$idcliente);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar compras".$e;
	exit();
}
while ($row = $s->fetch()) {
	$pagos[] = array(
		'tipo' => $row['tipo'],
		'ndocumento' => $row['ndocumento'],
		'monto' => $row['monto'],
		'observacion' => $row['observacion'],
		'estado' => $row['estado']);
}

?>

<p>Articulos en espera</p>
<table border="1">
	<tr>
		<th>Articulo</th>
		<th>Talla</th>
		<th>Oro</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($compras as $compra): 
			if ($compra['estado'] == 'Espera'){	?>
	<tr>
		<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
		<td><?= $compra['talla'] ?></td>
		<td><?= $compra['oro'] ?></td>
		<td><?= $compra['observacion'] ?></td>
	</tr>
	<?php }
	endforeach ?>
</table>

<p>Pagos en espera</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($pagos as $pago):
			if ($pago['estado'] == 'Espera'){	?>
	<tr>
		<td><?= $pago['tipo'] ?></td>
		<td><?= $pago['ndocumento'] ?></td>
		<td><?= $pago['monto'] ?></td>
		<td><?= $pago['observacion'] ?></td>
	</tr>
	<?php }
	 endforeach ?>
</table>

<p>Articulos Aprobados y Comprados</p>
<table border="1">
	<tr>
		<th>Articulo</th>
		<th>Talla</th>
		<th>Oro</th>
		<th>Observacion</th>
		<th>Precio</th>
	</tr>
	<?php foreach ($compras as $compra): 
			if ($compra['estado'] != 'Espera'){
			$compraTotal += $compra['precio']	?>
	<tr>
		<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
		<td><?= $compra['talla'] ?></td>
		<td><?= $compra['oro'] ?></td>
		<td><?= $compra['observacion'] ?></td>
		<td><?= $compra['precio'] ?></td>
	</tr>
	<?php }
	endforeach ?>
</table>
<p>Total de compras <b><?= $compraTotal ?></b></p>

<p>Pagos Aprobados</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<?php foreach ($pagos as $pago):
			if ($pago['estado'] != 'Espera'){
			$pagoTotal += $pago['monto']		?>
	<tr>
		<td><?= $pago['tipo'] ?></td>
		<td><?= $pago['ndocumento'] ?></td>
		<td><?= $pago['monto'] ?></td>
		<td><?= $pago['observacion'] ?></td>
	</tr>
	<?php }
	 endforeach ?>
</table>
<p>Total de pagos <b><?= $pagoTotal ?></b></p>

<p>Balance de Compras <b><?= $compraTotal - $pagoTotal ?></b></p>
