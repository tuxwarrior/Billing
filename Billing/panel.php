<?php

session_start();

if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}


?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"
        <title></title>
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <p><h2>Billing</h2></p>
        </div>
        <div id="links">
            <a href="registro.php">Agregar Usuario</a>
        </div>
                <div id="contenido">
                    <div id="login">

                        
                    </div>
                </div>
        <div name="footer">
            
        </div>
    </body>
</html>