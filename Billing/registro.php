<?php

session_start();
if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}

include('CONF/config.inc');


define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS",4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);


function create_hash($nuevapass)
{
    
    //formato: algoritmo:iteraciones:sal:hash
    $salt= base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_RANDOM));
    return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" . $salt . ":" . 
    base64_encode(pbkdf2(
            PBKDF2_HASH_ALGORITHM,
            $nuevapass,
            $salt,
            PBKDF2_ITERATIONS,
            PBKDF2_HASH_BYTE_SIZE,
            true       
            ));    
}












$query="INSERT INTO ingreso(usuario,contrasena) VALUES('$usuario', '$hashedpass');"


?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <p><h2>Agregar nuevo usuario</h2></p>
        </div>
        <div id="links">
            <a href="panel.php">Reportes CDR</a>
            <a href="salir.php">Salir</a>
        </div>
                <div id="contenido">
                    <div id="aduser">
                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];  ?>">
                            <fieldset>
                            <p>Nuevo usuario: 
                                <input type="text" name="nuevouser"> </p>
                            <p> Contraseña: 
                                <input type="password" name="nuevapass"> </p>
                            <p> Repita la contraseña:
                                <input type="password" name="repepass"></p>
                            <input type="submit" value="Enviar">
                            
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
        <div name="footer">
            
        </div>
    </body>

</html>
