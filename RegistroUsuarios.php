  <?php

$hostname_localhost = 'localhost';
$database_localhost = 'id12230130_dbcontrol_pollos_engorde';
$username_localhost = 'id12230130_root';
$password_localhost = '12345';


$json = array();

	if(isset($_GET["ID_CC"]) && isset($_GET["Nombre"]) && isset($_GET["Apellido"]) && isset($_GET["usuario"]) && isset($_GET["granja"])){
		$ID_CC = $_GET["ID_CC"];
		$Nombre = $_GET["Nombre"];
		$Apellido = $_GET["Apellido"];
		$usuario = $_GET["usuario"];
		$granja = $_GET["granja"];

		$conexion = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);
		
			$insert = "INSERT INTO tb_login(ID_CC, Nombre, Apellido, usuario, granja) VALUE ($ID_CC, '$Nombre', '$Apellido', $usuario, '$granja')";

		
		$resultado_insert = mysqli_query($conexion, $insert);

		if($resultado_insert){
			$consulta="SELECT * FROM tb_login WHERE ID_CC = '{$ID_CC}'";
			$resultado=mysqli_query($conexion,$consulta);
			
			if($registro=mysqli_fetch_array($resultado)){
				$json['tb_login'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$resulta["ID_CC"]=0;
			$resulta["Nombre"]='No Registra';
			$resulta["Apellido"]='No Registra';
			$resulta["usuario"]=0;
			$resulta["granja"]='No Registra';
			$json['tb_login'][]=$resulta;
			echo json_encode($json);
		}
		
	} elseif(isset($_GET["ID_CC"]) && isset($_GET["Nombre"]) && isset($_GET["Apellido"]) && isset($_GET["usuario"]) ){
		$ID_CC = $_GET["ID_CC"];
		$Nombre = $_GET["Nombre"];
		$Apellido = $_GET["Apellido"];
		$usuario = $_GET["usuario"];
		
		$conexion = mysqli_connect($hostname_localhost, $username_localhost, $password_localhost, $database_localhost);
		$insert = "INSERT INTO tb_login(ID_CC, Nombre, Apellido, usuario) VALUE ($ID_CC, '$Nombre', '$Apellido', $usuario)";
		$resultado_insert = mysqli_query($conexion, $insert);

		if($resultado_insert){
			$consulta="SELECT * FROM tb_login WHERE ID_CC = '{$ID_CC}'";
			$resultado=mysqli_query($conexion,$consulta);
			
			if($registro=mysqli_fetch_array($resultado)){
				$json['tb_login'][]=$registro;
			}
			mysqli_close($conexion);
			echo json_encode($json);
		}
		else{
			$resulta["ID_CC"]=0;
			$resulta["Nombre"]='No Registra';
			$resulta["Apellido"]='No Registra';
			$resulta["usuario"]=0;
			$json['tb_login'][]=$resulta;
			echo json_encode($json);
		}
	}
	else{
			$resulta["ID_CC"]=0;
			$resulta["Nombre"]='WS no retorna';
			$resulta["Apellido"]='WS no retorna';
			$resulta["usuario"]=0;
			$resulta["granja"]='WS no retorna';
			$json['tb_login'][]=$resulta;
			echo json_encode($json);
	}

?>