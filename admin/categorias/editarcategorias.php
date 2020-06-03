<?php
session_start();
if(isset($_SESSION['administrador'])){
  $categorianueva = $_POST['categorianueva'];

  if($categorianueva != ""){
    include('../../php/conexion.php');
    $categoriavieja = $_POST['categoriavieja'];
    $registros=mysqli_query($link, "select categoria from categorias where categoria='$categorianueva'");
    if(mysqli_num_rows($registros)==0){
      //utf8_decode($_POST['categoria']); para archivos con tildes o caracteres especiales
      mysqli_query($link,"update categorias set categoria='$categorianueva' where categoria='$categoriavieja'");
      cerrarconexion();
      //?validado es una variable enviada a traves de la url
      header('location: formagregarcategorias.php?alert=4&categoriavieja='.$categoriavieja.'&categorianueva='.$categorianueva);
    }else{
      header('location: formagregarcategorias.php?alert=3&categoria='.$categorianueva);
    }

  }else if($categorianueva == ""){
    header('location: formagregarcategorias.php?alert=5');
  }

}else{
    header('location: ../index.html');
}
?>
