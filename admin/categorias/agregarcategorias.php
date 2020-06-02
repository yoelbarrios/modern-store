<?php
session_start();
if(isset($_SESSION['administrador'])){
  if($_POST['categoria']!=""){
    include('../../php/conexion.php');
    $categoria = $_POST['categoria'];
    $registros=mysqli_query($link, "select categoria from categorias where categoria='$categoria'");
    if(mysqli_num_rows($registros)==0){
      //utf8_decode($_POST['categoria']); para archivos con tildes o caracteres especiales
      mysqli_query($link,"insert into categorias (categoria) value('$_POST[categoria]')");
      cerrarconexion();
      //?validado es una variable enviada a traves de la url
      header('location: formcategorias.php?validado=1&alert='.$_POST['categoria']);
    }else{
      header('location: formcategorias.php?validado=3&alert='.$_POST['categoria']);
    }

  }else{
    header('location: formcategorias.php?validado=2');
  }

}else{
    header('location: ../index.html');
}
?>
