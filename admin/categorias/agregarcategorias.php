<?php
session_start();
if(isset($_SESSION['administrador'])){
  if($_POST['categoria']!=""){
    include('../../php/conexion.php');
    mysqli_query($link,"insert into categorias (categoria) value('$_POST[categoria]')");
    cerrarconexion();
    //?validado es una variable enviada a traves de la url
    header('location: formcategorias.php?validado=1&alert='.$_POST['categoria']);
  }else{
    header('location: formcategorias.php?validado=2');
  }

}else{
    header('location: ../index.html');
}
?>
