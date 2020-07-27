<?php
  session_start();
  if(isset($_SESSION['administrador']) && $_POST['idproducto']!=""){
    $idproducto= $_POST['idproducto'];

    include('../../php/conexion.php');
    //eliminar imagenes
    $registros= mysqli_query($link,"select nombre from imagenes where id_producto='$idproducto'");
    while($fila=mysqli_fetch_assoc($registros)){
      unlink("imagenes/".$fila['nombre']);
    }
    mysqli_query($link, "delete from imagenes where id_producto='$idproducto'");
    //eliminamos la categorias
    mysqli_query($link, "delete from productos where id_producto='$idproducto'");
    cerrarconexion();

  }else{
    header('location: ../index.html');
  }
?>
