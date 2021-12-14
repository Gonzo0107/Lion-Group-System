<?php 

session_start();
		if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_POST['oculto'])) {
		header('location:comision.php');
	}

	
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id_comision2 = $_POST['id_comision2'];
	$id_salud2 = $_POST['id_salud2'];
	$id_pension2 = $_POST['id_pension2'];
	$id_colaborador2 = $_POST['id_colaborador2'];
	$fecha_radicacion2 = $_POST['fecha_radicacion2'];
	$liquidacion2 = $_POST['liquidacion2'];
	$id_eps2 = $_POST['id_eps2'];
	$id_formulario2 = $_POST['id_formulario2'];

	$sentencia = $bd->prepare("UPDATE comision SET id_comision = ?, id_salud = ?, id_pension = ?, id_colaborador = ?, fecha_radicacion = ?, liquidacion = ?, id_eps = ?, id_formulario = ? WHERE id_comision = ?;");
	$resultado = $sentencia->execute([$id_comision2,$id_salud2,$id_pension2,$id_colaborador2,$fecha_radicacion2,$liquidacion2,$id_eps2,$id_formulario2,$id_comision2]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Comision Editada!!");';
			echo 'window.location.href="comision.php";';
		echo '</script>';

	}else{
		echo "error";
	}

}else{
		echo 'error en el sistema';
	}
	


 ?>