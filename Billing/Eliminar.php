<?php
//tabla ingreso
    
    session_start();

    if (!isset($_SESSION['usuario']) or ($_SESSION['privilegio'] != 1)) {
        header('Location: index.php');
    }


    include('CONF/config.inc');
    
    $query='SELECT usuario FROM ingreso';
    
    $resultado=mysqli_query($conn, $query);
    
    


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link type="text/css" rel="stylesheet" href="CSS/style.css">
        <script>
            function validarForm2(){
                var x2 = document.forms["destroyuser"]["userelim"].value;
                 
                
                if(x2 == null | x2 == ""){
                    alert("Debe llenar el campo usuario");
                    return false;
                }else{
                    var cancelar= confirm("Esta acción no se puede deshacer");
                    if(cancelar == false){
                        return false;
                    }
                }
                
                
                    
            }
                
             
        </script>
        <title>Eliminar Usuario</title>
    </head>
    <body>
        <div id="header">
            <!--<p><h1>Acceder</h1></p>-->
            <h2>Eliminar Usuario</h2>
                   </div>
        <div id="links">
            
            <?php
                if($_SESSION['privilegio']==1){
                echo "<a href='registro.php'>Agregar Usuario</a>";
                }
            
            ?>
            
            
            <a href="salir.php">Salir</a>
        </div>
                <div id="contenido">
                    <div id="aduser">
                        <form method="POST" action="Eliminar.php" name="destroyuser" onsubmit="return validarForm2()">
                            <fieldset>
                                <p>Usuario a eliminar: </p>
                                <select name="userelim">
                                    <?php
                                        while($row=mysqli_fetch_assoc($resultado)){
                                            echo"<option value='".$row['usuario']."'>".$row['usuario']."</option>";
                                        }
                                    ?>
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
