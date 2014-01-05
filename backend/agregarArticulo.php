<?php

	include '../lib/conexion.php';
	include '../lib/seguridad.php';

	try{
		$sql= 'SELECT * FROM categoria';
		$s = $pdo->prepare($sql);
		$s->execute();
	}
	catch(PDOException $e){
		echo "error al cargar categorias";
		exit();
	}
	while($row = $s->fetch()){
		$categorias[] = array(
			'id' => $row['id'],
			'nombre' => $row['nombre']);
	}
?>
<?php
	
	include ('../includes/header.html');

?>


  <h2><img src="../img/iconadmin/add.png" alt="">Agregar Articulos</h2>
  
  <div class="push_10">
    
  <a class="BtnVolver" href="menu.html.php">Volver</a>
  </div>
  <form method="post" action="guardarArticulo.php" enctype="multipart/form-data" class="FormAdmin">

    <div class="grid_4">

      <label for="articulo">Articulo</label>
      <input type="text" name="articulo" id="articulo">
      <label for="descripcion">Descripcion</label>
      <textarea rows="8" cols="34"  name="descripcion" id="descripcion"></textarea>
      <label for="categoria">Categoria</label>
      <select onChange="recargarSub(this.value)" name="categoria" id="categoria">
        <option value="">Seleccione...</option>
        <?php foreach($categorias as $categoria): ?>
        <option value="<?php echo $categoria['id'] ?>">
          <?php echo $categoria[ 'nombre'] ?>
        </option>
        <?php endforeach; ?>
      </select>

      <label for="subcategoria">SubCategoria</label>
      <select name="subcategoria" id="subcategoria">
        <option value="">Seleccione...</option>
      </select>
      <label for="peso">Peso</label>
      <input type="text" id="peso" name="peso">
    </div>


    <div class="grid_3">

      <label for="foto1">Foto 1</label>
      <input type="file" name="foto1" id="foto1" accept="image/*">
      
      <label for="joya1">Joya 1</label>
      <input type="file" name="joya1" id="joya1" accept="image/*">
      
      <label for="foto2">Foto 2</label>
      <input type="file" name="foto2" id="foto2" accept="image/*">
      <label for="joya2">Joya 2</label>
      <input type="file" name="joya2" id="joya2" accept="image/*">
    </div>
    
    <div class="grid_3">
      

      <label for="foto3">Foto 3</label>
      <input type="file" name="foto3" id="foto3" accept="image/*">
      <label for="joya3">Joya 3</label>
      <input type="file" name="joya3" id="joya3" accept="image/*">
      <label for="foto4">Foto 4</label>
      <input type="file" name="foto4" id="foto4" accept="image/*">
      <label for="joya4">Joya 4</label>
      <input type="file" name="joya4" id="joya4" accept="image/*">
      

      
    </div>
    <div class="clearfix"></div>
    <hr>
    <div class="Botonera" >
      <input type="submit" value="Guardar">
    </div>
  </form>

<?php

	include ('../includes/footer.html');

?>
