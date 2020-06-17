<?php
    session_start();
    if(!isset($_SESSION['administrador'])){
        if($_POST['nombre']=="admin" && $_POST['password']=="123"){
            $_SESSION['administrador']=$_POST['nombre'];
        }
    }

    if(isset($_SESSION['administrador'])){
        //echo "hola ".$_SESSION['administrador']."<br><br>";
        echo "<a href='categorias/formagregarcategorias.php'>agregar/modificar/eliminar categorias</a><br>";
        echo "<a href='productos/formagregarproductos.php'>agregar/modificar/eliminar productos</a>";
    }else{
        header('location: index.html');
    }
?>
