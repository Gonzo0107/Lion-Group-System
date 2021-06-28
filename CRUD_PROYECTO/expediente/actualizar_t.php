<?php
include ('conexion.php');

if(isset($_GET['id_exp'])){
	$id_exp = $_GET['id_exp'];
	$query = "SELECT * FROM expediente WHERE id_exp = $id_exp";
	$result = mysqli_query($conex, $query);
	if (mysqli_num_rows($result) == 1){

		$row = mysqli_fetch_array($result);
		$id_exp = $row['id_exp'];
		$fecha_exp = $row['fecha_exp'];
		$id_inf = $row['id_inf'];
		$descripcion = $row['descripcion'];
		$observacion = $row['observacion'];

	}

}

if (isset($_POST['actualizar'])) {
	$id_exp = $_GET['id_exp'];
	$fecha_exp = $_POST['fecha_exp'];
	$id_inf = $r_POST['id_inf'];
	$descripcion = $_POST['descripcion'];
	$observacion = $_POST['observacion'];

	$query = "UPDATE expediente SET id_exp ='$id_exp', fecha_exp = '$fecha_exp' ,  id_inf = '$id_inf', descripcion = '$descripcion' , observacion = '$observacion' WHERE id_exp =$id_exp";

	mysqli_query($conex, $query);

	$_SESSION['message'] = 'tarea actualizada';
	


	header("location: index.php");
}

?>




<div >
<div >
<div >
<div >
<form action="actualizar_t.php?id_exp=<?php echo $_GET['id_exp']; ?>" method="POST">
	<div class="form-group">
		<input type="date" name="fecha_exp" value="<?php echo $fecha_exp; ?>"  placeholder= "actualiza fecha">
	</div>
	<div class="form-group">
		<input type="text" name="id_inf" value="<?php echo $id_inf; ?>"  placeholder= "actualiza id">
	</div>
	<div >
		<textarea name="descripcion" rows="2" placeholder="descripcion"><?php echo $descripcion; ?></textarea>
	</div>
	<div >
		<textarea name="observacion" rows="2" placeholder="observacion"><?php echo $observacion; ?></textarea>
	</div>

	<button name="actualizar">
		Actualizar
	</button>
</form>
	
</div>
	
</div>
	
</div>
	
</div>

