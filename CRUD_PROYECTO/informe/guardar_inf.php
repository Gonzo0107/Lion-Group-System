<?php

include("conexion.php");

if(isset($_POST['guardar_inf'])){

	
	$id_inf = $_POST['id_inf'];
	$descripcion = $_POST['descripcion'];
	

    $query = "INSERT INTO informe(id_inf,descripcion) VALUES ('$id_inf', '$descripcion')";
	$result = mysqli_query($conex, $query);

	if (!$result){
		die("query failed");   
	}


	$_SESSION['message'] = 'tarea guardada';
	


   header("location: index_inf.php");
	}

?>