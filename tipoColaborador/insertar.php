<?php 

//print_r($_POST); verificar envio de datos


session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_tipo_colaborador = $_POST['id_tipo_colaborador'];
	$tipo_colaborador = $_POST['tipo_colaborador'];
	$funcion = $_POST['funcion'];


	$sentencia = $bd->prepare("INSERT INTO tipo_colaborador(id_tipo_colaborador,tipo_colaborador,funcion) VALUES (?,?,?);");
	$resultado = $sentencia->execute([$id_tipo_colaborador,$tipo_colaborador,$funcion]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Tipo de colaborador Insertado Correctamente!!");';
			echo 'window.location.href="tipocolaborador.php";';
		echo '</script>';

	}else{
		echo "error";
	}

		}else{
		echo 'error en el sistema';
	}

 ?>
