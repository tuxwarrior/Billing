<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"
        <title></title>
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <p><h2>Ingrese usuario y contrase&ntilde;a</h2></p>
        </div>
                <div id="contenido">
                    <div id="login">

                        <form action="login.php" name="ingreso" method="POST">
                            <fieldset>
                                   
                                <p><strong>Usuario: </strong></p>
                                <p><input type="text" name="usuario" required="usuario"></p>
                                
                                <p><Strong>Contraseña: </strong></p>
                                <p><input type="password" name="password" required="password"></p>
                               
                            <input type="submit" id="btnenviar" value="Entrar">
                            </fieldset>
                        </form>
                    </div>
                </div>
        <div name="footer">
            
        </div>
    </body>
</html>
