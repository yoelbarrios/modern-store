<?php
    include('php/conexion.php');
    $registros=mysqli_query($link,"select id, categoria from categorias order by categoria asc");
    cerrarconexion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda</title>
  <!--start estilos propios-->
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/normalizar.css">
  <!--start bootstrap-->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <script src="js/bootstrap.min.js"></script>
  <!--end bootstrap-->
  <!--fuentes-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:200,400">
  <!--iconos-->
  <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
  <script src="https://kit.fontawesome.com/b478cabd51.js" crossorigin="anonymous"></script>
  <!--jquery-->
  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <!--script header-->
  <script type="text/javascript" src="js/header.js"></script>

</head>

<body>
  <!--start header-->
  <header>
    <nav>
      <ul>
        <li class="logo"><img src="img/logo.png" alt=""></li>
        <li class="btn"><span class="fas fa-bars"></span></li>
        <div class="items">
          <li><a href="#"><span class="lnr lnr-home"></span>Inicio</a></li>
          <li><a href="#"><span class="lnr lnr-briefcase"></span>Productos</a>
            <ul>
              <?php
                while($fila=mysqli_fetch_array($registros)){
                  //echo utf8_encode($fila['categoria']); sirve para mostrar las tildes
              ?>
                <li> <a href="#"><?php echo $fila['categoria']; ?></a></li>
              <?php
                }
              ?>
            </ul>
          </li>
          <li><a href="#"><span class="lnr lnr-rocket"></span>Cuenta</a></li>
          <li><a href="#"><span class="lnr lnr-users"></span>Contacto</a></li>
        </div>
        <li class="search-icon">
          <input type="search" placeholder="Buscar Producto">
          <label class="icon">
            <span class="fas fa-search"></span>
          </label>
        </li>
      </ul>
    </nav>
  </header>
  <!--end header-->

<!-- start slider -->

  <section class="slider-contenedor">
        <div class="miSlider animacion">
            <img src="img/slide1.jpg" alt="">
        </div>
        <div class="miSlider animacion">
            <img src="img/slide2.jpg" alt="">
        </div>
        <div class="miSlider animacion">
            <img src="img/slide3.jpg" alt="">
        </div>
        <div class="direcciones">
            <a href="#" class="anterior" onclick="avanzaSlide(-1)">&#10094;</a>
            <a href="#" class="siguiente" onclick="avanzaSlide(1)">&#10095;</a>
        </div>
        <div class="barras">
            <span class="barra active" onclick="posicionSlide(1)"></span>
            <span class="barra" onclick="posicionSlide(2)"></span>
            <span class="barra" onclick="posicionSlide(3)"></span>
        </div>
    </section>


<!-- end slider -->
  <!--start main-->
  <section class='main'>
    <!--contenedor principal-->
    <div class='contenedor'>
      <!-- start targeta de producto -->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $12.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://i.blogs.es/385ce7/mando-p4/450_1000.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            BEATS HEADPHONE
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            RED
          </div>
          <div class='span'>
            BEATS
          </div>
          <div class='span'>
            HEADPHONE
          </div>
        </div>
      </div>
      <!-- end targeta de producto -->

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $12.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://tctechcrunch2011.files.wordpress.com/2014/11/solo2-wireless-red-quarter.jpg?w=738'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            BEATS HEADPHONE
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            RED
          </div>
          <div class='span'>
            BEATS
          </div>
          <div class='span'>
            HEADPHONE
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $1200.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://www.bell.ca/Styles/wireless/all_languages/all_regions/catalog_images/large/iPhoneX_spgry-en_lrg.png'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            IPHONE X
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            IPHONE
          </div>
          <div class='span'>
            PHONE
          </div>
          <div class='span'>
            MOBILE
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $5.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://www.masgamers.com/wp-content/uploads/2019/03/1.-ROG-Zephyrus-S.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Black Shoes
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            SHOES
          </div>
          <div class='span'>
            FORMAL
          </div>
          <div class='span'>
            LEATHER
          </div>
        </div>
      </div>

      <!--targeta de contenido-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $44.55
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://img.tecnomagazine.net/2017/01/razer.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Camera Lens
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            CAMERA
          </div>

          <div class='span'>
            GADGET
          </div>
          <div class='span'>
            LENS
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $5.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://home.ripley.com.pe/Attachment/WOP_5/2065243083089/2065243083089_2.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Black Shoes
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            SHOES
          </div>
          <div class='span'>
            FORMAL
          </div>
          <div class='span'>
            LEATHER
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $5.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://mecanorba.com/wp-content/uploads/2019/09/apple-watch-Series-5-GPS-Nike-gris-espacial-aluminio-44mm-Sport-Loop-Black-y-plata-aluminio-44mm-Sport-Band-Pure-Platinum.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Black Shoes
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            SHOES
          </div>
          <div class='span'>
            FORMAL
          </div>
          <div class='span'>
            LEATHER
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $5.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://as.com/meristation/imagenes/2020/02/10/noticias/1581347400_144086_1581347453_noticia_normal.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Black Shoes
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            SHOES
          </div>
          <div class='span'>
            FORMAL
          </div>
          <div class='span'>
            LEATHER
          </div>
        </div>
      </div>

      <!--targeta de producto-->
      <div class='card'>
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              $5.95
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='https://elchapuzasinformatico.com/wp-content/uploads/2019/04/iPad-Pro.jpg'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            Black Shoes
          </div>
          <div class='carrito'>
            <span class='lnr lnr-cart'></span>
          </div>
        </div>
        <div class='card-footer'>
          <div class='span'>
            SHOES
          </div>
          <div class='span'>
            FORMAL
          </div>
          <div class='span'>
            LEATHER
          </div>
        </div>
      </div>


    </div>
  </section>
  <!--end main-->

  <!--start footer-->
  <footer>
    <div class="footer-container">
      <div class="left-col">
        <div class="social-media">
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
          <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <p class="rights-text">© 2020 Creado Por YoelCode Todos Los Derechos Reservados</p>
      </div>

      <div class="right-col">
        <p>Politicas De Privacidad</p>
        <p>Contacto</p>
      </div>
    </div>
  </footer>
  <!--end footer-->
  <script src="js/slider.js"></script>
</body>

</html>