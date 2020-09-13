<?php 
    include('conexion.php');
    $fechaactual = time();
    $registros=mysqli_query($link, "SELECT id_cliente FROM codigos WHERE 
    '$fechaactual'-fecha_antigua>60");
    //borrar codigos caducados
    mysqli_query($link, "DELETE FROM codigos WHERE 
    '$fechaactual'-fecha_antigua>60");

    //borrar clientes no confirmados
    while($fila=mysqli_fetch_assoc($registros)){
        mysqli_query($link,"DELETE FROM clientes WHERE id_cliente='$fila[id_cliente]' AND validado='0'");
    }
?>