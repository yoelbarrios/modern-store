<?php
session_start();
if(isset($_SESSION['administrador'])){
  $categoria = $_POST['categoria'];

  if($categoria!=""){
    include('../../php/conexion.php');
    $registros=mysqli_query($link, "select categoria from categorias where categoria='$categoria'");
    if(mysqli_num_rows($registros)==0){
      //utf8_decode($_POST['categoria']); para archivos con tildes o caracteres especiales
      mysqli_query($link,"insert into categorias (categoria) value('$categoria')");
      cerrarconexion();
      //?validado es una variable enviada a traves de la url
      header('location: formagregarcategorias.php?alert=1&categoria='.$categoria);
    }else{
      header('location: formagregarcategorias.php?alert=3&categoria='.$categoria);
    }

  }else{
    header('location: formagregarcategorias.php?alert=2');
  }

}else{
    header('location: ../index.html');
}
?>
