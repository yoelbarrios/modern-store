<?php 
    include('../php/conexion.php');
    include('../php/funciones.php');
    sleep(2);
    if(isset($_POST['nombres2']) && isset($_POST['apellidos2']) && isset($_POST['correo2']) && isset($_POST['password2']) ){

    
    $nombres= mysqli_real_escape_string($link, $_POST['nombres2']);
    $apellidos = mysqli_real_escape_string($link, $_POST['apellidos2']);
    $correo = mysqli_real_escape_string($link, $_POST['correo2']);
    $pass = mysqli_real_escape_string($link, $_POST['password2']);
    $password= password_hash($pass, PASSWORD_BCRYPT);

    //convertimos las primeras letras en mayuscula
    $nombres = ucwords($nombres);
    $apellidos=ucwords($apellidos);
    //insertamos los datos de clientes
    $registros=mysqli_query($link, "SELECT correo FROM clientes WHERE correo = '$correo'");
    if(mysqli_num_rows($registros)==0){
        mysqli_query($link, "INSERT INTO clientes(nombre, apellidos, correo, password) VALUES
        ('$nombres','$apellidos','$correo','$password')");
    
    
        //codigo de verificacion 
        $codigo=generarCodigo(6);
        $fecha=time();
        $registros2=mysqli_query($link, "SELECT id_cliente FROM clientes WHERE correo='$correo'");
        $fila2=mysqli_fetch_assoc($registros2);
        mysqli_query($link, "INSERT INTO codigos(codigo, fecha_antigua, id_cliente) VALUES
        ('$codigo','$fecha','$fila2[id_cliente]')");
  
        //enviar correo de verificacion
        $para      = $correo;
        $asunto    = 'verificar registro';
        $mensaje   = 'Hola '.$nombres.' Gracias por registrarse en modernstore.com <br>'. 
        'para verificar su cuenta haga click en el siguiente enlace'. 
        '<a href="http://localhost/modern-store/clientes/validar.php?codigo='.$codigo.'&id_cliente='.
        $fila2['id_cliente'].'"> Click aqui</a>';
        $cabeceras = 'From: carlo.db0adam@gmail.com' . "\r\n" .
            'Reply-To: carlo.db0adam@gmail.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        $success = mail($para, $asunto, $mensaje, $cabeceras);

        if ($success) {
            echo 'exito';
        }
    }else{
        echo 'emailrepetido';
    }
    cerrarconexion();
    }else{
        header('location: ../index.php');
    }
    //comparar si las contraseñas coinciden
    /*
    if(password_verify($passwordDeInput, $passwordDeBaseDeDatos)){
        echo 'login correcto';
    }
    else{
        echo 'login incorrecto';
    } */
?>