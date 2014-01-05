<?php
  session_start();
  error_reporting(0);
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
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Talentum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Kite+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/horizontal.css">
<!--  Load jQuery -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>

<!--  JS del MODAL WIndows -->
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


  <div class="slider">
    <div class="sliderBarra">
      <p>
        <img src="img/Search.png" alt=""><input type="search">
      </p>
    </div>
    <div class="TituloSlider">
      <p><span>Talentum Joyas</span><br>
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic, ipsum harum sed sint reprehenderit nemo enim repellendus quas veritatis quia!</p>
    </div>
    <div class="cycle-slideshow" data-cycle-next="#next3" data-cycle-prev="#prev3" data-cycle-tile-vertical=false data-cycle-speed="1000">
      
      <img src="img/slider/1.jpg">
      <img src="img/slider/2.jpg">
      <img src="img/slider/3.jpg">
      <img src="img/slider/4.jpg">


    </div>
  </div>


  <div class="container_12 contenedorprincipal ContDegradado">
    <div class="sliderpequeno ">
<div class="pagespan ">
  <div class="wrap">



    <div class="frame" id="basic" style="overflow: hidden;">
      <ul style="-webkit-transform: translateZ(0px) translateX(-228px); width: 6840px;">
	<?php foreach($categorias as $categoria): ?>        
	<li>
	<a href="subcategoria.html.php?categoria=<?= $categoria['id']?>">
          <img style="width:120px" src="img/<?= $categoria['img']?>" alt="">
          <div class="ContCatgTxt">
            <p><?= $categoria['nombre']?></p>
          </div>
	</a>
        </li>
	<?php endforeach; ?>
      </ul>
    </div>
    <div class="scrollbar">
      <div class="handle" style="-webkit-transform: translateZ(0px) translateX(38px); width: 190px;">
        <div class="mousearea"></div>
      </div>
    </div>
  </div>
</div>
    </div>




    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%201.html" width="300" height="395" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%20124.html" width="300px" height="395px" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_4 cuadro360">
      <div class="Barra360">
        <p>Lorem ipsum dull!</p>
      </div>
      <img src="img/360.png" alt="" class="png360">
      <iframe src="Anillo3D/ANILLO%202.html" width="300px" height="395px" frameborder="0"></iframe>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>

    <div class="grid_7">
      <video src="video/video.webm" width="540" height="304" controls>
  
        Your browser does not support the video tag.
      </video>
      <!--      <iframe width="540" height="304" src="//www.youtube.com/embed/NJuujXUp-UQ" frameborder="0" allowfullscreen></iframe>-->
    </div>
    <div class="grid_5">
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/InvertirOro" data-widget-id="402202542399950848">Tweets por @InvertirOro</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

    </div> <div class="clearfix"></div>

      <div class="grid_4 CuadroText">
        <p>Visión</p>
        <p class="CuadroTextPadding">Hacer de nuestra empresa un líder nacional y regional en procesos de producción  joyería, y tener como prioridad  incluir a personas con discapacidad y darles  capacitación  para incorporarlos a nuestra compañía...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
      </div>
      <div class="grid_4 CuadroText">
        <p>Misión</p>
        <p class="CuadroTextPadding">Proporcionar  a nuestros clientes productos con costo razonable y de alta calidad, con diseños innovadores de diferente materiales ya sea aleaciones de metales, metales preciosos, piedras semipreciosas, como también piedras preciosas...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
      </div>
      <div class="grid_4 CuadroText">
        <p>Empresa</p>
        <p class="CuadroTextPadding">Iniciamos nuestras actividades hace dos años y en el 2013 creamos la compañía  con tecnologías de control numérico  por computadora (CNC), es un sistema que permite controlar en todo momento la posición de un elemento físico, normalmente una herramienta que está montada en una máquina...
          <br>
          <a class="btnVermas" href="#empresa" name="modal">+ ver más.</a>
        </p>
        <br>
      
      </div>
  </div>
  <footer>
    <div class="container_12 contfooter colordegradado2">
      <img src="img/anillos.png" alt="" class="anillofooter">
      <div class="grid_3 txtfooter">
        <p>
          Talentum Joyas
        </p>
        <ul>
          <li>Email: talentumjoyas@hotmail.com</li>
          <li>Teléfono: +58416-6572119</li>
        </ul>
      </div>
      <div class="grid_2 txtfooter">
        <p>
          Sitemap
        </p>
        <ul>
          <li>
            <a href="./">Inicio</a>
          </li>
          <li>
            <a href="categorias.html.php">Portafolio</a>
          </li>
          <li>
            <a href="contacto.php">Contacto</a>
          </li>
          <li>
            <a href="backend/menu.html.php">Admin</a>
          </li>
        </ul>
      </div>
      <div class="grid_3 txtfooter">
        <p>
          Redes Sociales
        </p>
        <ul class="listfootercontac listfootersocial">
          <li>
            <a href="#">
              <img src="img/fb.png" alt=""> Facebook</a>
          </li>
          <li>
            <a href="http://www.twitter.com/talentumjoyas" target="_blank">
              <img src="img/tw.png" alt=""> Twitter</a>
          </li>
          <li>
            <a href="#">
              <img src="img/yt.png" alt=""> Google+</a>
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
