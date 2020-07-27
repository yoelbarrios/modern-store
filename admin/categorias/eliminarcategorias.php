<?php
  session_start();
  if(isset($_SESSION['administrador'])){
    $idcategoria=$_POST['idcategoria'];
    include('../../php/conexion.php');
    //eliminamos el producto
    $registros1=mysqli_query($link, "select id_producto from productos where id_categoria=$idcategoria");
    while($fila1=mysqli_fetch_assoc($registros1)){
      $registros2=mysqli_query($link,"select nombre from imagenes where id_producto='$fila1[id_producto]'");
      while($fila2=mysqli_fetch_assoc($registros2)){
        unlink("../productos/imagenes/".$fila2['nombre']);
      }
      mysqli_query($link, "delete from imagenes where id_producto='$fila1[id_producto]'");
      mysqli_query($link, "delete from productos where id_producto='$fila1[id_producto]'");

    }
    //eliminamos la categoria
    mysqli_query($link, "delete from categorias where id='$idcategoria'");
    cerrarconexion();

  }else{
    header('location: ../index.html');
  }
?>
