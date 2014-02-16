<?php
  session_start();
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
      <div class="Banner">
    	<img src="img/banner/banner.jpg" alt="">
    </div>
  <h2 class="TextCategoria"><?php echo $subcategorias[0]['nombre'] ?></h2>
    <?php
    if (count($subcategorias) > 0){
      foreach($subcategorias as $subcategoria): ?>
      <div class="grid_2">
        <div class="ContCatg">        
          <a href="tipo.html.php?subcategoria=<?php echo $subcategoria['id'] ?>">
          <img style="width:140px" src="img/<?php echo $subcategoria['img'] ?>" alt="">
          <div class="ContCatgTxt">
            <p><?php echo $subcategoria['subnombre'] ?></p>
          </div>
          </a>
        </div>
      </div>
      <?php endforeach; 
      }else{?>
<div style="width:100%;height:100px;">
	<center>
		<h2>No se encontraron SubCategorias</h2>
		<br>
		<a href="categorias.html.php" class="BtnVolver">Volver a Categorias</a>
	</center>

</div>
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
          <li><a href="contacto.php">Contacto</a></li>
          <li><a href="backend/ingreso.php">Admin</a></li>
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
  
  <?php
	
	include ('/includes/ModalBox.html');

?>
</body>
</html>
