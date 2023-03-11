<?php 
include 'conection.php';
$ID_CC = $_POST['usuario'];
//$usu_password = $_POST['password'];
//$ID_CC = 1010;

$sentencia = $mysqli -> prepare("SELECT * FROM tb_login WHERE ID_CC=?");
$sentencia -> bind_param('i', $ID_CC);
$sentencia -> execute();

$resultado = $sentencia -> get_result();
if ($fila = $resultado -> fetch_assoc()){
	echo json_encode($fila, JSON_UNESCAPED_UNICODE);
}
$sentencia -> close();
$mysqli -> close();

?>