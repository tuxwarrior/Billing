<?php
// iniciar sesion
session_start();
//incluir la conexion a base
include('CONF/config.inc');
//armando el query
$query= "SELECT * from ingreso WHERE (usuario = '".$_POST['usuario']."') and
    (contrasena = '".$_POST['password']."')";

//ejecutando query
$result = mysqli_query($conn,$query);

//si la cantidad de resultados es 1 entonces se loguea
if(mysqli_num_rows($result)==1){
    $_SESSION['usuario'] = $_POST['usuario'];
    header("Location:panel.php");
}
else
    {
    //deportar al inicio si la contraseña es incorrecta
     header("Location:index.php");
     $_SESSION['incorrecto'] = 'si' ;
     
    }
    mysqli_free_result($result);
    mysqli_close($conn);

