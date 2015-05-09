<?php

session_start();

if (!isset($_SESSION['usuario']) and !($_SESSION['privilegio'] == 1)) {
header('Location: index.php');
}

include('CONF/config.inc');




$dateStart = new DateTime($_POST['from']);
$timeStart = $_POST['tiempo_inicio'];
$dateEnd = new DateTime($_POST['to']);
$timeEnd = $_POST['tiempo_fin'];

$fdateStart = $dateStart->format('Y-m-d');
$fdateEnd  = $dateEnd->format('Y-m-d');

$Inicio=$fdateStart." ".$timeStart;
echo "<br>";
$fin=$fdateEnd." ".$timeEnd;



$querydatos = "SELECT * FROM cdr WHERE calldate BETWEEN '$Inicio' AND '$fin' LIMIT 10";





?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.10.2.js"></script>
         <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        <script type="text/javascript">
             $(function() {
                $( "#from" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 1,
                    onClose: function( selectedDate ) {
                    $( "#to" ).datepicker( "option", "minDate", selectedDate );
                    }
                    });
                    $( "#to" ).datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        numberOfMonths: 1,
                        onClose: function( selectedDate ) {
                            $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                        }
                    });
            });
        </script>
        <title>Consulta de CDR</title>
    </head>
    <body>
        <div id="header">
            
            <p><h2>Billing</h2></p>
        </div>
        <div id="links">
            <a href="registro.html">Agregar Usuario</a>
            <a href="salir.php">Salir</a>
        </div>
                <div id="contenido">
                    <div id="form">
                        <form name="formuconsu" method="POST" action="<?php echo $_SERVER_PHP['SELF'];  ?>">
                            <p><label>Fecha inicio</label>
                            <input id="from" type="text" class="from" name="from" />
                            <label>Hora inicio</label>
                            <input type="text" id="tiempo_inicio" name="tiempo_inicio" value="00:00:00">
                            <label>Fecha fin</label>
                            <input id="to" type="text" class="to" name="to" />
                            <label>Hora fin</label>
                            <input type="text" id="tiempo_fin" name="tiempo_fin"  value="23:59:59"></p>
                            <input type="submit">
                        </form>
                        
                    </div>
                    
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
                        
                        //QUERY
                        $resultseti=mysqli_query($conn,$querydatos) or die(mysqli_error($conn));
                        
                        $filas= mysqli_num_rows($resulseti);
                        
                        
                       
                        
                         
                        
                        
                        
                        
                        
                        
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
                               echo "<td>".$row['useragent']."</td>";
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