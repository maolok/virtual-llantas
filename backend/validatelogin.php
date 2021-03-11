<?php
   //include("config.php");
   session_start();
   $usuario = $_POST['usuario'];
   $contrasena = $_POST['contrasena']; 
   

    $servername = "localhost";
    $username = "esteban";
    $password = "123456";
    $dbname = "virtual_llantas";

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT COUNT(id) AS id FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
   
    $result = mysqli_query($conn, $sql);

      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $toggle = $row['id'];
      $conn->close();

      if ($toggle == 1)
      {
         echo "LOGIN CORRECTO";
         
         $_SESSION['nombreuser'] = $usuario;
         
         header("location: http://3.137.142.169/virtualllantas/fronted/index.php");

      }
      else{
         echo "LOGIN INCORRECTO";
         //sleep(2);
         header("location: http://3.137.142.169/virtualllantas/fronted/login.html");
        
      }
      
       
   
?>