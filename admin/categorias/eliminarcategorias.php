<?php
  session_start();
  if(isset($_SESSION['administrador'])){
    $idcategoria=$_POST['idcategoria'];
    include('../../php/conexion.php');
    //eliminamos la categorias
    mysqli_query($link, "delete from categorias where id='$idcategoria'");
    cerrarconexion();
    //header('location: formagregarcategorias.php');
  }else{
    header('location: ../index.html');
  }
?>
