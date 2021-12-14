<?php 
print_r($_POST);
session_start();
		if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){

	if (!isset($_POST['oculto'])) {
		header('location:formulario.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_formulario2 = $_POST['id_formulario2'];
	$id_salud2 = $_POST['id_salud2'];
	$id_pension2 = $_POST['id_pension2'];
	$id_colaborador2 = $_POST['id_colaborador2'];
	$id_tipo_documento2 = $_POST['id_tipo_documento2'];
	$numero_documento2 = $_POST['numero_documento2'];
	$nombre_cotizante2 = $_POST['nombre_cotizante2'];
	$apellidos_cotizante2 = $_POST['apellidos_cotizante2'];
	$nombre_razon2 = $_POST['nombre_razon2'];
	$numero_nit2 = $_POST['numero_nit2'];
	$fecha_radicacion2 = $_POST['fecha_radicacion2'];
	$id_eps2 = $_POST['id_eps2'];

	$sentencia = $bd->prepare("UPDATE formulario SET id_formulario = ?, id_salud = ?, id_pension = ?, id_colaborador = ?, id_tipo_documento = ?, numero_documento = ?, nombre_cotizante = ?, apellidos_cotizante = ?, nombre_razon = ?, numero_nit = ?, fecha_radicacion = ?, id_eps = ? WHERE id_formulario = ?;");
	$resultado = $sentencia->execute([$id_formulario2,$id_salud2,$id_pension2,$id_colaborador2,$id_tipo_documento2,$numero_documento2,$nombre_cotizante2,$apellidos_cotizante2,$nombre_razon2,$numero_nit2,$fecha_radicacion2,$id_eps2,$id_formulario2]);

	if ($resultado === TRUE) {

		echo '<script>';
			echo 'alert("Novedad Editada Correctamente!!");';
			echo 'window.location.href="formulario.php";';
		echo '</script>';

	}else{
		echo "error";
	}

	}else{
		echo 'error en el sistema';
	}


 ?>