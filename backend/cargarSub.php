<?php
	session_start()
	include '../lib/conexion.php';

	try{

		$sql = 'SELECT * FROM subcategoria WHERE idCategoria =:idCategoria';
		$s = $pdo->prepare($sql);
		$s->bindValue(':idCategoria', $_GET['id']);
		$s->execute();

	}
	catch(PDOException $e){
		echo "Error al cargar SubCategorias";
		exit();
	}
 	?> <option value="">Seleccione...</option> <?php
	while($row = $s->fetch()){ ?>
	<option value="<?php echo $row['id']?>"><?php echo $row['subnombre']?></option>
	<?php } 

?>