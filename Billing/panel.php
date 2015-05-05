<?php

session_start();

if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}

include('CONF/config.inc');



?>


<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css"
        <title></title>
    </head>
    <body>
        <div id="header">
            
            <p><h2>Billing</h2></p>
        </div>
        <div id="links">
            <a href="registro.php">Agregar Usuario</a>
            <a href="salir.php">Salir</a>
        </div>
                <div id="contenido">
                    <div id="tablita">
                        <table>
                            <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Privilegio</th>
                            <th>Salt</th>
                            </tr>
                    <?php
                        $querydatos= 'SELECT * FROM ingreso';

                        $resultseti=mysqli_query($conn,$querydatos);
                        
                        
                        
                        while($row=mysqli_fetch_assoc($resultseti)){
                               echo "<tr>";
                               echo "<td>".$row["idUsuario"]."</td>";
                               echo "<td>".$row['usuario']."</td>";
                               echo "<td>".$row['contrasena']."</td>";
                               echo "<td>".$row['privilegio']."</td>";
                               echo "<td>".$row['salita']."</td>";
                               echo "</tr>";  
                        }
                        mysqli_free_result($resultseti);
                        
                        ?>
                        </table>
                        <form action="creadorcsv.php" method="POST">
                            <input type="submit" value="Descargar Tabla">
                        </form>
                        
                    </div>
                </div>
        <div name="footer">
            
        </div>
    </body>
</html>