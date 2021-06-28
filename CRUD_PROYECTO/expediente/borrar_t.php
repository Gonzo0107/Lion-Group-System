<?php 

include("conexion.php");

if (isset($_GET['id_exp'])){
	$id_exp = $_GET['id_exp'];
	$query = "DELETE FROM expediente WHERE id_exp = $id_exp";

	$result = mysqli_query($conex, $query);

	if (!$result){
		die("query failed");   
	}


	$_SESSION['message'] = 'tarea removida';



   header("location: index.php");
	
}

?>
