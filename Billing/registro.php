<?php

session_start();
if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}

include('CONF/config.inc');

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
