q<?php 

//print_r($_POST); verificar envio de datos

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_pension = $_POST['id_pension'];
	$nombre_pension = $_POST['nombre_pension'];
	$descripcion = $_POST['descripcion'];


	$sentencia = $bd->prepare("INSERT INTO tipo_pension (id_pension,nombre_pension,descripcion) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$id_pension,$nombre_pension,$descripcion]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Tipo de pension Insertada Correctamente!!");';
			echo 'window.location.href="tipopension.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}

 ?>
