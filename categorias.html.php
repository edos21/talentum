<?php

  include 'lib/conexion.php';

  try{

    $sql = 'SELECT * FROM categoria';

    $s = $pdo->prepare($sql);
    $s->execute();

    while($row = $s->fetch()){
      $categorias[]= array(
        'id'=>$row['id'],
        'nombre'=>$row['nombre'],
        'img'=>$row['img']);
    }
  }
  catch(PDOException $e){
    echo "error al cargar las categorias".$e;
    exit();
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
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen"/>
</head>
<body>
    <div class="fondoNegro colordegradado"></div>
  <header>
    <div class="container_12 barraPrincipal">
      <div class="grid_12">
        <div class="grid_4 logo">
          <a href="#">
          
          <img src="img/logo.png" alt="">
          </a>
        </div>
        
        <div class="grid_4 push_4">
          <nav class="barraNav">
            <ul>
              <li><a href="index.html">Inicio</a></li>
              <li><a href="categorias.html.php">Productos</a></li>
              <li><a href="contacto.html">Contacto</a></li>
            </ul>
          </nav>
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
    <h2 class="TextCategoria">Categorias</h2>
    <?php foreach($categorias as $categoria): ?>
    <div class="grid_2">
      <div class="ContCatg">
        
          <img src="img/<?php echo $categoria['img'] ?>" alt="">
        <a href="subcategoria.html.php/?id=<?php echo $categoria['id'] ?>">
        <div class="ContCatgTxt">
          <p><?php echo $categoria['nombre'] ?></p>
        </div>
        </a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <footer>
    <div class="container_12 contfooter colordegradado">
      <img src="img/anillos.png" alt="" class="anillofooter">
      <div class="grid_3 txtfooter">
        <p>
          Talentum Joyas
        </p>
        <ul>
          <li>Dirección: Av. 20 con calle 28 y 29, Edificio Balmoral, Piso 1.</li>
          <li>Teléfono: +58416-6572119</li>
          <li>E-mail:</li>
        </ul>
      </div>
      <div class="grid_2 txtfooter">
        <p>
          Sitemap
        </p>
        <ul>
          <li><a href="#">Inicio</a></li>
          <li><a href="#">Portafolio</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="#">Admin</a></li>
        </ul>
      </div>
      <div class="grid_3 txtfooter">
        <p>
          Redes Sociales
        </p>
            <ul class="listfootercontac listfootersocial">
              <li><a href="#"><img src="img/fb.png" alt=""> Facebook</a></li>
              <li><a href="#"><img src="img/tw.png" alt=""> Twitter</a></li>
              <li><a href="#"><img src="img/yt.png" alt=""> Google+</a></li>
            </ul>
      </div>
    </div>
  </footer>
</body>
</html>