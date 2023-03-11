<?php
    
    $server = "localhost";
    $user = "id12230130_root";
    $pass = "12345";
    $bd = "id12230130_dbcontrol_pollos_engorde";
    
    $json = $_POST['json'];
    
    $jsonDecode = json_decode($json, true);
    
    $conexion = mysqli_connect($server, $user, $pass,$bd)
    or die("Ha sucedido un error inexperado en la conexion de la base de datos");
    
    foreach($jsonDecode['Detalles'] as $fila) {
        $fecha = mysqli_real_escape_string($conexion, $fila['fecha']);
        $granja = mysqli_real_escape_string($conexion, $fila['granja']);
        $galpon = mysqli_real_escape_string($conexion, $fila['galpon']);
        $galponero = mysqli_real_escape_string($conexion, $fila['galponero']);
        $mortalidad = mysqli_real_escape_string($conexion, $fila['mortalidad']);
        $alimento = mysqli_real_escape_string($conexion, $fila['alimento']);
        $peso = mysqli_real_escape_string($conexion, $fila['peso']);
        //$veterinario = mysqli_real_escape_string($conexion, $fila['veterinario']);
        
        $sql = "INSERT INTO tb_detalles (fecha, granja, galpon, galponero, mortalidad, alimento, peso) 
                VALUES ('$fecha', '$granja', '$galpon', $galponero, $mortalidad, $alimento, $peso)";
        
        mysqli_query($conexion, $sql);
    }
    
    echo "OK";
    
    mysqli_close($conexion);
    
?>