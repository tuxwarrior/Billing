<?php
//Tabla ingreso


session_start();

 if (!isset($_SESSION['usuario'])) {
        header('Location: index.php');
    }
    
    include('PasswordHash.php');
    include('CONF/config.inc');
    
    
    if(empty($_POST['nuevouser'])){
        echo "Debe llenar todos los campos";
        header('Location: registro.php');
        }else{
           if(empty($_POST['nuevapass'])){
               header('Location: registro.php');
           }else{
               if(empty($_POST['repepass'])){
                   header('Location: registro.php');
               }
           }
        }
    
    
    $nuevouser  = $_POST['nuevouser'];
    $nuevapass  = $_POST['nuevapass'];
    $repeticion = $_POST['repepass'];
    $privilegio = $_POST['selecta'];
    
    $consulta="SELECT usuario FROM ingreso WHERE usuario='$nuevouser'";
    
    $resultado1=  mysqli_query($conn, $consulta);
    $colita=  mysqli_fetch_row($resultado1);
    
    
    if($nuevapass != $repeticion){
        echo "<script>alert('Las contraseñas no coinciden')</script>";
        sleep(10);
        header('Location: registro.php');
    }
    
    
    if($colita[0]==$nuevouser){
        echo"<script>alert('No se puede agregar nuevo usuario, ya existe');</script>";
        sleep(10);
        header('Location registro.php');
    }else{
        echo "<script>alert(".$colita['usuario'].")</script>";
        $hashito = create_hash($nuevapass);
        $ingresar="INSERT INTO ingreso(usuario,contrasena,privilegio) VALUES('$nuevouser','$hashito','$privilegio')";
        mysqli_query($conn, $ingresar);
        echo"<script>alert('Se ha agregado con éxito');</script>";
        sleep(10);
        //header('Location: registro.php');
        
    }
    
  
    
   
    
    