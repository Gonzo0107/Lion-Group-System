<?php 

//print_r($_POST); verificar envio de datos

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_salud = $_POST['id_salud'];
	$nombre_salud = $_POST['nombre_salud'];
	$descrpcion = $_POST['descrpcion'];


	$sentencia = $bd->prepare("INSERT INTO tipo_salud (id_salud,nombre_salud,descrpcion) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$id_salud,$nombre_salud,$descrpcion]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Tipo de salud insertada Correctamente !!");';
			echo 'window.location.href="tiposalud.php";';
		echo '</script>';

	}else{
		echo "error";
	}


}else{
		echo 'error en el sistema';
	}
 ?>
