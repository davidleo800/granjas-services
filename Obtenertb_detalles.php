<?php

    require "conection.php";
    
    $sql = "SELECT * FROM tb_detalles";
    $query = $mysqli->query($sql);
    
    $datos = array();
    
    while($resultado = $query->fetch_assoc()) {
        $datos[] = $resultado;
    }
    
    echo json_encode(array("tb_detalles" => $datos));//"Ventas"
    
?>