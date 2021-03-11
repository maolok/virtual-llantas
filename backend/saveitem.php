<?php

$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 

if(isset($_POST['titulo']) || isset($_POST['email']) || isset($_POST['contenido']) || isset($POST['archivo'])){ 
    
    
    $titulo = $_POST['titulo']; 
    $email = $_POST['email']; 
    $contenido = $_POST['contenido'];
    $target_dir = "/var/www/html/virtualllantas/uploads/";
    $target_file2 = "/virtualllantas/uploads/" . basename($_FILES["archivo"]["name"]);
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["archivo"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
         $response['status'] = 0; 
         $response['message'] = 'Adjunto No es Imagen';
        $uploadOk = 0;
      }
    }
    //validaciones form

    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
      $response['status'] = 0;
      $response['message'] = 'Email no valido!'; 
      $uploadOk = 0;
    }
    
    
    if (file_exists($target_file)) {
     
      $uploadOk = 0;
      $response['status'] = 0; 
      $response['message'] = 'Archivo Ya Existe!';
    }
    
    
    if ($_FILES["archivo"]["size"] > 500000) {
      $response['status'] = 0; 
      $response['message'] = 'Tamaño del archivo Excedido!';
      $uploadOk = 0;
    }
    
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $response['status'] = 0; 
      $response['message'] = 'Formato Invalido!';
      $uploadOk = 0;
    }
    
    
    if ($uploadOk == 1) {

      if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
         if(insertBD($titulo,$email,$contenido,$target_file2)){
              
            $response['status'] = 1; 
            $response['message'] = 'Registro Guardado en BD!'; 

         }
         else{

            $response['status'] = 0; 
            $response['message'] = 'No se pudo Guardar en BD!'; 

         }
       } else {
       $response['status'] = 0; 
       $response['message'] = 'No se pudo Subir Imagen!'; 
       }
      
    } 
}

function insertBD($titulo,$email,$contenido,$target_file2){

   $retorno;
   $servername = "localhost";
   $username = "esteban";
   $password = "123456";
   $dbname = "virtual_llantas";

   $conn = new mysqli($servername, $username, $password, $dbname);
   
   $sql = "INSERT INTO productos(titulo,email,archivo,contenido)VALUES ('$titulo', '$email','$target_file2','$contenido')";
   

   if (mysqli_query($conn, $sql)) {
      
      $retorno = true;
      
   } else {

      $retorno = false;
   }
   
   $conn->close();
   return $retorno;

} 

echo json_encode($response);


?>
