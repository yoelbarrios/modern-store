<?php
    if(!isset($_POST['buscar'])){
        header('location: ../index.php');
    }
    include('conexion.php');
    $registros1=mysqli_query($link,"select id, categoria from categorias order by categoria asc");
    //seleccionar los productos que se muestran en el index
    $listaproductos=mysqli_query($link,"select * from productos where inicio=1 order by precio");
    
    
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
    <!--start bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">

    <!--end bootstrap-->
    <!--fuentes-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kanit:200,400">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://kit.fontawesome.com/b478cabd51.js" crossorigin="anonymous"></script>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
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
                                <a
                                    href="verproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo $fila1['categoria']; ?></a>
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
        
            <?php
            if($_POST['buscar']!=""){ 
                $buscar=mysqli_real_escape_string($link,$_POST['buscar']);
                $registros2=mysqli_query($link,"SELECT id_producto, precio, nombre, id_categoria, categoria FROM 
                productos INNER JOIN categorias on id_categoria=id WHERE 
                nombre LIKE '%$buscar%' OR categoria LIKE '%$buscar';");
                if(mysqli_num_rows($registros2)>0){ 
            ?>
            <!-- start card producto -->
            <div class="contenedor">
                    <?php
                    while ($fila2=mysqli_fetch_assoc($registros2)) {
                        $registros3=mysqli_query($link,"select nombre from imagenes where id_producto = '$fila2[id_producto]' and prioridad=1");
                        $fila3=mysqli_fetch_assoc($registros3);
                    ?>
                        <a class='card'
                            href="detalleproducto.php?id_categoria=<?php echo $fila2['id_categoria']; ?>&id_producto=<?php echo $fila2['id_producto']; ?>">
                            <!-- start targeta de producto -->

                            <div class='card-contenido'>
                                <div class='top-bar'>
                                    <span>
                                        <?php echo "S/.".$fila2['precio']; ?>
                                    </span>
                                    <span class='float-right lnr lnr-heart'></span>
                                </div>
                                <div class='imagen'>
                                    <img class="img-imagen" src='../admin/productos/imagenes/<?php echo $fila3['nombre']; ?>'>
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
            ?>
            </div>
            <?php
                }else{
            ?>
                <div class="sin-resultados">
                    <p class="mensaje-uno">No se encontro resultados</p>
                    <p>Te recomendamos verificar la ortografía o intentar con otra palabra.</p>
                </div>
                <div class="sin-resultados-dos">
                    <p class="mensaje-dos">MIENTRAS, TE INVITAMOS A REVISAR NUESTROS MEJORES PRODUCTOS</p>
                </div>
                <div class="contenedor"> 
                    <?php
                    while ($filaproductos=mysqli_fetch_assoc($listaproductos
                    )) {
                        $listaimagenes=mysqli_query($link,"select nombre from imagenes where id_producto = '$filaproductos[id_producto]' and prioridad=1");
                        $filaimagenes=mysqli_fetch_assoc($listaimagenes);
                    ?>
 
                   <a class='card' href="detalleproducto.php?id_categoria=<?php echo $filaproductos['id_categoria']; ?>&id_producto=<?php echo $filaproductos['id_producto']; ?>">
                    <!-- start targeta de producto -->
                    
                        <div class='card-contenido'>
                        <div class='top-bar'>
                            <span>
                            <?php echo "S/.".$filaproductos['precio']; ?>
                            </span>
                            <span class='float-right lnr lnr-heart'></span>
                        </div>
                        <div class='imagen'>
                            <img class="img-imagen" src='../admin/productos/imagenes/<?php echo $filaimagenes['nombre']; ?>'>
                        </div>
                        </div>
                        <div class='card-descripcion'>
                        <div class='titulo'>
                            <?php echo $filaproductos['nombre']; ?>
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
                    ?>
                </div>
                
            <?php
                }
            }else{
            ?>    
                <div class="sin-resultados">
                    <p class="mensaje-uno">No se encontro resultados</p>
                    <p>Te recomendamos verificar la ortografía o intentar con otra palabra.</p>
                </div>
                <div class="sin-resultados-dos">
                    <p class="mensaje-dos">MIENTRAS, TE INVITAMOS A REVISAR NUESTROS MEJORES PRODUCTOS</p>
                </div>
                <div class="contenedor"> 
                    <?php
                    while ($filaproductos=mysqli_fetch_assoc($listaproductos
                    )) {
                        $listaimagenes=mysqli_query($link,"select nombre from imagenes where id_producto = '$filaproductos[id_producto]' and prioridad=1");
                        $filaimagenes=mysqli_fetch_assoc($listaimagenes);
                    ?>
 
                   <a class='card' href="detalleproducto.php?id_categoria=<?php echo $filaproductos['id_categoria']; ?>&id_producto=<?php echo $filaproductos['id_producto']; ?>">
                    <!-- start targeta de producto -->
                    
                        <div class='card-contenido'>
                        <div class='top-bar'>
                            <span>
                            <?php echo "S/.".$filaproductos['precio']; ?>
                            </span>
                            <span class='float-right lnr lnr-heart'></span>
                        </div>
                        <div class='imagen'>
                            <img class="img-imagen" src='../admin/productos/imagenes/<?php echo $filaimagenes['nombre']; ?>'>
                        </div>
                        </div>
                        <div class='card-descripcion'>
                        <div class='titulo'>
                            <?php echo $filaproductos['nombre']; ?>
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
                    
                    <!-- end ta
                    rgeta de producto -->
                    </a>
            <?php
            }
            ?>
            </div>
            <!-- end card producto -->
        <?php
        }
        ?>
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