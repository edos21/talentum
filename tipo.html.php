<?php
session_start();
  include 'lib/conexion.php';
  error_reporting (0);

  try{

    $sql = 'SELECT * FROM articulos WHERE subCategoria=:subcategoria';

    $s = $pdo->prepare($sql);
    $s->bindValue(':subcategoria', $_GET['subcategoria']);
    $s->execute();

    while($row = $s->fetch()){
      $articulos[]= array(
        'id'=>$row['id'],
        'articulo'=>$row['articulo'],
        'descripcion'=>$row['descripcion'],
        'subCategoria'=>$row['subCategoria'],
        'joya1'=>$row['joya1'],
        'foto1'=>$row['foto1'],
        'joya2'=>$row['joya2'],
        'foto2'=>$row['foto2'],
        'joya3'=>$row['joya3'],
        'foto3'=>$row['foto3'],
        'joya4'=>$row['joya4'],
        'foto4'=>$row['foto4']);
    }
  }
  catch(PDOException $e){
    echo "error al cargar las categorias".$e;
    exit();
  }

  if (isset($_GET['id'])){
    try{

      $sql = 'SELECT * FROM articulos WHERE subCategoria=:subcategoria AND id=:id';

      $s = $pdo->prepare($sql);
      $s->bindValue(':subcategoria', $_GET['subcategoria']);
      $s->bindValue(':id', $_GET['id']);
      $s->execute();

      while($row = $s->fetch()){
        $items[]= array(
          'id'=>$row['id'],
          'articulo'=>$row['articulo'],
          'descripcion'=>$row['descripcion'],
          'subCategoria'=>$row['subCategoria'],
          'joya1'=>$row['joya1'],
          'foto1'=>$row['foto1'],
          'joya2'=>$row['joya2'],
          'foto2'=>$row['foto2'],
          'joya3'=>$row['joya3'],
          'foto3'=>$row['foto3'],
          'joya4'=>$row['joya4'],
          'foto4'=>$row['foto4']);
      }
    }
    catch(PDOException $e){
      echo "error al cargar las categorias".$e;
      exit();
  }
  }else{
    try{

      $sql = 'SELECT * FROM articulos WHERE subCategoria=:subcategoria';

      $s = $pdo->prepare($sql);
      $s->bindValue(':subcategoria', $_GET['subcategoria']);
      $s->execute();

      if($row = $s->fetch()){
        $items[]= array(
          'id'=>$row['id'],
          'articulo'=>$row['articulo'],
          'descripcion'=>$row['descripcion'],
          'subCategoria'=>$row['subCategoria'],
          'joya1'=>$row['joya1'],
          'foto1'=>$row['foto1'],
          'joya2'=>$row['joya2'],
          'foto2'=>$row['foto2'],
          'joya3'=>$row['joya3'],
          'foto3'=>$row['foto3'],
          'joya4'=>$row['joya4'],
          'foto4'=>$row['foto4']);
      }
    }
    catch(PDOException $e){
      echo "error al cargar las categorias".$e;
      exit();
  }
  }
?>

<!doctype html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="image/x-icon" href="img/icon.ico" rel="icon" />
<link type="image/x-icon" href="img/icon.ico" rel="shortcut icon" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Exo+2:400,700,200' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/horizontal.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>
<script type="text/javascript" src="js/Modal.js"></script>  
  </head>
  
  <body>

<header>
    <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="./">Inicio</a>
            </li>
            <li>
              <a href="categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="contacto.php">Contacto</a>
            </li>
            <li>

              <a href="#">Cliente</a>
              <ul class="barraNavSubmenu">
              <?php if ($_SESSION['login'] != true){ ?>
                <li>
                  <a href="#login" name="modal">Ingresar</a>
                </li>
                <li>
                  <a href="#dialog" name="modal">Registrarse</a>
                </li>
              <?php }else{ ?>
                <li>
                  <a href="cliente/pago.php">Pagar</a>
                </li>
                <li>
                  <a href="cliente/estado.php">Estado Compras</a>
                </li>
                <li>
                  <a href="cliente/modificar.php">Actualizar Datos</a>
                </li>
                <li>
                  <a href="lib/salir.php">Cerrar Sesion</a>
                </li>
              <?php } ?>
              </ul>

            </li>
          </ul>
        </nav>

      </div>

    </div>
    <div class="container_12 barraPrincipal">
      <div class="grid_12">
        <div class="grid_4">
          <a href="./">
          
          <img src="img/logo.png" alt="">
          </a>
        </div>
        
        <div class="grid_4 push_4">
          <div class="row oro">
            <div class="orito">
              <img src="img/oro.png" alt="">
            </div>
          <div class="precioro">
		<?php include 'includes/precio.php'?>
          </div>
          </div>
        </div> 
      </div>
    </div>
  </header>


    <div class="container_12 contenedorprincipal">
      <h2 class="TextCategoria">Articulos</h2>
      <?php if (isset($items)){
       foreach($items as $item): ?>
      <div class="grid_4">
        
        <?php if (isset($_GET['foto2'])) { ?>
        <img style="width:300px; height:300px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['foto2'] ?>" alt="">
        <?php } elseif(isset($_GET['foto3'])) { ?>
        <img style="width:300px; height:300px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['foto3'] ?>" alt="">
        <?php } elseif(isset($_GET['foto4'])) { ?>
        <img style="width:300px; height:300px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['foto4'] ?>" alt="">
        <?php } else { ?>
        <img style="width:300px; height:300px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['foto1'] ?>" alt="">
        <?php } ?>
        <center></center>
        <div class="ContSubcategoriaMini">
          <div class="grid_1">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto1">
              <img style="width:61px; height:61px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['joya1'] ?>" alt="">
            </a>
          </div>
          <?php if ($item['joya2'] != ""){ ?>
          <div class="grid_1">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto2">
              <img style="width:61px; height:61px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['joya2'] ?>" alt="">
            </a>
          </div>
          <?php } if ($item['joya3'] != ""){ ?>
          <div class="grid_1">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto3">
              <img style="width:61px; height:61px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['joya3'] ?>" alt="">
            </a>
          </div>
          <?php } if ($item['joya4'] != ""){ ?>
          <div class="grid_1">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto4">
              <img style="width:61px; height:61px;box-shadow: 0 0 5px black;" src="img/productos/<?php echo $item['joya4'] ?>" alt="">
            </a>
          </div>
         <?php } 
          if (isset($_GET['foto2'])) { ?>
      <div class="grid_4 omega alpha" style="padding:10px 0;">
        <form action="cliente/comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla"> 
          <br>
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <br>
          
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="Indicar si el anillo llevará algun grabado personalizado." cols="40" rows="3">
          	
          </textarea>

          <input type="hidden" name="foto" value="<?php echo $item['foto2'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
 
					<br>
          <center>
						<input type="submit" value="Comprar" class="BtnComprar">
						<a class="BtnVolver"  href="categorias.html.php">Volver</a>
          </center>
        </form>
      </div>            
        <?php } elseif(isset($_GET['foto3'])) { ?>
      <div class="grid_4 omega alpha" style="padding:10px 0;"> 
        <form action="cliente/comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla"> 
          <br>
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <br>
          
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="Indicar si el anillo llevará algun grabado personalizado." cols="40" rows="3">
          	
          </textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto3'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <center>
						<input type="submit" value="Comprar" class="BtnComprar">
						<a class="BtnVolver"  href="categorias.html.php">Volver</a>
          </center>
        </form>
      </div> 
        <?php } elseif(isset($_GET['foto4'])) { ?>
        
      <div class="grid_4 omega alpha" style="padding:10px 0;">
        <form action="cliente/comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla"> 
          <br>
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <br>
          
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="Indicar si el anillo llevará algun grabado personalizado." cols="40" rows="3">
          	
          </textarea>
          
          <input type="hidden" name="foto" value="<?php echo $item['foto4'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <br>

          <center>
						<input type="submit" value="Comprar" class="BtnComprar">
						<a class="BtnVolver"  href="categorias.html.php">Volver</a>
          </center>
        </form>
      </div> 
        <?php } else { ?>
      <div class="grid_4 omega alpha" style="padding:10px 0;">
        <form action="cliente/comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla"> 
          <br>
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <br>
          
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="Indicar si el anillo llevará algun grabado personalizado." cols="40" rows="3">
          	
          </textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto1'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <br>

          <center>
						<input type="submit" value="Comprar" class="BtnComprar">
						<a class="BtnVolver"  href="categorias.html.php">Volver</a>
          </center>
        </form>
      </div> 
        <?php } ?>
        </div>
      </div>
      <?php endforeach; } ?>
      <div class="grid_8 omega">
        <?php
          if (count($articulos) > 0){
            
            foreach($articulos as $articulo):  ?>
              <a href="tipo.html.php?subcategoria=<?php echo $articulo['subCategoria'] ?>&id=<?php echo $articulo['id'] ?>"><div class="grid_2 alpha"><img style="width:140px; height:140px" src="img/productos/<?php echo $articulo['foto1'] ?>" alt=""></div></a>
        <?php endforeach;
          }else{?>
        <center>
          <div class="ContSubcategoriaMed omega alpha grid_12">
						<h2 style="padding:10px;">No se encontraron Articulos</h2>
						<a href="categorias.html.php" class="BtnVolver">Volver al menú</a>
						<br>
          </div>
        </center>
      <?php } ?>
      </div>
    </div>
    <footer>
      <div class="container_12 contfooter colordegradado2">
        <img src="img/anillos.png" alt="" class="anillofooter">
        <div class="grid_3 txtfooter">
          <p>Talentum Joyas</p>
          <ul>
            <li>Dirección: Av. 20 con calle 28 y 29, Edificio Balmoral, Piso 1.</li>
            <li>Teléfono: +58416-6572119</li>
            <li>E-mail:</li>
          </ul>
        </div>
        <div class="grid_2 txtfooter">
          <p>Sitemap</p>
          <ul>
            <li>
              <a href="#">Inicio</a>
            </li>
            <li>
              <a href="#">Portafolio</a>
            </li>
            <li>
              <a href="#">Contacto</a>
            </li>
            <li>
              <a href="backend/ingreso.php">Admin</a>
            </li>
          </ul>
        </div>
        <div class="grid_3 txtfooter">
          <p>Redes Sociales</p>
          <ul class="listfootercontac listfootersocial">
            <li>
              <a href="#">
                <img src="img/fb.png" alt="">Facebook</a>
            </li>
            <li>
              <a href="#">
                <img src="img/tw.png" alt="">Twitter</a>
            </li>
            <li>
              <a href="#">
                <img src="img/yt.png" alt="">Google+</a>
            </li>
          </ul>
        </div>
      </div>
    </footer>
    
<?php
	
	include ('/includes/ModalBox.html');

?>
  </body>

</html>
