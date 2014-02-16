<?php
    session_start();
    include '../lib/seguridad.php';
    include '../lib/conexion.php';
    include '../includes/header.html';
    
    try{
        $sql = 'SELECT * FROM materiales';
        
        $s = $pdo->prepare($sql);
        $s->execute();
    } catch(PDOException $e){
        echo 'error al seleccionar la tabla';
        exit();
    }
    while($row = $s->fetch()){
		$materiales[] = array(
		    'id'=>$row['id'],
			'nombre'=>$row['nombre'],
			'precio'=>$row['precio'],
			'estado'=>$row['estado']);
	}
?>

    <h2>Cambiar Precio de Materiales</h2>
    <p>Usar el punto (.) como separador decimal</p>
    <div class="push_10">
        <a class="BtnVolver" href="menu.html.php">Volver</a>
    </div>
	
	<div class="grid_11">
		<center>
			<table class="TablaEstilo" border="0">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Precio</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($materiales as $material): ?>
					<tr>
						<td><?php echo $material['nombre']; ?></td>
						<td>
							<form action="actualizaMaterial.php" method="post">
								<input type="hidden" name="id" value="<?php echo $material['id'];?>">
								<input type="text" name="precio" value="<?php echo $material['precio'];?>">
								<select name="estado">
								    <option><?php echo $material['estado'];?></option>
								    <option disabled>----</option>
								    <option>Arriba</option>
								    <option>Abajo</option>
								</select>
								<input type="submit" value="Actualizar">
							</form>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</center>
	
	</div>
	<div class="clearfix"></div>
		

<?php

	include '../includes/footer.html';

?>
