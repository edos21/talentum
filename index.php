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
<title>Talemtum Joyas | Inicio</title>
<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/960_12_col.css">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<script language="JavaScript" type="text/javascript" src="local 5- 6x8_VR.37/files/KeyShotVR.js"></script>
<link rel="stylesheet" href="css/horizontal.css">
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/jquery.cycle2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle2.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/vendor.js"></script>
<script type="text/javascript" src="js/sly.min.js"></script>
<script type="text/javascript" src="js/horizontal.js"></script>
  
  <script language="JavaScript" type="text/javascript">
    
    
    var keyshotVR;

    function initKeyShotVR() {
      var nameOfDiv = "KeyShotVR";
      var folderName = "local 5- 6x8_VR.37";
      var imageWidth = 300;
      var imageHeight = 395;
      var backgroundColor = "#FFFFFF";
      var uCount = 24;
      var vCount = 1;
      var uWrap = true;
      var vWrap = false;
      var uMouseSensitivity = -0.048000;
      var vMouseSensitivity = 0.720000;
      var uStartIndex = 12;
      var vStartIndex = 0;
      var minZoom = 1.000000;
      var maxZoom = 1.000000;
      var rotationDamping = 0.960000;
      var windowResizable = false;
      var enableLOD = false;
      var addResizableGUIButton = false;
      var addPlayGUIButton = false;
      var imageExtension = "jpg";
      var showLoading = true;
      keyshotVR = new keyshotVR(nameOfDiv, folderName, imageWidth, imageHeight, backgroundColor, uCount, vCount, uWrap, vWrap, uMouseSensitivity, vMouseSensitivity, uStartIndex, vStartIndex, minZoom, maxZoom, rotationDamping, windowResizable, enableLOD, addResizableGUIButton, addPlayGUIButton, imageExtension, showLoading);
    }

    window.onload = initKeyShotVR;
</script>

 <script type="text/javascript">
 $(document).ready(function() {
 $('a[name=modal]').click(function(e) {
 e.preventDefault();
 var id = $(this).attr('href');
 var maskHeight = $(document).height();
 var maskWidth = $(window).width();
 $('#mask').css({'width':maskWidth,'height':maskHeight});
 $('#mask').fadeIn(1000);
 $('#mask').fadeTo("slow",0.8);
 var winH = $(window).height();
 var winW = $(window).width();
 $(id).css('top', winH/2-$(id).height()/2);
 $(id).css('left', winW/2-$(id).width()/2);
 $(id).fadeIn(2000);
 });
 $('.window .close').click(function (e) {
 e.preventDefault();
 $('#mask, .window').hide();
 });
 $('#mask').click(function () {
 $(this).hide();
 $('.window').hide();
 });
 });
 </script>  
  
</head>

<body>
  <div class="fondoNegro colordegradado"></div>

  <header>
    <div class="BarraSuperior">

      <div class="container_12">

        <nav class="barraNav">
          <ul>
            <li>
              <a href="#">Inicio</a>
            </li>
            <li>
              <a href="categorias.html.php">Productos</a>
            </li>
            <li>
              <a href="contacto.html">Contacto</a>
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


  <div class="slider">
    <div class="sliderBarra">
      <input type="search">
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
        <li>
          <img src="img/a1.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a2.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a3.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a4.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
        <li>
          <img src="img/a5.jpg" alt="">
          <div class="ContCatgTxt">
            <p>Anillo</p>
          </div>
             
        </li>
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
      <img src="img/360.png" alt="" class="png360">
      <div id="KeyShotVR"></div>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>
    <div class="grid_4 cuadro360">
      <img src="img/360.png" alt="" class="png360">
      <div id="KeyShotVR"></div>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>
    <div class="grid_4 cuadro360">
      <img src="img/360.png" alt="" class="png360">
      <div id="KeyShotVR"></div>

      <img src="img/sombra1.png" alt="" class="sombra">
    </div>


    <center>
      <img src="img/separador.png" alt="">
      <div class="txtPrincipal">
        <p>Lorem ipsum dolor.</p>
        <h1>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A, impedit, sed dolorem soluta in illum dicta provident unde ut sequi optio minus quidem id est mollitia ad quaerat sint eum.</h1>
      </div>
    </center>
    <div class="grid_7">
      <!--      <iframe width="540" height="304" src="//www.youtube.com/embed/NJuujXUp-UQ" frameborder="0" allowfullscreen></iframe>-->
    </div>
    <div class="grid_5">
      <!--      <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/InvertirOro" data-widget-id="402202542399950848">Tweets por @InvertirOro</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>-->

    </div>
    <div class="grid_4">
      <p>Mision</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, aliquid, praesentium, veniam distinctio voluptatum asperiores odit mollitia optio incidunt fugiat dignissimos ad dicta voluptatibus sequi hic adipisci recusandae. Impedit, sapiente.</p>
    </div>
    <div class="grid_4">
      <p>Vision</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, aliquid, praesentium, veniam distinctio voluptatum asperiores odit mollitia optio incidunt fugiat dignissimos ad dicta voluptatibus sequi hic adipisci recusandae. Impedit, sapiente.</p>
    </div>
    <div class="grid_4">
      <p>Lorem</p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora, aliquid, praesentium, veniam distinctio voluptatum asperiores odit mollitia optio incidunt fugiat dignissimos ad dicta voluptatibus sequi hic adipisci recusandae. Impedit, sapiente.</p>
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
        <p>
          Redes Sociales
        </p>
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
  
<div id="modalBoxes">
  <div id="mask"></div>

  <div id="dialog" class="window">
    <a href="#" class="FloatRight close">
      <img src="img/exit.png" alt="">
    </a>

    <form class="FormRegistro" action="registrar.php" method="POST">

      <?php if (isset($_GET[ 'error'])) { ?>
      <h4>Error, Favor verifique que todos los datos estan correctamente llenados o que ya no se encuentra registrado</h4>
      <input type="hidden" name="error">
      <?php } ?>

      <div class="grid_2 ModalLogo">
        <img src="img/business_user_add.png" alt="">

      </div>

      <div class="grid_4">
        <label for="nombre">Razon Social/Nombre*</label>
        <br>
        <input type="text" name="nombre" id="nombre">
        <br>

        <label for="rif">Rif/Cedula</label>
        <br>
        <input type="text" name="rif" id="rif">
        <br>
      </div>

      <div class="grid_6">
        
        <label for="correo">Correo*</label>
        <br>
        <input type="mail" name="correo" id="correo" placeholder="ejemplo@dominio.com">
        <br>
        <label for="celular">Celular</label>
        <br>
        <input type="text" name="celular" id="celular">
        <br>
        
      </div>
      <div class="grid_4">

        <label for="clave">Contrase&ntilde;a*</label>
        <br>
        <input type="password" name="clave" id="clave">
        <br>


        <label for="cclave">Repetir Contrase&ntilde;a*</label>
        <br>
        <input type="password" name="cclave" id="cclave">
        <br>
        <p style="font-size:10px;color:red">La clave debe tener mas de 8 caracteres</p>
        <br>

      </div>
      <div class="grid_6">



        <label for="direccion">Direcci&oacute;n</label>
        <br>
        <textarea cols="50" rows="5" name="direccion" id="direccion"></textarea>
        <br>

        <label for="telefono">Telefono</label>
        <br>
        <input type="text" name="telefono" id="telefono">
        <br>


      </div>

      <div class="clearfix"></div>
      <input class="FloatRight BtnVerde" type="submit" value="Registrar">

    </form>
  </div>

  <div id="login" class="window">
    <a href="#" class="FloatRight close">
      <img src="img/exit.png" alt="">
    </a>

    
  </div>
</div>
  
</body>

</html>