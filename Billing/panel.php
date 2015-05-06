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
                            <th>calldate</th>
                            <th>clid</th>
                            <th>src</th>
                            <th>dst</th>
                            <th>dcontext</th>
                            <th>channel</th>
                            <th>dstchannel</th>
                            <th>lastapp</th>
                            <th>lastdata</th>
                            <th>duration</th>
                            <th>billsec</th>
                            <th>disposition</th>
                            <th>amaflags</th>
                            <th>accountcode</th>
                            <th>userfield</th>
                            <th>uniqueid</th>
                            <th>recvip</th>
                            <th>useragent</th>
                            <th>ipsrc</th>
                            <th>osrc</th>
                            <th>odst</th>
                            <th>oint</th>
                            <th>type</th>
                            <th>trfcst</th>
                            <th>trfvnt</th>
                            <th>cost</th>
                            <th>sell</th>
                            </tr>
                    <?php
                        $querydatos= 'SELECT * FROM cdr limit 30';

                        $resultseti=mysqli_query($conn,$querydatos);
                        
                        
                        
                        while($row=mysqli_fetch_assoc($resultseti)){
                               echo "<tr>";
                               echo "<td>".$row["calldate"]."</td>";
                               echo "<td>".$row['clid']."</td>";
                               echo "<td>".$row['src']."</td>";
                               echo "<td>".$row['dst']."</td>";
                               echo "<td>".$row['dcontext']."</td>";
                               echo "<td>".$row['channel']."</td>";
                               echo "<td>".$row['dstchannel']."</td>";
                               echo "<td>".$row['lastapp']."</td>";
                               echo "<td>".$row['lastdata']."</td>";
                               echo "<td>".$row['duration']."</td>";
                               echo "<td>".$row['billsec']."</td>";
                               echo "<td>".$row['disposition']."</td>";
                               echo "<td>".$row['amaflags']."</td>";
                               echo "<td>".$row['accountcode']."</td>";
                               echo "<td>".$row['userfield']."</td>";
                               echo "<td>".$row['uniqueid']."</td>";
                               echo "<td>".$row['recvip']."</td>";
                               echo "<td>".$row['usragent']."</td>";
                               echo "<td>".$row['ipsrc']."</td>";
                               echo "<td>".$row['osrc']."</td>";
                               echo "<td>".$row['odst']."</td>";
                               echo "<td>".$row['oint']."</td>";
                               echo "<td>".$row['type']."</td>";
                               echo "<td>".$row['trfcst']."</td>";
                               echo "<td>".$row['trfvnt']."</td>";
                               echo "<td>".$row['cost']."</td>";
                               echo "<td>".$row['sell']."</td>";
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