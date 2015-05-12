<?php

session_start();

if (!isset($_SESSION['usuario'])) {
header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
         <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/jquery-1.11.3.js"></script>
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
                        <form name="formuconsu" method="POST" action="tabla-cdr.php">
                            <p><label>Fecha inicio</label>
                            <input id="from" type="text" class="from" name="from" value="05-05-2015" />
                            <label>Hora inicio</label>
                            <input type="text" id="tiempo_inicio" name="tiempo_inicio" value="00:00:00">
                            <label>Fecha fin</label>
                            <input id="to" type="text" class="to" name="to" value="05-05-2015" />
                            <label>Hora fin</label>
                            <input type="text" id="tiempo_fin" name="tiempo_fin"  value="23:59:59"></p>
                            <input type="submit">
                        </form>
                        
                    </div>
                    

                   
                        
                    </div>
                    <div id="CSV">
                    <form action="creadorcsv.php" method="POST">
                            <input type="submit" value="Descargar Tabla">
                        </form>
                    </div> 

                    
                </div>
        <div name="footer">
            
        </div>
    </body>
</html>