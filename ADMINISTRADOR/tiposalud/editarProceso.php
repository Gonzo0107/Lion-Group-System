
<?php 
//print_r($_POST);

	session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_POST['oculto'])) {
		header('location:tiposalud.php');
	}

	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$id_salud2 = $_POST['id_salud2'];
	$nombre_salud2 = $_POST['nombre_salud2'];
	$descrpcion2 = $_POST['descrpcion2'];

	$sentencia = $bd->prepare("UPDATE tipo_salud SET id_salud = ?, nombre_salud = ?, descrpcion = ? WHERE id_salud = ?;");
	$resultado = $sentencia->execute([$id_salud2,$nombre_salud2,$descrpcion2,$id_salud2]);

	if ($resultado === TRUE) {
		
		echo '<script>';
			echo 'alert("Tipo de salud Editada Correctamente !!");';
			echo 'window.location.href="tiposalud.php";';
		echo '</script>';

	}else{
		echo "error";
	}

}else{
		echo 'error en el sistema';
	}


 ?>