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

    <div class="titulo">Actualizar Categoria</div>
    <div class="formulario">
        <form class="form-horizontal" method="POST" action="editarcategorias.php">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
                <div class="col-sm-10">
                    <input type="text" name="categorianueva" class="form-control" id="inputEmail3" placeholder="<?php echo $_GET['categoriavieja'] ?>">
                    <input type="hidden" name="categoriavieja" value="<?php echo $_GET['categoriavieja'] ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Actualizar</button>
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
