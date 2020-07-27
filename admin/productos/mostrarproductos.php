<?php
    session_start();
    include('../../php/conexion.php');
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

    <!--funcion js para ver detalle producto en un modal-->
    <script type="text/javascript" src="verproducto.js"></script>

</head>
<body>
  <!--start cargando -->
  <div class="cargando2 ocultar" id="gifCargando">
    <img src="../../img/loading.gif" alt="">
  </div>
  <!--end cargando -->

  <?php if(isset($_GET['alert'])){ ?>
  <!--start alert Actualizar-->
  <div class="alert alert-success alert-dismissible " role="alert">
      <p class="centrar"><strong>Bien!</strong> El producto se Actualizó correctamente.</p>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
  </div>
  <!--end alert-->
<?php } ?>
  <div class="titulo">Productos</div>
  <!--start listado de productos-->
  <div class="mostrarproductos">
  <!-- start mostrar total productos -->
  <?php
    $totalProductos=mysqli_query($link, "select count(*) as total from productos");
    $totalFilas=mysqli_fetch_assoc($totalProductos);
  ?>
  <p>Total: <?php echo $totalFilas['total']; ?> productos.</p>
  <!-- end mostrar total productos -->
  <?php
      //mysql_query — Enviar una consulta MySQL
      //$registros0=mysqli_query($link,"select id_producto from productos");
      //mysql_num_rows — Obtener el número de filas de un conjunto de resultados
      $registros0=mysqli_query($link,"select id_producto from productos") or die ("Error al conectar con la tabla".mysqli_error($conexion));
      $numero_total_registros=mysqli_num_rows($registros0);
      $tamano_pagina = 10;
      $pagina = false;

      if (isset($_GET["pagina"])){
        $pagina = $_GET["pagina"];
      }
      if (!$pagina) {
		    $inicio = 0;
		    $pagina = 1;
	    }else {
    		$inicio = ($pagina - 1) * $tamano_pagina;
    	}
	    $total_paginas = ceil($numero_total_registros / $tamano_pagina);
      $registros1=mysqli_query($link,"select * from productos order by nombre asc LIMIT "
      .$inicio."," .$tamano_pagina) or die ("Error al conectar con la tabla".mysql_error($conexion));
  ?>
      <table class="table table-hover">
      <?php
          //ciclo para listar
          //mysql_fetch_array — Recupera una fila de resultados como un array asociativo, un array numérico o como ambos
          while($fila1=mysqli_fetch_assoc($registros1)){
          $registros2=mysqli_query($link,"select nombre from imagenes where id_producto = '$fila1[id_producto]' and prioridad=1");
          $fila2=mysqli_fetch_assoc($registros2);

      ?>
      <tr class="active" id="<?php echo $fila1['id_producto'];?>" >
        <td><img width="40px" src="imagenes/<?php echo $fila2['nombre']; ?> " alt=""></td>
        <td><?php echo $fila1['nombre']; ?></td>
        <td>
          <button type="button" onclick="ventana('<?php echo $fila1['id_producto']; ?> ')"
          class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Ver</button>
        </td>
        <td>
          <a href="formeditarproductos.php?id_producto= <?php echo $fila1['id_producto']; ?> ">
          <button type="button" class="btn btn-success">Editar</button></a>
        </td>
        <td>
          <a onclick="eliminar('<?php echo $fila1['id_producto']; ?>')">
          <button type="button" class="btn btn-danger">Eliminar</button></a>
        </td>

          <?php
          $registros3=mysqli_query($link,"select inicio from productos where id_producto='$fila1[id_producto]'");
          $fila3=mysqli_fetch_assoc($registros3);
          ?>
          <form>
            <td>
              <input onclick="mostrarEnInicio('<?php echo $fila1['id_producto'];?>')" type="radio"
              name="<?php echo $fila1['id_producto'];?>" value="activado" <?php if($fila3['inicio']==1) echo "checked"; ?>>
              On
            </td>
            <td>
              <input onclick="mostrarEnInicio('<?php echo $fila1['id_producto'];?>')" type="radio"
              name="<?php echo $fila1['id_producto'];?>" value="desactivado" <?php if($fila3['inicio']==0) echo "checked"; ?>>
              Off
            </td>
          </form>
      </tr>
      <?php
      }
      ?>
      </table>
  </div>
  <!--end listado de categorias-->

  <!-- start Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalle Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="div-results">
          <!--  aqui se muestra los detalles del producto con ajax  -->
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
<!-- end modal -->
<!-- start modal ver producto al inicio
<div class="modal fade bs-example-modal-sm" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="div-results2">
           aqui se muestra los detalles del producto con ajax
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
end modal ver producto al inicio -->

<section class="paginacion">
  <div class="paginacion-iconos">
    <?php
      if($total_paginas > 1){
        if ($pagina != 1){
          echo ' <a href="mostrarproductos.php?pagina='.($pagina-1).'">Anterior </a>';
        }
        for ($i=1; $i<=$total_paginas ; $i++) {
          if($pagina ==$i){
            echo $pagina;
          }else{
            echo ' <a href="mostrarproductos.php?pagina=' .$i. '">'.$i. '</a>';
          }

        }
        if($pagina != $total_paginas){
          echo ' <a href="mostrarproductos.php?pagina='.($pagina+1).'">Siguiente </a>';
        }
      }
      echo ' </p> ';
    ?>
  </div>
</section>

</body>
</html>
<?php
cerrarconexion();
} else{
    header('location: ../index.html');
}
?>
