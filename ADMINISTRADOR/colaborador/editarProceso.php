<?php 
//print_r($_POST);

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){
	

	if (!isset($_POST['oculto'])) {
		header('location:comision.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_colaborador2 = $_POST['id_colaborador2'];
	$id_tipo_documento2 = $_POST['id_tipo_documento2'];
	$documento2 = $_POST['documento2'];
	$nombre2 = $_POST['nombre2'];
	$apellidos2 = $_POST['apellidos2'];
	$id_tipo_colaborador2 = $_POST['id_tipo_colaborador2'];
	$telefono2 = $_POST['telefono2'];
	$id_estado2 = $_POST['id_estado2'];
	$correo2 = $_POST['correo2'];
	$usuario2 = $_POST['usuario2'];

	$sentencia = $bd->prepare("UPDATE colaborador SET id_colaborador = ?, id_tipo_documento = ?, documento = ?, nombre = ?, apellidos = ?, id_tipo_colaborador = ?, telefono = ?, id_estado = ?, correo = ?, usuario = ? WHERE id_colaborador = ?;");
	$resultado = $sentencia->execute([$id_colaborador2,$id_tipo_documento2,$documento2,$nombre2,$apellidos2,$id_tipo_colaborador2,$telefono2,$id_estado2,$correo2,$usuario2,$id_colaborador2]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Colaborador Editado Correctamente!!");';
			echo 'window.location.href="colaborador.php";';
		echo '</script>';


	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}


 ?>