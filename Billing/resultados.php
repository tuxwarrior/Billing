<?php

session_start();    

if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}

if(isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    include("CONF/config.inc");
    // Pagina desde Ajax
    if(isset($_POST["pagina"])){
           $page_number = filter_var($_POST["pagina"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filtrar numero
           if(!is_numeric($page_number)){die('Numero de página inválido');} // En caso de pagina invalida o parapléjica          
    }else{
        $page_number = 1; //si no hay numero entonces 1 because fuckyou
    }
    
    // conseguir numero total de records de la base para paginar
    $results = $conn->query($querycount);
    $get_total_rows = $results->fetch_row(); //guardar total en una variable;
    // Descuartizar los controles para que salgan en paginas
    $total_pages = ceil($get_total_rows[0]/$item_per_page);
    
    // Conseguir el inicio
    $page_position = (($page_number-1)*$item_per_page);
    
    $results = $conn->query($querydatos." ". "$page_position, $item_per_page");
    

    // escupir los registros
    echo '<table>';
        echo '<tr>';
        echo '<th>calldate</th>';
        echo '<th>clid</th>';
        echo '<th>src</th>';
        echo '<th>dst</th>';
        echo '<th>dcontext</th>';
        echo '<th>channel</th>';
        echo '<th>dstchannel</th>';
        echo '<th>lastapp</th>
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
        </tr>';
        
        
        while($row=mysqli_fetch_assoc($results)){
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
        
       echo '<div align="center">';
       echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
       echo '</div>';


}


function paginate_function($item_per_page, $current_page, $total_records, $total_pages){
    
    $pagination = '';
    if($total_pages > 0 && $total_pages != 1 && $current_page <= $total_pages){ // verificando que no se destruya el mundo
        $pagination .= '<ul class="paginado">';
        
        $right_links    = $current_page + 3;
        $previous       = $current_page -3;
        $next           = $current_page +1;
        $first_link     = true;
        
        if($current_page > 1){
            $previous_link = ($previous=0)?1:$previous;
            $pagination .='<li class="first"><a href="#" data-page="1" title="First">&laquo;</a></li>'; //primer link
            $pagination .='<li><a href="#" data-page="'.$previous_link.'" title="Previous">&lt;</a></li>'; // previo
                for($i = ($current_page-2); $i < $current_page; $i++){
                    if($i > 0){
                        $pagination .= '<li><a href="#" data-page="'.$i.'" title="Pagina '.$i.'">'.$i.'</a></li>' ;
                    }
                }
            $first_link = false;
        }
        
        if($first_link){ //si el primer link es el actual
            $pagination .='<li class="first active">'.$current_page.'</li>';
        }elseif($current_page == $total_pages){ //Si es el ultimo link activo
            $pagination .= '<li class="last active">'.$current_page.'</li>';
        }else{ //Un link normal
            $pagination .= '<li class="active">'.$current_page.'</li>';
        }
        for($i= $current_page+1; $i < $right_links; $i++){
            if($i<=$total_pages){
                $pagination .= '<li><a href="#" data-page="'.$i.'" title="Pagina '.$i.'">'.$i.'</a></li>';
            }
        }
        if($current_page < $total_pages){
                            $next_link = ($i > $total_pages)? $total_pages : $i;
                $pagination .= '<li><a href="#" data-page="'.$next_link.'" title="Next">&gt;</a></li>'; //next link
                $pagination .= '<li class="last"><a href="#" data-page="'.$total_pages.'" title="Last">&raquo;</a></li>'; //last link
        }
        $pagination .= '</ul>'; 
    }
    
    return $pagination; //return pagination links
}

