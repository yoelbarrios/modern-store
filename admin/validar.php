<?php
    session_start();
    if(!isset($_SESSION['administrador'])){
        if($_POST['nombre']=="admin" && $_POST['password']=="123"){
            $_SESSION['administrador']=$_POST['nombre'];
        }
    }
    
    if(isset($_SESSION['administrador'])){
        echo "hola ".$_SESSION['administrador']." bienvenido";
    }else{
        header('location: index.html');
    }
?>