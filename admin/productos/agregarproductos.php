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
      if($_FILES['imagen1']['name']!=""){
        $ext=explode(".",$_FILES['imagen1']['name']);
        $extension=end($ext);
        $_FILES['imagen1']['name']=time()."_01.".$extension;

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
      if($_FILES['imagen2']['name']!=""){
        $ext=explode(".",$_FILES['imagen2']['name']);
        $extension=end($ext);
        $_FILES['imagen2']['name']=time()."_02.".$extension;

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
      if($_FILES['imagen3']['name']!=""){
        $ext=explode(".",$_FILES['imagen3']['name']);
        $extension=end($ext);
        $_FILES['imagen3']['name']=time()."_03.".$extension;

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

     $registros=mysqli_query($link,"select id_producto from productos where nombre='$nombre'");
     $fila=mysqli_fetch_array($registros);
     if($_FILES['imagen1']['name']!=""){
       $nombreimagen1=$_FILES['imagen1']['name'];
       mysqli_query($link,"insert into imagenes (nombre, prioridad, id_producto) values ('$nombreimagen1','1','$fila[id_producto]')");
     }
     if($_FILES['imagen2']['name']!=""){
       $nombreimagen2=$_FILES['imagen2']['name'];
       mysqli_query($link,"insert into imagenes (nombre, prioridad, id_producto) values ('$nombreimagen2','2','$fila[id_producto]')");
     }
     if($_FILES['imagen3']['name']!=""){
       $nombreimagen3=$_FILES['imagen3']['name'];
       mysqli_query($link,"insert into imagenes (nombre, prioridad, id_producto) values ('$nombreimagen3','3','$fila[id_producto]')");
     }
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
