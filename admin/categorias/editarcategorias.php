<?php
session_start();
if(isset($_SESSION['administrador'])){
  if($_POST['categorianueva']!=""){
    include('../../php/conexion.php');
    $categorianueva = $_POST['categorianueva'];
    $categoriavieja = $_POST['categoriavieja'];

    $registros=mysqli_query($link, "select categoria from categorias where categoria='$categorianueva'");
    if(mysqli_num_rows($registros)==0){
      //utf8_decode($_POST['categoria']); para archivos con tildes o caracteres especiales
      mysqli_query($link,"update categorias set categoria='$categorianueva' where categoria='$categoriavieja'");
      cerrarconexion();
      //?validado es una variable enviada a traves de la url
      header('location: formcategorias.php?validado=4&alert='.$categoriavieja.'&categorianueva='.$categorianueva);
    }else{
      header('location: formcategorias.php?validado=3&alert='.$_POST['categoria']);
    }

  }else if($_POST['categoria']==""){
    header('location: formcategorias.php?validado=2');
  }

}else{
    header('location: ../index.html');
}
?>
