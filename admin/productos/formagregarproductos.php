<?php
    session_start();
    //conexiona a la db
    include('../../php/conexion.php');
    //consulta a la db
    $registros=mysqli_query($link, 'select id, categoria from categorias order by id desc');
    cerrarconexion();
?>
<?php
if(isset($_SESSION['administrador'])){
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

    <!-- script de productos -->
    <script type="text/javascript" src="validarCampos.js"></script>
</head>
<body>
  <div class="titulo">Agregar Productos</div>
  <div class="formulario">
      <form class="form-horizontal" name="formproductos" method="POST" >
  <!-- start campo producto -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Producto</label>
              <div class="col-sm-10">
                  <input type="text" onkeyup="validarnombre()" class="form-control" id="inputEmail3" placeholder="Nombre Producto" name="nombre">
              </div>
          </div>
          <!--start alerta producto-->
          <div class="alert alert-danger alert-dismissible ocultar " id="avisonombre" role="alert">
              <p class="centrar"><strong>Advertencia!</strong> no has agregado ningún producto. </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alerta producto -->
  <!-- end campo producto -->

  <!-- start campo precio -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Precio</label>
              <div class="col-sm-10">
                  <input type="float" onkeyup="validarprecio()" class="form-control" id="inputEmail3" placeholder="Precio Producto" name="precio">
              </div>
          </div>
          <!--start alerta precio -->
          <div class="alert alert-danger alert-dismissible ocultar " id="avisoprecio" role="alert">
              <p class="centrar"><strong>Advertencia!</strong> no has agregado ningún precio. </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alerta precio -->
  <!-- end campro precio -->

  <!-- start campo descripcion -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Descripción</label>
              <div class="col-sm-10">
                  <textarea onkeyup="validardescripcion()" class="form-control" rows="3" placeholder="Descripción Producto" name="descripcion"></textarea>
              </div>
          </div>
          <!--start alerta descripcion -->
          <div class="alert alert-danger alert-dismissible ocultar " id="avisodescripcion" role="alert">
              <p class="centrar"><strong>Advertencia!</strong> no has agregado ninguna descripción. </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alerta descripcion -->
  <!-- end campro descripcion -->

  <!-- start campo categoria -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
              <div class="col-sm-10">
                  <select class="form-control" name="categoria">
                    <?php
                    while ($fila=mysqli_fetch_array($registros)) {
                    ?>
                         <option value="<?php echo $fila['id']; ?>"><?php echo $fila['categoria']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
              </div>
          </div>

          <!--start alerta categoria -->
          <div class="alert alert-danger alert-dismissible ocultar" id="avisocategoria" role="alert">
              <p class="centrar"><strong>Advertencia!</strong> no has agregado ninguna categoria. <br> <a target="blank" href="../categorias/formagregarcategorias.php">Agregar Categoria</a> </p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alerta categoria -->
  <!-- end campro categoria -->

          <!--start alert exito al agregar-->
          <div class="alert alert-success alert-dismissible ocultar" role="alert" id="exito">
              <p class="centrar"><strong>Bien!</strong> el producto se agrego correctamente.</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alert exito al agregar-->

          <!--start alert nombre repetido-->
          <div class="alert alert-danger alert-dismissible ocultar" role="alert" id="nombrerepetido">
              <p class="centrar"><strong>Advertencia!</strong> el nombre del producto ya se encuentra en la base de datos.</p>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <!--end alert nombre repetido-->
          <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                  <button type="button" onclick="validarformulario()" class="btn btn-success">Agregar</button>
              </div>
          </div>
      </form>
  </div>
</body>
</html>
<?php
} else{
    header('location: ../index.html');
}
?>
