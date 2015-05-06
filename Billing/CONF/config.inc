<?php

// Base de usuarios

$servername='localhost';
$dbusername='validacion';
$dbpassword='1ngr3s0'; //base de pruebas
$database='validacion';


$conn = mysqli_connect($servername,$dbusername, $dbpassword,$database) or DIE('ERRORRRR' .  mysqli_error($conn) );

// Base de CDR

