<?php

    session_start();
    if($_SESSION['incorrecto'] == 'si'){
        echo"<h3 style='color:red;background:white;font-family: sans-serif;'>CONTRASEÑA INCORRECTA</h3>";
        unset($_SESSION['incorrecto']);
    }
       

?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <script>
                     
            
            function validarForm() {
                var x = document.forms["login"]["usuario"].value;
                var n = document.forms["login"]["password"].value;
                
                if(x == null | x == ""){
                    alert("Debe llenar el campo usuario");
                    return false;
                }else{
                    if(n == null | n == ""){
                        alert("Debe llenar el campo contraseña");
                        return false;
                    }
                }
                
            }
        </script>
        <title>Inicio de Sesión</title>
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <p><h2>Ingrese usuario y contrase&ntilde;a</h2></p>
        </div>
                <div id="contenido">
                    <div id="login">

                        <form  name="login"  method="POST" action="validar.php" onsubmit="return validarForm()">
                            <fieldset>
                                   
                                <p><strong>Usuario: </strong></p>
                                <p><input type="text" name="usuario"></p>
                                
                                <p><Strong>Contraseña: </strong></p>
                                <p><input type="password" name="password"></p>
                               
                            <input type="submit" name="btnenviar" value="Entrar">
                            </fieldset>
                        </form>
                    </div>
                </div>
        <div name="footer">
            
        </div>
    </body>
</html>
