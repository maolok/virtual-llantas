<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: http://3.137.142.169/virtualllantas/fronted/login.html");
   }
?>