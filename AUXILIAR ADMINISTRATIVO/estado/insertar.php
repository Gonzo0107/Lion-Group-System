<?php 

//print_r($_POST); verificar envio de datos
session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_estado = $_POST['id_estado'];
	$tipo_estado = $_POST['tipo_estado'];


	$sentencia = $bd->prepare("INSERT INTO estado(id_estado,tipo_estado) VALUES (?,?);");
	$resultado = $sentencia->execute([$id_estado,$tipo_estado]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Estado Insertado Correctamente!!");';
			echo 'window.location.href="estado.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}
 ?>
