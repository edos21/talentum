<?php

include '../lib/conexion.php';

//buscar el id en funcion de su correo
try{

	$sql= 'SELECT * FROM clientes WHERE
	correo=:correo';

	$s = $pdo->prepare($sql);
	$s->bindValue(':correo',$_POST['correo']);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar clientes";
	exit();
}

if($row = $s->fetch()){
	$idcliente = $row['id'];
}

// Cargar articulos
try{

	$sql = 'SELECT compra.id, compra.foto, compra.talla, compra.costo, precios.descripcion, compra.oro, compra.observacion, compra.precio, compra.estado FROM compra INNER JOIN precios ON precios.id = compra.costo WHERE
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
		'id' => $row['id'],
		'foto' => $row['foto'],
		'talla' => $row['talla'],
		'costo' => $row['costo'],
		'descripcion' => $row['descripcion'],
		'oro' => $row['oro'],
		'observacion' => $row['observacion'],
		'precio' => $row['precio'],
		'estado' => $row['estado']);
}

//cargar pagos
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
		'id' => $row['id'],
		'tipo' => $row['tipo'],
		'ndocumento' => $row['ndocumento'],
		'monto' => $row['monto'],
		'observacion' => $row['observacion'],
		'estado' => $row['estado']);
}


//cargar costos
try{

	$sql = 'SELECT * FROM precios';

	$s = $pdo->prepare($sql);
	$s->execute();
}

catch(PDOException $e){
	echo "Error al cargar precios".$e;
	exit();
}
while ($row = $s->fetch()) {
	$precios[] = array(
		'id' => $row['id'],
		'descripcion' => $row['descripcion'],
		'monto' => $row['monto']);
}

include '../includes/header.html';
?>

	<p>Articulos en espera</p>
	<table border="1">
		<tr>
			<th>Articulo</th>
			<th>Talla</th>
			<th>Oro</th>
			<th>Observacion</th>
			<th>Costo</th>
			<th>Precio</th>
			<th>Estado</th>
			<th colspan="2">Herramientas</th>
		</tr>
		<?php foreach ($compras as $compra): ?>
		<tr>
			<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
			<form action="actualizaCompra.php" method="post">
			<td><input type="text" name="talla" id="talla" value="<?= $compra['talla'] ?>" size="2"></td>
			<td>
				<select name="oro" id="oro">
					<option value="<?= $compra['oro'] ?>"><?= $compra['oro'] ?></option>
					<option disabled>----------</option>
					<?php foreach($precios as $precio): ?>
					<option><?= $precio['descripcion'] ?></option>
					<?php endforeach; ?>
				</select>
			</td>
			<td><input type="text" name="observacion" id="observacion" value="<?= $compra['observacion'] ?>"></td>
			<td>
				<select onChange="recargarPre(this.value)" name="costo" id="costo">
					<option value="<?= $compra['costo'] ?>"><?= $compra['descripcion'] ?></option>
					<option disabled>----------</option>
					<?php foreach($precios as $precio): ?>
					<option value="<?= $precio['id'] ?>"><?= $precio['descripcion'] ?></option>
					<?php endforeach; ?>
				</select>
			</td>
				<td><input type="text" name="precio" id="precio" value="<?= $compra['precio'] ?>"></td>
			<td>
				<select name="estado" id="estado">
					<option><?= $compra['estado'] ?></option>
					<option disabled>----------</option>
					<option>Aprobado</option>
					<option>Espera</option>
				</select>
			</td>	
				<td>
					<input type="hidden" name="id" value="<?= $compra['id'] ?>">
					<input type="submit" value="Modificar">
				</td>
			</form>
			<td>
				<form action="eliminaCompra.php" method="post">
					<input type="hidden" name="id" value="<?= $compra['id'] ?>">
					<input type="submit" value="Eliminar">
				</form>
			</td>
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
			<th>Herramientas</th>
		</tr>
		<?php foreach ($pagos as $pago):	?>
		<tr>
			<td><?= $pago['tipo'] ?></td>
			<td><?= $pago['ndocumento'] ?></td>
			<td><?= $pago['monto'] ?></td>
			<td><?= $pago['observacion'] ?></td>
			<td>
				<form action="modificaPago.php" method="post">
					<input type="hidden" name="id" value="<?= $pago['id'] ?>">
					<input type="submit" value="Modificar">
				</form>
				<form action="eliminaPago.php" method="post">
					<input type="hidden" name="id" value="<?= $pago['id'] ?>">
					<input type="submit" value="Eliminar">
				</form>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
<?php include '../includes/footer.html'; ?>