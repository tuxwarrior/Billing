<?php

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
    
    
    $nuevouser= $_POST['nuevouser'];
    $nuevapass= $_POST['nuevapass'];
    $repeticion= $_POST['repepass'];
    $privilegio= $_POST['selecta'];
    
    $query="select * from ingreso where usuario='$nuevouser'";
    
    $result=  mysqli_query($conn, $query);
    
    if(mysqli_num_rows($result)>0){
        echo"<script>alert('No se puede agregar nuevo usuario, ya existe');</script>";
        header('Location registro.php');
    }
    
  
    
    if($nuevapass != $repeticion){
        echo "Las contraseñas no coinciden";
        header('Location: registro.php');
    }
    
    
    $hashito = create_hash($nuevapass);
            
    
    
   $ingresar="INSERT INTO ingreso(usuario,contrasena,privilegio) VALUES('$nuevouser','$hashito','$privilegio')";
   echo"<script>alert('Se ha agregado con éxito');</script>";
   
   
   mysqli_query($conn, $ingresar);
    