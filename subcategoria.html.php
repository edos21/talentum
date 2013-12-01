<?php
  error_reporting(0);
  include 'lib/conexion.php';

  try{

    $sql = 'SELECT subcategoria.id, subcategoria.subnombre, subcategoria.img, categoria.nombre FROM subcategoria INNER JOIN categoria ON categoria.id = subcategoria.idcategoria WHERE idCategoria=:idcategoria';

    $s = $pdo->prepare($sql);
    $s->bindValue(':idcategoria', $_GET['categoria']);
    $s->execute();

    while($row = $s->fetch()){
      $subcategorias[]= array(
        'id'=>$row['id'],
        'subnombre'=>$row['subnombre'],
        'img'=>$row['img'],
        'nombre'=>$row['nombre']);
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
  <h2 class="TextCategoria"><?php echo $subcategorias[0]['nombre'] ?></h2>
    <?php
    if (count($subcategorias) > 0){
      foreach($subcategorias as $subcategoria): ?>
      <div class="grid_2">
        <div class="ContCatg">
          
            <img src="img/<?php echo $subcategoria['img'] ?>" alt="">
          <a href="tipo.html.php?subcategoria=<?php echo $subcategoria['id'] ?>">
          <div class="ContCatgTxt">
            <p><?php echo $subcategoria['subnombre'] ?></p>
          </div>
          </a>
        </div>
      </div>
      <?php endforeach; 
      }else{?>
      <center>
        <h2>No se encontraron SubCategorias</h2>
        <a href="categorias.html.php">Volver a Categorias</a>
      </center>
      
      <?php } ?>
  </div>
  <footer>
    <div class="container_12 contfooter colordegradado2">
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
          <li><a href="./">Inicio</a></li>
          <li><a href="categorias.html.php">Productos</a></li>
          <li><a href="#">Contacto</a></li>
          <li><a href="backend/menu.html.php">Admin</a></li>
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