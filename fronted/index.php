<?php

session_start();
 
if(!isset($_SESSION['nombreuser'])){
    header('Location: http://3.137.142.169/virtualllantas/fronted/login.html');
    exit;
} 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <title>Test</title>
    <link rel="stylesheet" href="./cssstyles/estilos.css"></link>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  </head>
  <script src="captcha.js"></script>
  <body onload="serverGet();">

 
<div class="container-md" id="form">
  
    <form id="formulario" enctype="multipart/form-data">
        

        <div class="mb-3">
          <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" required>
        </div>

        <div class="mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>

        
        
        <div class="mb-3">
        <input type="file" size="30" name="archivo" id="archivo" required>
        </div>

        <div class="mb-3">
            <textarea class="form-control" id="contenido" name="contenido" placeholder="Contenido" required></textarea>
          </div>

        <div class="mb-3">
        <input type="submit" name="submit" class="btn btn-success submitBtn" value="Guardar"/>
        </div>


    </form>
  

 
</div>
<div class="container-md">
    <h3>Lista de Post</h3>
<div class="container-md" id="render">



</div>

    
  
</div>   


<footer class="container-md">

<h2><a href = "../backend/logout.php" class="btn btn-info btn-info">SALIR</i></a></h2>

</footer>

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="validador.js"></script>
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
     <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  </body>
</html>