<?php

include '../lib/conexion.php';

$articulo = $_POST['articulo'];
$categoria = $_POST['categoria'];
$subcategoria = $_POST['subcategoria'];

if (isset($_FILES['joya1']['name'])){
	$joya1 = $_FILES['joya1']['name'];
}else{
	$joya1 = "";
}

if (isset($_FILES['foto1']['name'])){
	$foto1 = $_FILES['foto1']['name'];
}else{
	$foto1 = "";
}

if($articulo == "" || $categoria == "" || $subcategoria == "" || $joya1 == "" || $foto1 == ""){
	?>
<?php
	
	include ('../includes/header.html');

?>
	<center>
		
	<h2>Favor Ingrese todos los datos Requeridos</h2><br>
	<a class="BtnVolver" href="javascript:history.back()">Volver</a>
	<br><br>
	</center>
<?php

	include ('../includes/footer.html');

?>
	<?php
}else{
	try{
		$sql = 'INSERT INTO articulos SET
		articulo = :articulo,
		descripcion = :descripcion,
		categoria = :categoria,
		subcategoria = :subcategoria,
		peso = :peso,
		joya1 = :joya1,
		foto1 = :foto1,
		joya2 = :joya2,
		foto2 = :foto2,
		joya3 = :joya3,
		foto3 = :foto3,
		joya4 = :joya4,
		foto4 = :foto4';

		$s =$pdo->prepare($sql);
		$s->bindValue(':articulo',$articulo);
		$s->bindValue(':descripcion',$_POST['descripcion']);
		$s->bindValue(':categoria',$categoria);
		$s->bindValue(':subcategoria',$subcategoria);
		$s->bindValue(':peso',$_POST['peso']);
		$s->bindValue(':joya1',$joya1);
		$s->bindValue(':foto1',$foto1);
		$s->bindValue(':joya2',$_FILES['joya2']['name']);
		$s->bindValue(':foto2',$_FILES['foto2']['name']);
		$s->bindValue(':joya3',$_FILES['joya3']['name']);
		$s->bindValue(':foto3',$_FILES['foto3']['name']);
		$s->bindValue(':joya4',$_FILES['joya4']['name']);
		$s->bindValue(':foto4',$_FILES['foto4']['name']);
		$s->execute();

		$directorio = '../img/productos/';
		move_uploaded_file($_FILES['joya1']['tmp_name'],$directorio.$joya1);
		move_uploaded_file($_FILES['foto1']['tmp_name'],$directorio.$foto1);
		move_uploaded_file($_FILES['joya2']['tmp_name'],$directorio.$_FILES['joya2']['name']);
		move_uploaded_file($_FILES['foto2']['tmp_name'],$directorio.$_FILES['foto2']['name']);
		move_uploaded_file($_FILES['joya3']['tmp_name'],$directorio.$_FILES['joya3']['name']);
		move_uploaded_file($_FILES['foto3']['tmp_name'],$directorio.$_FILES['foto3']['name']);
		move_uploaded_file($_FILES['joya4']['tmp_name'],$directorio.$_FILES['joya4']['name']);
		move_uploaded_file($_FILES['foto4']['tmp_name'],$directorio.$_FILES['foto4']['name']);
		?>
<?php
	
	include ('../includes/header.html');

?>
			<h2>Articulo Guardado</h2><br>
			<a href="agregarArticulo.php">Agregar otro Articulo</a>
			<a class="BtnVolver"  href="menu.html.php">Volver al menu</a>
		<br>
		<br>
<?php

	include ('../includes/footer.html');

?>
		<?php
		
	}
	

	catch(PDOException $e){

			echo "Ha ocurrido un error";
			exit();

		}
}

?>