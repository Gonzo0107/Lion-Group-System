<?php

include ('conexion.php');

if(isset($_POST['guardar_t'])){

	$id_exp = $_POST['id_exp'];
    $fecha_exp = $_POST['fecha_exp'];	
    $id_inf = $_POST['id_inf'];
	$descripcion = $_POST['descripcion'];
	$observacion = $_POST['observacion'];

    $query = "INSERT INTO expediente(id_exp,fecha_exp,id_inf,descripcion,observacion) VALUES ('$id_exp','$fecha_exp', 'id_inf', '$descripcion', '$observacion')";
    
	$result = mysqli_query($conex, $query, $query1);

	if (!$result){
		die("query failed");   
	}


	$_SESSION['message'] = 'tarea guardada';
	


   header("location: index.php");
	}

?>