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
    ?>
    <!--start alert de agregar fade show-->
    <div class="alert alert-success alert-dismissible " role="alert">
        <p class="centrar"><strong>Bien!</strong> la categoria se agrego correctamente.</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!--end alert-->
    <?php
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
        $registros=mysqli_query($link,"select * from categorias");
        cerrarconexion();
    ?>
        <table class="table table-hover">
        <?php
            //ciclo para listar
            while($fila=mysqli_fetch_array($registros)){
        ?>
        <tr class="active">
        <td><?php echo $fila['categoria']; ?></td>
        </tr>
        <?php
            }
        ?>
        </table>
    </div>
    <!--end listado de categorias-->


</body>

</html>
