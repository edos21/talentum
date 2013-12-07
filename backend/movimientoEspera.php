<?php

include '../lib/conexion.php';

// Cargar articulos en espera
try{

	$sql = 'SELECT compra.id, compra.foto, compra.talla, compra.oro, compra.observacion, compra.precio, compra.estado, clientes.nombre, clientes.correo FROM compra INNER JOIN clientes ON clientes.id = compra.idcliente WHERE
	compra.estado =:estado';

	$s = $pdo->prepare($sql);
	$s->bindValue(':estado','Espera');
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
		'oro' => $row['oro'],
		'observacion' => $row['observacion'],
		'precio' => $row['precio'],
		'estado' => $row['estado'],
		'nombre' => $row['nombre'],
		'correo' => $row['correo']);
}

//cargar pagos en espera
try{

	$sql = 'SELECT * FROM pagos WHERE
	estado=:estado';

	$s = $pdo->prepare($sql);
	$s->bindValue(':estado','Espera');
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

?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="../js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript">
	    function recargarPre(val){
	 	
	         $('#precio').val('Calculando...');
	         oro = $('#oro').val();
	         $.ajax({
	          url: 'cargarPre.php',
	          data: 'id='+val+'&oro='+oro,
	          success: function(resp){
	           $('#precio').val(resp)
	           }
	        });
	      }
	</script>
</head>
<body>
	<p>Articulos en espera</p>
	<table border="1">
		<tr>
			<th>Cliente</th>
			<th>Articulo</th>
			<th>Talla</th>
			<th>Oro</th>
			<th>Observacion</th>
			<th>Costo</th>
			<th>Precio</th>
			<th>Aprobar</th>
		</tr>
		<?php foreach ($compras as $compra): ?>
		<tr>
			<td><?= $compra['nombre'] ?> (<?= $compra['correo'] ?>)</td>
			<td><img style="width:70px" src="../img/productos/<?= $compra['foto'] ?>"></td>
			<td><?= $compra['talla'] ?></td>
			<td><?= $compra['oro'] ?></td>
			<td><?= $compra['observacion'] ?></td>
			<form action="aprobarCompra.php" method="post">
				<td><select onChange="recargarPre(this.value)" name="costo" id="costo">
					<option value="">Seleccione...</option>
					<?php foreach($precios as $precio): ?>
					<option value="<?= $precio['id'] ?>"><?= $precio['descripcion'] ?></option>
					<?php endforeach; ?>
				</select></td>
				<td><input type="text" name="precio" id="precio"></td>
				<td>
					<input type="hidden" id="oro" value="<?= $compra['oro'] ?>">
					<input type="hidden" value="<?= $compra['id'] ?>">
					<input type="hidden" value="<?= $compra['correo'] ?>">
					<input type="submit" value="Aprobar">
				</td>
			</form>
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
</body>
</html>