<?php
session_start();
include('../../php/conexion.php');
if (isset($_SESSION['administrador'])) {
  $nombre=$_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];

  $registros = mysqli_query($link, "select nombre from productos where nombre='$nombre'");
  if (mysqli_num_rows($registros)==0) {
      mysqli_query($link,"insert into productos(nombre,precio,descripcion,id_categoria) values ('$nombre','$precio','$descripcion','$categoria')");
      cerrarconexion();
      echo "exito";
  }else {
    echo "nombrerepetido";
  }
}
else {
  header('location: ../index.html');
}
?>
