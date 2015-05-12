<?php
    //tabla ingreso
    session_start();

    if (!isset($_SESSION['usuario']) or ($_SESSION['privilegio'] != 1)) {
        header('Location: index.php');
    }




?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <script>
            function validarForm2(){
                var x2 = document.forms["crearuser"]["nuevouser"].value;
                var y2 = document.forms["crearuser"]["nuevapass"].value;
                var z  = document.forms["crearuser"]["repepass"].value; 
                
                if(x2 == null | x2 == ""){
                    alert("Debe llenar el campo usuario");
                    return false;
                }else{
                    if(y2 == null | y2 == ""){
                        alert("Debe llenar el campo contraseña");
                        return false;
                    }else{
                        if(z == null | z == ""){
                            alert("Repita su contraseña");
                            return false;
                        }else{
                            if(y2 != z){
                                alert("Las contraseñas no coinciden");
                                return false;
                            }
                        }
                    }
                    
                }
                
                
                
            }
        </script>
        <title>Agregar nuevo usuario</title>
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <h2>Agregar nuevo usuario</h2>
                   </div>
        <div id="links">
            <a href="panel.php">Reportes CDR</a>
            
            <?php
                if($_SESSION['privilegio']==1){
                echo "<a href='Eliminar.php'>Eliminar Usuario</a>";
                }
            
            ?>
            
            
            <a href="salir.php">Salir</a>
        </div>
                <div id="contenido">
                    <div id="aduser">
                        <form method="POST" action="pValidacion.php" name="crearuser" onsubmit="return validarForm2()">
                            <fieldset>
                                <p>Nuevo usuario: </p>
                                <p><input type="text" name="nuevouser"> </p>
                                <p> Contraseña: </p>
                            <p>    <input type="password" name="nuevapass"> </p>
                            <p> Repita la contraseña:</p>
                            <p>   <input type="password" name="repepass"></p>
                            <p> Nivel privilegio</p>
                            <select required class="selecta" name="selecta">
                                <option value="1" >BOFH</option>
                                <option value="2">LUSER</option>
                            </select>
                            <input type="submit" value="Enviar">
                            
                            </fieldset>
                        </form>
                        
                    </div>
                </div>
        <div id="footer">
            
        </div>
    </body>

</html>
