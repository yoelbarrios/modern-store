<?php
session_start();
if(isset($_SESSION['administrador'])){
    include('../../php/conexion.php');
    mysqli_query($link,"insert into categorias (categoria) value('$_POST[categoria]')");
    cerrarconexion();
    header('location: formcategorias.php?validado=1');//?validado es una variable enviada a traves de la url
}else{
    header('location: ../index.html');
}
?>
