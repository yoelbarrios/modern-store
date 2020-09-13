<?php
    
    include('../php/conexion.php');
    $registros1=mysqli_query($link,"select id, categoria from categorias order by categoria asc");
    //cerrarconexion();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!--start estilos propios-->
    <link rel="stylesheet" href="../css/estilos.css">
    <link rel="stylesheet" href="../css/normalizar.css">
    <!--start bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="clientes.css">
    <!--end bootstrap-->
    <!--fuentes-->
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300;400;500&display=swap" rel="stylesheet">
    <!--iconos-->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://kit.fontawesome.com/b478cabd51.js" crossorigin="anonymous"></script>
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <!--script header-->
    <script type="text/javascript" src="../js/header.js"></script>
    <script src="../js/ordenar.js"></script>

</head>

<body>
    <!--start header-->
    <header class="header">
        <nav>
            <ul>
                <li class="logo"><a href="#"><strong>Yoel </strong>Code</a> </li>
                <li class="btn"><span class="fas fa-bars"></span></li>
                <form class="search-icon" action="../php/buscador.php" method="Post">
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
                                    href="../php/verproductos.php?id_categoria=<?php echo $fila1['id']; ?>"><?php echo $fila1['categoria']; ?></a>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="formregistroclientes.php"><span class="lnr lnr-users"></span>Registrate</a></li>
                    <li><a href="#"><span class="lnr lnr-user"></span>Ingresar</a></li>
                </div>

            </ul>
        </nav>
    </header>
    <!--end header-->

    <!--start main-->
    <section class='verproductos-main'>

        <div class="contenedor-registro-clientes">
            
            <!--start alert-->
            <div id="contenedorAlert" class="contenedor-alert ">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">Debe llenar todos los campos</span>
                    <div id="close-btn" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <!--end alert-->
            <!--start alert-->
            <div id="contenedorAlertCorreo" class="contenedor-alert ">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">Ingrese un correo válido</span>
                    <div id="close-btn-correo" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <!--end alert-->
            <!--start alert-->
            <div id="contenedorAlertPassword" class="contenedor-alert ">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">La contraseña debe tener como minimo 6 caracteres</span>
                    <div id="close-btn-password" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <!--end alert-->
            <!--start alert-->
            <div id="contenedorAlertEmailRepetido" class="contenedor-alert ">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">El Email ya se encuentra en uso</span>
                    <div id="close-btn-repetido" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <!--end alert-->
            <div id="contenedorAlertExito" class="contenedor-alert ">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg">Registro completo</span>
                    <div id="close-btn-exito" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <!--end alert-->

            <!--start alert de verificacion de correo-->
            <?php 
            if(isset($_GET['alert']) && $_GET['alert']=='enlacecaducado'){
            ?>
            <div id="" class="contenedor-alert-enlacecaducado">
                <div class="msg-alert" id="msg-alert">
                    <span class="fas fa-exclamation-circle"></span>
                    <span class="msg3">El tiempo para validar su correo ha caducado, por favor vuelva a registrarse</span>
                    <div id="close-btn" class="close-btn">
                        <span class="fas fa-times"></span>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>
            <!--end alert de verificacion de correo-->

            <form id="formregistro" name="formregistro" class="registro-cliente">

                <p class="texto-cabecera">Registro</p>
                <div class="grupo">
                    <input onKeyUp="validarNombres()" class="entrada" type="text" name="nombres" id="nombres"><span
                        class="barras"></span>
                    <label class="lb-texto" for="">Nombres</label>
                </div>
                <div class="grupo">
                    <input class="entrada" type="text" name="apellidos" id="apellidos"><span class="barras"></span>
                    <label class="lb-texto" for="">Apellidos</label>
                </div>
                <div class="grupo">
                    <input onKeyUp="validarCorreo()" class="entrada" type="email" name="correo" id="correo"><span
                        class="barras"></span>
                    <label class="lb-texto" for="">Correo</label>
                </div>
                <div class="grupo">
                    <input onKeyUp="validarPassword()" class="entrada" type="password" name="password"
                        id="password"><span class="barras"></span>
                    <label class="lb-texto" for="">Contraseña</label>
                </div>
                <div class="grupo">
                    <input onclick="validarPrivacidad()" type="checkbox" id="acepto" name="acepto"> Acepto la politica de privacidad. <a
                        href="#">Leer</a>
                </div>
                <!--start alert-->
                <div id="contenedorAlertPrivacidad" class="contenedor-alert2">
                    <div class="msg-alert2" id="msg-alert">
                        <span class="fas fa-exclamation-circle"></span>
                        <span class="msg">Debe aceptar las politicas de privacidad</span>
                        <div id="close-btn-privacidad" class="close-btn">
                            <span class="fas fa-times"></span>
                        </div>
                    </div>
                </div>
                <!--end alert-->
                <button class="btn-continuar" type="button" onclick="validarformulario()">Continuar</button>
                <!-- cargando -->
                    <center> <img class="ocultar" src="../img/loading.gif" alt="cargando" id="cargando"></center>
                <!-- cargando -->
            </form>
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
    <script src="../js/formregistroclientes.js"></script>
</body>

</html>