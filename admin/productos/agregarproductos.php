<?php
session_start();
include('../../php/conexion.php');
if (isset($_SESSION['administrador']) && isset($_POST['nombre'])) {
  sleep(2);//para esperar 2 segundos antes de ejecutar el codigo
  $nombre=$_POST['nombre'];
  $precio = $_POST['precio'];
  $descripcion = $_POST['descripcion'];
  $categoria = $_POST['categoria'];

  $registros = mysqli_query($link, "select nombre from productos where nombre='$nombre'");
  if (mysqli_num_rows($registros)==0) {

      //start imagenes
      //imagen1
      if($_FILES['imagen1']['size']!=0){
        $ext=explode(".",$_FILES['imagen1']['name']);
        $extension=end($ext);
        $_FILES['imagen1']['name']=$nombre."_01.".$extension;

        $permitidos= array("image/jpg", "image/jpeg", "image/gif","image/png");
        $limite_kb= 1000;

        if (in_array($_FILES['imagen1']['type'],$permitidos)&& $_FILES['imagen1']['size'] <= $limite_kb * 1024) {
          $ruta= "imagenes/".$_FILES['imagen1']['name'];

          move_uploaded_file($_FILES['imagen1']['tmp_name'],$ruta);
        }else{
          echo "errorimagen";
          exit();
        }
      }
      //imagen2
      if($_FILES['imagen2']['size']!=0){
        $ext=explode(".",$_FILES['imagen2']['name']);
        $extension=end($ext);
        $_FILES['imagen2']['name']=$nombre."_02.".$extension;

        $permitidos= array("image/jpg", "image/jpeg", "image/gif","image/png");
        $limite_kb= 1000;

        if (in_array($_FILES['imagen2']['type'],$permitidos)&& $_FILES['imagen2']['size'] <= $limite_kb * 1024) {
          $ruta= "imagenes/".$_FILES['imagen2']['name'];

          move_uploaded_file($_FILES['imagen2']['tmp_name'],$ruta);
        }else{
          echo "errorimagen";
          exit();
        }
      }
      //imagen3
      if($_FILES['imagen3']['size']!=0){
        $ext=explode(".",$_FILES['imagen3']['name']);
        $extension=end($ext);
        $_FILES['imagen3']['name']=$nombre."_03.".$extension;

        $permitidos= array("image/jpg", "image/jpeg", "image/gif","image/png");
        $limite_kb= 1000;

        if (in_array($_FILES['imagen3']['type'],$permitidos)&& $_FILES['imagen3']['size'] <= $limite_kb * 1024) {
          $ruta= "imagenes/".$_FILES['imagen3']['name'];

          move_uploaded_file($_FILES['imagen3']['tmp_name'],$ruta);
        }else{
          echo "errorimagen";
          exit();
        }
      }
      //end imagenes
      mysqli_query($link,"insert into productos(nombre,precio,descripcion,id_categoria) values
     ('$nombre','$precio','$descripcion','$categoria')");
     cerrarconexion();
     echo "exito";
  } else {
    echo "nombrerepetido";
  }
}
else {
  header('location: ../index.html');
}
?>
