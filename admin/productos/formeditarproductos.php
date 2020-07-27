<?php
session_start();
if(isset($_SESSION['administrador']) && $_GET['id_producto']!="" ){
  include('../../php/conexion.php');
  $registros=mysqli_query($link, "select id_producto, precio, descripcion from productos where id_producto='$_GET[id_producto]'");
  cerrarconexion();
  $fila=mysqli_fetch_assoc($registros);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>store YoelCode</title>
    <link rel="stylesheet" href="../../css/normalizar.css">
    <link rel="stylesheet" href="../admin.css">

    <!--start bootstrap-->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <!--jquery-->
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <script src="../../js/bootstrap.min.js"></script>
    <!--end bootstrap-->

</head>
<body>
  <div class="titulo">Actualizar Productos</div>
  <div class="formulario">
      <form class="form-horizontal" method="post" action="editarproductos.php">
  <!-- start campo producto -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
              <div class="col-sm-10">
                  <input type="number" step="any" class="form-control"  placeholder="Nuevo Precio" name="precionuevo" value="<?php echo $fila['precio']; ?>">
              </div>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
              <div class="col-sm-10">
                  <textarea onkeyup="validardescripcion()" class="form-control" rows="3" placeholder="Descripción Producto" name="descripcionnueva" ><?php echo $fila['descripcion']; ?></textarea>
              </div>
          </div>
          <input type="hidden" name="id_producto" value="<?php echo $fila['id_producto']; ?>">
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" name="actualizar" class="btn btn-success">Actualizar</button>
              </div>
          </div>
      </form>
  </div>


</body>
</html>
<?php
}else{
  header('location:../index.html');
}
?>
