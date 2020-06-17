<?php
    session_start();
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
    <script type="text/javascript">
      function validarformulario(){
          if(document.formproductos.producto.value==""){
            //mostrar alerta
            $('#avisoproducto').show('fast');
            document.formproductos.producto.style.border='1px solid red';
          }

          if(document.formproductos.precio.value==""){
            //mostrar alerta
            $('#avisoprecio').show('fast');
            document.formproductos.precio.style.border='1px solid red';
          }

          if(document.formproductos.descripcion.value==""){
            //mostrar alerta
            $('#avisodescripcion').show('fast');
            document.formproductos.descripcion.style.border='1px solid red';
          }
      }
//start zona de exito al validar
      function validarnombreproducto(){
        //ocultar alerta
        $('#avisoproducto').hide('slow');
        document.formproductos.producto.style.border='1px solid green';
      }
      function validarprecio(){
        //ocultar alerta
        $('#avisoprecio').hide('slow');
        document.formproductos.precio.style.border='1px solid green';
      }
      function validardescripcion(){
        //ocultar alerta
        $('#avisodescripcion').hide('slow');
        document.formproductos.descripcion.style.border='1px solid green';
      }
//end zona de exito al validar
    </script>
</head>
<body>
  <div class="titulo">Agregar Productos</div>
  <div class="formulario">
      <form class="form-horizontal" name="formproductos" method="POST" action="">
  <!-- start campo producto -->
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-2 control-label">Producto</label>
              <div class="col-sm-10">
                  <input type="text" onkeyup="validarnombreproducto()" class="form-control" id="inputEmail3" placeholder="Nombre Producto" name="producto">
              </div>
          </div>
          <!--start alerta producto-->
          <div class="alert alert-danger alert-dismissible ocultar " id="avisoproducto" role="alert">
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
                  <input type="number" onkeyup="validarprecio()" class="form-control" id="inputEmail3" placeholder="Precio Producto" name="precio">
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
