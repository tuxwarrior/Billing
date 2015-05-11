<?php

session_start();

if (!isset($_SESSION['usuario']) and !($_SESSION['privilegio'] == 1)) {
header('Location: index.php');
}

include('CONF/config.inc');

$start=0;
$limit=20;



if(isset($_POST['from'])){
    $dateStart = new DateTime($_POST['from']);
    $timeStart = $_POST['tiempo_inicio'];
    $dateEnd = new DateTime($_POST['to']);
    $timeEnd = $_POST['tiempo_fin'];
    $fdateStart = $dateStart->format('Y-m-d');
    $fdateEnd  = $dateEnd->format('Y-m-d');
    $Inicio=$fdateStart." ".$timeStart;
    $fin=$fdateEnd." ".$timeEnd;
    setcookie('inicio',$Inicio);
    setcookie('fin', $fin);
}else{
    $Inicio=$_COOKIE['inicio'];
    $fin=$_COOKIE['fin'];
}





if(isset($_GET['id'])){
    $id=$_GET['id'];
    $start=($id-1)*$limit;
}



$querydatos = "SELECT * FROM cdr WHERE calldate BETWEEN '$Inicio' AND '$fin' LIMIT $start, $limit";



?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <script type='text/javascript' src='Scripts/jquery-1.11.3.min.js'></script>
        <script type="text/javascript" language="javascript" src="Scripts/jquery.dropdown.js"></script>
    </head>
    <body>
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
                        //cantidad registros
                        $query2="SELECT * FROM cdr WHERE calldate BETWEEN '$Inicio' AND '$fin'";
                        $filas=  mysqli_num_rows(mysqli_query($conn,$query2));
                       
                        
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
                    <div id="paginas">
                        <?php
                            $total=ceil($filas/$limit);
                            if($id>1){
                                echo "<a href='?id=".($id-1)."' class='boton'>Anterior</a>";                                
                            }
                            if($id!=$total){
                                echo "<a href='?id=".($id+1)."' class='boton'>Siguiente</a>";
                            }
                            
                            echo "<div class='numeros'>";
                            /*echo "<ul id='lista'>";
                            echo "<li><h4>Páginas</h4>";
                                echo "<ul>";*/
                                for($i=1;$i<=$total;$i++){
                                    if($i==id){/* echo "<li class='current'>".$i."</li>";*/
                                        echo "<h3>".$i."</h3>";
                                }
                                        
                                    else{ /*echo "<li><a href='?id=".$i."'>".$i."</a></li>";*/
                                        echo "<a href='?id=".$i."'>".$i."</a>";
                                    }
                                    
                                }
                                /*
                            echo "</li></ul>";
                            echo "</ul>";    
                            */
                                echo "</div>";
                        ?>
                        
                    </div>
    </body>
</html>