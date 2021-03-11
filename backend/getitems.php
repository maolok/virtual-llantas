<?php
            $servername = "localhost";
            $username = "esteban";
            $password = "123456";
            $dbname = "virtual_llantas";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
               echo "error conexion BD";
            }
            else{

            $sql = "SELECT * FROM productos ORDER BY registro DESC";
            $resultado = mysqli_query($conn, $sql);
            $conn->close();

        }
        
        $arraygeneral = [];
        while($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){

            $date = $row["registro"];
            $dt = new DateTime($date, new DateTimeZone('UTC'));
            $dt->setTimezone(new DateTimeZone('America/Bogota'));
            $horafinal = date_format($dt, 'Y-m-d H:i:s');
            array_push($arraygeneral,array("registro" => $horafinal,"titulo" => $row["titulo"],"email" => $row["email"],"archivo" => $row["archivo"],"contenido" => $row["contenido"]));
            
             
        }

        $json = json_encode($arraygeneral);
        echo $json;
?>