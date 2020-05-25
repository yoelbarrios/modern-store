<?php
    if($_POST['nombre']=="admin" && $_POST['password']=="123"){
        echo "bienvenido";
    }else{
        header('location: index.html');
    }

?>