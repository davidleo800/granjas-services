<?php
    
    // Variables de la conexion a la DB
    $mysqli = new mysqli("localhost","id12230130_root","12345","id12230130_dbcontrol_pollos_engorde");
    
    // Comprobamos la conexion
    if($mysqli->connect_errno) {
        die("Fallo la conexion");
    } else {
        //echo "Conexion exitosa";
    }
    
    ?>