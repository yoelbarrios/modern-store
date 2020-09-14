<?php
    include('php/conexion.php');
    $registros1=mysqli_query($link,"select id, categoria from categorias order by categoria asc");
    $registros2=mysqli_query($link,"select * from productos where inicio=1");
    //$registros2=mysqli_query($link,"select id_producto,nombre, precio from productos limit 0,12"); para limitar la cantidad de productos
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
  <link rel="stylesheet" href="css/alerts.css">
  
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
  <header class="header">
    <nav>
      <ul>
        <li class="logo"><a href="#"><strong>Yoel </strong>Code</a> </li>
        <li class="btn"><span class="fas fa-bars"></span></li>
          <form class="search-icon" action="php/buscador.php" method="Post">
            <input type="search" placeholder="Buscar Producto" name="buscar">
            <button type="submit" class="icon">
              <span class="fas fa-search"></span>
            </button>
          </form>
        <div class="items">
          <li><a href="#"><span class="lnr lnr-home"></span>Inicio</a></li>
          <li><a href="#"><span class="lnr lnr-store"></span>Productos</a>
            <ul>
              <?php
                while($fila1=mysqli_fetch_assoc($registros1)){
                  //echo utf8_encode($fila['categoria']); sirve para mostrar las tildes
              ?>
                <li> <a href="php/verproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo $fila1['categoria']; ?></a></li>
              <?php
                }
              ?>
            </ul>
          </li>
          <li><a href="clientes/formregistroclientes.php"><span class="lnr lnr-users"></span>Registrate</a></li>
          <li><a href="#"><span class="lnr lnr-user"></span>Ingresar</a></li>
        </div>

      </ul>
    </nav>
  </header>
  <!--end header-->
  <?php 
    if(isset($_GET['alert']) && $_GET['alert']=='validado'){
  ?>  
     <!--start alert-->
            <div id="" class="contenedor-alert ">
                <div class="msg-alert-success" id="msg-alert">
                    <span class="fas fa-check-circle"></span>
                    <span class="msg-success">Verificación correcta ya puede iniciar a comprar</span>
                </div>
            </div>
      <!--end alert--> 
  <?php
    }
  ?>
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
      <?php
      while ($fila2=mysqli_fetch_assoc($registros2)) {
        $registros3=mysqli_query($link,"select nombre from imagenes where id_producto = '$fila2[id_producto]' and prioridad=1");
        $fila3=mysqli_fetch_assoc($registros3);
      ?>
      <a class='card' href="php/detalleproducto.php?id_categoria=<?php echo $fila2['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto']; ?>">
      <!-- start targeta de producto -->
      
        <div class='card-contenido'>
          <div class='top-bar'>
            <span>
              <?php echo "S/.".$fila2['precio']; ?>
            </span>
            <span class='float-right lnr lnr-heart'></span>
          </div>
          <div class='imagen'>
            <img class="img-imagen" src='admin/productos/imagenes/<?php echo $fila3['nombre']; ?>'>
          </div>
        </div>
        <div class='card-descripcion'>
          <div class='titulo'>
            <?php echo $fila2['nombre']; ?>
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
      
      <!-- end targeta de producto -->
      </a>
      <?php
      }
      cerrarconexion();
      ?>
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
        <p class="rights-text">© 2020 Desarrollado Por YoelCode Todos Los Derechos Reservados</p>
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
