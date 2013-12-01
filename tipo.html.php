<?php

  include 'lib/conexion.php';

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
    <title>Talemtum Joyas | Inicio</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/960_12_col.css">
    <script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
    <script src="js/cufon-yui.js" type="text/javascript"></script>
    <script src="js/GreyscaleBasic.font.js" type="text/javascript"></script>
    <link type="text/css" href="css/jquery.ui.theme.css" rel="stylesheet" />
    <link type="text/css" href="css/jquery.ui.core.css" rel="stylesheet" />
    <link type="text/css" href="css/jquery.ui.slider.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  </head>
  
  <body>
    <div class="fondoNegro colordegradado"></div>
<header>
    <div class="BarraSuperior">
    
      <div class="container_12">
      
        <nav class="barraNav">
          <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="categorias.html.php">Productos</a></li>
            <li><a href="contacto.html">Contacto</a></li>
            <li>
              
              <a href="contacto.html">Cliente</a>
              <ul class="barraNavSubmenu">
                <li><a href="#">Ingresar</a></li>
                <li><a href="#">Registrarse</a></li>
              </ul>
              
            </li>
          </ul>
        </nav>
        
      </div>
      
    </div>
    <div class="container_12 barraPrincipal">
      <div class="grid_12">
        <div class="grid_4">
          <a href="#">
          
          <img src="img/logo.png" alt="">
          </a>
        </div>
        
        <div class="grid_4 push_4">
          <div class="row oro">
            <div class="orito">
              <img src="img/oro.png" alt="">
            </div>
          <div class="precioro">
            <p>Precio del Oro</p>
            <p>99999,99 $
            <img src="img/FlechaArriba.png" alt="">
            </p>
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
      <div class="ContSubcategoria grid_4">
        <?php if (isset($_GET['foto2'])) { ?>
        <img style="width:300px; height:300px" src="img/productos/<?php echo $item['foto2'] ?>" alt="">
        <?php } elseif(isset($_GET['foto3'])) { ?>
        <img style="width:300px; height:300px" src="img/productos/<?php echo $item['foto3'] ?>" alt="">
        <?php } elseif(isset($_GET['foto4'])) { ?>
        <img style="width:300px; height:300px" src="img/productos/<?php echo $item['foto4'] ?>" alt="">
        <?php } else { ?>
        <img style="width:300px; height:300px" src="img/productos/<?php echo $item['foto1'] ?>" alt="">
        <?php } ?>
        <div class="ContSubcategoriaMini">
          <div class="grid_1 omega">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto1">
              <img style="width:61px; height:61px" src="img/productos/<?php echo $item['joya1'] ?>" alt="">
            </a>
          </div>
          <?php if ($item['joya2'] != ""){ ?>
          <div class="grid_1 omega">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto2">
              <img style="width:61px; height:61px" src="img/productos/<?php echo $item['joya2'] ?>" alt="">
            </a>
          </div>
          <?php } if ($item['joya3'] != ""){ ?>
          <div class="grid_1 omega">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto3">
              <img style="width:61px; height:61px" src="img/productos/<?php echo $item['joya3'] ?>" alt="">
            </a>
          </div>
          <?php } if ($item['joya4'] != ""){ ?>
          <div class="grid_1 omega">
            <a href="tipo.html.php?subcategoria=<?php echo $item['subCategoria'] ?>&id=<?php echo $item['id']?>&foto4">
              <img style="width:61px; height:61px" src="img/productos/<?php echo $item['joya4'] ?>" alt="">
            </a>
          </div>
         <?php } 
          if (isset($_GET['foto2'])) { ?>
        <form action="comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla">
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="indicar si el anillo llevara algun grabado"></textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto2'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <input type="submit" value="Comprar">
        </form>
        <?php } elseif(isset($_GET['foto3'])) { ?>
        <form action="comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla">
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="indicar si el anillo llevara algun grabado"></textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto3'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <input type="submit" value="Comprar">
        </form>
        <?php } elseif(isset($_GET['foto4'])) { ?>
        <form action="comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla">
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="indicar si el anillo llevara algun grabado"></textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto4'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <input type="submit" value="Comprar">
        </form>
        <?php } else { ?>
        <form action="comprarArticulo.html.php" method="post">
          <label for="talla">Talla:</label>
          <input type="text" name="talla" id="talla">
          <label for="oro">Oro:</label>
          <select name="oro" id="oro">
            <option value="">Seleccione...</option>
            <option>18Kilates</option>
            <option>10Kilates</option>
          </select>
          <label for="observaciones">Observaciones:</label>
          <textarea name="observaciones" id="observaciones" placeholder="indicar si el anillo llevara algun grabado"></textarea>
          <input type="hidden" name="foto" value="<?php echo $item['foto1'] ?>" >
          <input type="hidden" name="iditem" value="<?php echo $item['id'] ?>" >
          <input type="submit" value="Comprar">
        </form>
        <?php } ?>
        </div>
      </div>
      <?php endforeach; } ?>
      <div class="grid_8 omega ContSubcategoriaMed">
        <?php
          if (count($articulos) > 0){
            foreach($articulos as $articulo): ?>
              <a href="tipo.html.php?subcategoria=<?php echo $articulo['subCategoria'] ?>&id=<?php echo $articulo['id'] ?>"><div class="grid_2 alpha"><img style="width:140px; height:140px" src="img/productos/<?php echo $articulo['foto1'] ?>" alt=""></div></a>
        <?php endforeach;
          }else{?>
        <center>
          <h2>No se encontraron Articulos</h2>
          <a href="categorias.html.php">Volver a Categorias</a>
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
              <a href="backend/menu.html.php">Admin</a>
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
  </body>

</html>