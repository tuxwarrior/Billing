<?php

$servername='localhost';
$dbusername='validacion';
$dbpassword='1ngr3s0'; //base de pruebas
$database='validacion';


$conn = mysqli_connect($servername,$username, $password,$database);

if(!conn){
    die("fallo conexión: ".mysqli_connect_error());    
}

$result = $conn->query("SELECT * from ingreso");

print '<table border=1>';

while ($row = $result->fetch_assoc()) {
    print '<tr>';
    print '<td>'.$row["usuario"].'</td>';
    print '<td>'.$row["contrasena"].'</td>';
    print '</tr>';
}
print '</table>';

$result->free();


echo "conexión exitosa";

mysqli_close($conn);
