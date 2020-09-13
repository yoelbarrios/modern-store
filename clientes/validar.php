<?php 
    include('../php/conexion.php');
    if(isset($_GET['codigo']) && isset($_GET['id_cliente'])){
        $registros=mysqli_query($link, "SELECT id_cliente FROM codigos WHERE 
        codigo='$_GET[codigo]' and id_cliente='$_GET[id_cliente]'");
        if(mysqli_num_rows($registros)==1){
            mysqli_query($link,"UPDATE clientes SET validado='1' WHERE 
            id_cliente='$_GET[id_cliente]'");
            header('location: ../index.php?alert=validado');
        }else{
            header('location: formregistroclientes.php?alert=enlacecaducado');
        }
    }else{
        header('location: ../index.php');
    }
    cerrarconexion();
?>