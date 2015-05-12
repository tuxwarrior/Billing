<?php 
//tabla cdr
include('CONF/config.inc');
session_start();




if(isset($_POST['exp'])){
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    
    $output = fopen('php://output', 'w');
    $campos = array('calldate','clid','src','dst','dcontext','channel','dstchannel','lastapp','lastdata','duration','billsec',
    'disposition','amaflags','accountcode','userfield','uniqueid','recvip','useragent','ipsrc','osrc','odst',
    'oint','type','trfcst','trfvnt','cost','sell');


fputcsv($output,$campos,";");

$query=$_SESSION['query2'];


$datoscsv= mysqli_query($conn, $query);



while($row = mysqli_fetch_assoc($datoscsv)){
    fputcsv($output, $row,";");
}
    fclose($output);
    mysqli_close($conn);
    exit();  
 
}

?>

<div>
  <form action="#" method="post">
    <input type="submit" value="Export" name="exp" />
  </form>
</div>