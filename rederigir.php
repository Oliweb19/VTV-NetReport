<?php 
	session_start(); 

	$conexion = mysqli_connect('localhost', 'root', '', 'vtv_netreport');
			
	$nombre_login = $_POST['usuario'];
	$clave_login = $_POST['clave'];

	// Verificar que el Usuario Existe
	$sql = "SELECT * FROM acceso WHERE usuario = '$nombre_login'";
	$resultado = mysqli_query($conexion, $sql);
	$resultado = mysqli_fetch_array($resultado);
	
	if(!$resultado){
		echo "<script> window.alert('*Usuario Invalido'); window.location='index.php';</script>";
	}
	else if($clave_login == $resultado['clave']){

		$sql = "SELECT * FROM acceso WHERE usuario = '$nombre_login'"; 
		$resultado1 = mysqli_query($conexion,$sql);
		$resultado1 = mysqli_fetch_array($resultado1);

		$_SESSION['admin'] = $resultado1['nombre'];
		header("location: reporte.php");
		exit;
		
	}
	else{
		echo "<script> window.alert('*Contraseña Invalida'); window.location='index.php';</script>"; 
	}

?>
