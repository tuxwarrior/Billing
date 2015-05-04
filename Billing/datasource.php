<?php

$servername='localhost';
$username='validacion';
$password='1ngr3s0'; //base de pruebas

$conn = mysqli_connect($servername,$username, $password);

if(!conn){
    die("fallo conexión: ".mysqli_connect_error());    
}

echo "conexión exitosa";

mysqli_close($conn);
