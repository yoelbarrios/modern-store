<?php
$host="localhost";
$user="root";
$pass="";
$db="modern_store";

$link = mysqli_connect($host,$user,$pass,$db);
if(!$link){
    die("error de conexion ".mysqli_error());
}
mysqli_select_db($link,"modern_store") or die ("error de conexion a la base de datos ".mysqli_error());
//funcion para cerrar conexion
function cerrarconexion(){
    mysqli_close($GLOBALS['link']);
}
?>
