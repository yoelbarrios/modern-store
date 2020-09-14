<?php
    include('conexion.php');
    $registros1=mysqli_query($link,"select id, categoria from categorias order by categoria asc");
    //seleccionar las categorias
    $registros2=mysqli_query($link,"select categoria from categorias where id='$_GET[id_categoria]'");
    $fila2=mysqli_fetch_array($registros2);
    //seleccionar los productos
    $registros3=mysqli_query($link,"select * from productos where id_producto='$_GET[id_producto]'");
    $fila3=mysqli_fetch_array($registros3);
    //seleccionar imagen prioridad 1
    $registros4=mysqli_query($link,"select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=1");
    $fila4=mysqli_fetch_array($registros4);
    //seleccionar imagen prioridad 2
    $registros5=mysqli_query($link,"select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=2");
    $fila5=mysqli_fetch_array($registros5);
    //seleccionar imagenes prioridad 3
    $registros6=mysqli_query($link,"select nombre from imagenes where id_producto='$_GET[id_producto]' && prioridad=3");
    $fila6=mysqli_fetch_array($registros6);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!--start estilos propios-->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/detalleproducto.css">
    <link rel="stylesheet" href="../css/normalizar.css">
    <!--fuentes-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:200,400">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://kit.fontawesome.com/b478cabd51.js" crossorigin="anonymous"></script>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    
    <!--script header-->
    <script type="text/javascript" src="../js/header.js"></script>


</head>

<body>
    <!--start header-->
    <header class="header">
        <nav>
            <ul>
                <li class="logo"><a href="#"><strong>Yoel </strong>Code</a> </li>
                <li class="btn"><span class="fas fa-bars"></span></li>
                <form class="search-icon" action="buscador.php" method="Post">
                    <input type="search" placeholder="Buscar Producto" name="buscar">
                    <button type="submit" class="icon">
                        <span class="fas fa-search"></span>
                    </button>
                </form>
                <div class="items">
                    <li><a href="../index.php"><span class="lnr lnr-home"></span>Inicio</a></li>
                    <li><a href="#"><span class="lnr lnr-store"></span>Productos</a>
                        <ul>
                            <?php
                            while($fila1=mysqli_fetch_assoc($registros1)){
                            //echo utf8_encode($fila['categoria']); sirve para mostrar las tildes
                            ?>
                            <li>
                                <a href="verproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo $fila1['categoria']; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="../clientes/formregistroclientes.php"><span class="lnr lnr-users"></span>Registrate</a></li>
                    <li><a href="#"><span class="lnr lnr-user"></span>Ingresar</a></li>
                </div>

            </ul>
        </nav>
    </header>
    <!--end header-->

    <!--start main-->
    <section class='verproductos-main'>
        <div class="ruta">
            <p> <?php echo $fila2['categoria']; ?> / <?php echo $fila3['nombre']; ?> </p>
        </div>
        <div class="contenedor-general">

            <div class="contenedor-one">

                <div class="contenedor-img">

                    <div id="js-gallery" class="gallery">

                        <div class="gallery-big">
                            <img src="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros4)>0){
                                echo $fila4['nombre'];
                            }
                        ?>">
                        </div>

                        <div class="gallery-small">
                            <a href="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros4)>0){
                                echo $fila4['nombre'];
                            }
                            ?>" data-gallery="thumb" class="is-active">

                                <img src="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros4)>0){
                                echo $fila4['nombre'];
                            }
                            ?>">
                            </a>
                            <a href="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros5)>0){
                                echo $fila5['nombre'];
                            }
                            ?>" data-gallery="thumb">

                                <img src="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros5)>0){
                                echo $fila5['nombre'];
                            }
                            ?>">
                            </a>
                            <a href="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros6)>0){
                                echo $fila6['nombre'];
                            }
                            ?>" data-gallery="thumb">

                                <img src="../admin/productos/imagenes/<?php 
                            if(mysqli_num_rows($registros6)>0){
                                echo $fila6['nombre'];
                            }
                            ?>">
                            </a>
                        </div>


                    </div>

                </div>

                <div class="contenedor-precio">
                    <div>
                        <h3 class="nombre"><?php echo $fila3['nombre']; ?></h3>
                        <p class="precio"><?php echo $fila3['precio']; ?> Soles</p>
                        <div class="cantidad">
                            <p>
                                Cantidad:
                                <input type="number" min="1" max="10" value="1">
                            </p>
                        </div>
                        <div class="comprar">
                            <button class="btn-comprar">Comprar</button>
                        </div>

                    </div>
                </div>

            </div>

            <div class="contenedor-two">
                <p>Caracteristicas</p>
                <p><?php echo $fila3['descripcion']; ?></p>
            </div>

        </div>
        
    </section>
    <!--end main-->
    <?php cerrarconexion(); ?>

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
    <script src="../js/detalleProducto.js"></script>
</body>

</html>