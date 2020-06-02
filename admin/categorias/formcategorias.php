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

</head>

<body>
<?php
  if(isset($_GET['validado'])){
      if($_GET['validado']==1){
?>
    <!--start alert de agregar fade show-->
    <div class="alert alert-success alert-dismissible " role="alert">
        <p class="centrar"><strong>Bien!</strong> la categoria <strong><?php echo $_GET['alert'];?></strong> se agrego correctamente.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!--end alert-->
<?php
      } else if($_GET['validado']==2){
?>
        <!--start alerta 2-->
        <div class="alert alert-danger alert-dismissible " role="alert">
            <p class="centrar"><strong>Advertencia!</strong> no se puede insertar un campo vacio.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--end alerta 2-->
<?php
      }else if($_GET['validado']==3){
?>
        <!--start alerta 3-->
        <div class="alert alert-danger alert-dismissible " role="alert">
            <p class="centrar"><strong>Advertencia!</strong> la categoria <strong><?php echo $_GET['alert'];?></strong> ya existe.</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!--end alerta 3-->
<?php
      }
    }
?>
    <div class="titulo">Agregar Categoria</div>
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="agregarcategorias.php">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Categoria" name="categoria">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Agregar</button>
                </div>
            </div>
        </form>
    </div>
    <!--start listado de categorias-->
    <div class="mostrarcategorias">
    <?php
        include('../../php/conexion.php');
        $registros=mysqli_query($link,"select id, categoria from categorias order by id desc");
        cerrarconexion();
    ?>
        <table class="table table-hover">
        <?php
            //ciclo para listar
            while($fila=mysqli_fetch_array($registros)){
        ?>
        <tr class="active">
        <td><?php echo $fila['categoria']; ?></td>
        <td><a href="#"><button type="button" class="btn btn-success">Editar</button></a></td>
        <td><a href="#"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
        </tr>
        <?php
            }
        ?>
        </table>
    </div>
    <!--end listado de categorias-->


</body>

</html>
<?php
} else{
    header('location: ../index.html');
}
?>
