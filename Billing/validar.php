<?php

//tabla ingreso
// iniciar sesion
session_start();
//incluir la conexion a base
include('CONF/config.inc');
include('PasswordHash.php');

$usuario= $_POST['usuario'];
$password = $_POST['password'];



//armando el query
$query= "SELECT usuario,contrasena,privilegio from ingreso WHERE usuario = '$usuario'";

//ejecutando query
$result = mysqli_query($conn,$query);


$hashito=  mysqli_fetch_assoc($result);


//si la cantidad de resultados es 1 entonces se loguea
if(mysqli_num_rows($result)== 0){
    $_SESSION['incorrecto'] = 'SI';
    header('Location: index.php');
    
    
}
else
    {
    if(validate_password($password, $hashito['contrasena'] )){
        header('Location: panel.php');
        $_SESSION['usuario']= $usuario;
        $_SESSION['privilegio']=$hashito['privilegio'];
    }
    
     
    }
    mysqli_free_result($result);
    mysqli_close($conn);

