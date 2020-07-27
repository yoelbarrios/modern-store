<?php
session_start();
if(isset($_SESSION['administrador'])&& isset($_POST['actualizar'])){
  include('../../php/conexion.php');
  $id_producto= $_POST['id_producto'];
  $precionuevo= $_POST['precionuevo'];
  $descripcionnueva= $_POST['descripcionnueva'];
  mysqli_query($link, "update productos set precio='$precionuevo', descripcion='$descripcionnueva' where id_producto='$id_producto'");
  header('location:mostrarproductos.php?alert');
}else{
  header('location: ../index.html');
}
?>
