<?php

session_start();

include '../lib/conexion.php';
include '../lib/seguridad.php';

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

try{

	$sql = 'SELECT * FROM compra WHERE
	idcliente=:idcliente
	AND estado=:estado';

	$s = $pdo->prepare($sql);
	$s->bindValue(':idcliente',$idcliente);
	$s->bindValue(':estado','Espera');
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar compras".$e;
	exit();
}
while ($row = $s->fetch()) {
	$comprasEspera[] = array(
		'foto' => $row['foto'],
		'talla' => $row['talla'],
		'oro' => $row['oro'],
		'observacion' => $row['observacion']);
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
	<?php foreach ($comprasEspera as $compraEspera): ?>
	<tr>
		<td><img style="width:70px" src="../img/productos/<?= $compraEspera['foto'] ?>"></td>
		<td><?= $compraEspera['talla'] ?></td>
		<td><?= $compraEspera['oro'] ?></td>
		<td><?= $compraEspera['observacion'] ?></td>
	</tr>
	<?php endforeach ?>
</table>

<p>Pagos en espera</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
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
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<p>Total de compras <b>TOTAL</b></p>

<p>Pagos Aprobados</p>
<table border="1">
	<tr>
		<th>Tipo</th>
		<th>Nro Documento</th>
		<th>Monto</th>
		<th>Observacion</th>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<p>Total de pagos <b>TOTAL</b></p>

<p>Total <b>TOTAL</b></p>