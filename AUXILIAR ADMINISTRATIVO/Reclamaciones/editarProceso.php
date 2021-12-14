<?php 
print_r($_POST);

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	

	if (!isset($_POST['oculto'])) {
		header('location:estado.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_reclamaciones2 = $_POST['id_reclamaciones2'];
	$fecha_reclamacion2 = $_POST['fecha_reclamacion2'];
	$descripcion2 = $_POST['descripcion2'];
	$id_colaborador2 = $_POST['id_colaborador2'];

	$sentencia = $bd->prepare("UPDATE reclamaciones SET id_reclamaciones = ?, fecha_reclamacion = ?, descripcion = ?, id_colaborador = ? WHERE id_reclamaciones = ?;");
	$resultado = $sentencia->execute([$id_reclamaciones2,$fecha_reclamacion2,$descripcion2,$id_colaborador2,$id_reclamaciones2]);

	if ($resultado === TRUE) {
		header('location:reclamaciones.php');
	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}


 ?>