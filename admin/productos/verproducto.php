<?php
//if (isset($_POST['idproducto'])){
  include('../../php/conexion.php');

  $registros1=mysqli_query($link,"select * from productos where id_producto='$_POST[idproducto]'");
  $fila1=mysqli_fetch_assoc($registros1);
  //seleccionar categoria
  $registros2=mysqli_query($link,"select categoria from categorias where id='$fila1[id_categoria]'");
  $fila2=mysqli_fetch_assoc($registros2);
  //mostrar categoria
  echo "<b>Nombre: </b>".$fila1['nombre'];
  echo "<br><br><b>Precio: </b>S/.".$fila1['precio'];
  echo "<br><br><b>Categoria: </b>".$fila2['categoria'];
  echo "<br><br><b>Descripción: </b>".$fila1['descripcion']."<br> <br>";

  //seleccionar imagenes
  $registros3= mysqli_query($link,"select * from imagenes where id_producto='$fila1[id_producto]'");
  if(mysqli_num_rows($registros3)!=0){
    while ($fila3 = mysqli_fetch_assoc($registros3)) {
      //mostrar imagenes
      echo $fila3['nombre'];
      echo " <img width='120px' src = 'imagenes/".$fila3['nombre']."'> <br> <br>";
    }
  }
/*}else{
  header('location:../index.html');
}*/
?>
