<?php
    include 'lib/conexion.php';
    
    try{

        $sql = 'SELECT * FROM articulos WHERE articulo LIKE "%":q"%" OR descripcion LIKE "%":q"%"';

        $s = $pdo->prepare($sql);
        $s->bindValue(':q', $_GET['q']);
        $s->execute();
    } catch(PDOException $e){
        echo "error al cargar las categorias".$e;
        exit();
    }
    while($row = $s->fetch()){
      $articulos[]= array(
        'id'=>$row['id'],
        'subCategoria'=>$row['subCategoria'],
        'articulo'=>$row['articulo'],
        'descripcion'=>$row['descripcion'],
        'foto1'=>$row['foto1']);
    }
?>

<h1>Busqueda de articulos</h1>

<?php foreach($articulos as $articulo): ?>
    <img src="img/productos/<?php echo $articulo['foto1'] ?>">
    <a href="tipo.html.php?subcategoria=<?php echo $articulo['subCategoria'] ?>&id=<?php echo $articulo['id'] ?>"><?php echo $articulo['articulo'] ?></a>
    <p><?php echo $articulo['descripcion'] ?></p>
    <br>

<?php endforeach; ?>
