<?php 

//print_r($_POST); verificar envio de datos

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_tipo_documento = $_POST['id_tipo_documento'];
	$tipo_documento = $_POST['tipo_documento'];


	$sentencia = $bd->prepare("INSERT INTO tipo_documento(id_tipo_documento,tipo_documento) VALUES (?,?);");
	$resultado = $sentencia->execute([$id_tipo_documento,$tipo_documento]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Tipo de documento Insertado Correctamente!!");';
			echo 'window.location.href="tipodocumento.php";';
		echo '</script>';


	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}

 ?>
