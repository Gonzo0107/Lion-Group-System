<?php 
session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){

	if (!isset($_GET['id'])) {
		header('location:index.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM eps WHERE id_eps=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	
	}else{
		echo 'error en el sistema';
	}
	
 ?>

 		<center>
			<h3>editar EPS</h3>
			<form method="POST" action="editarProceso.php">
			<table>
				<tr>
					<td>id eps</td>
					<td><input type="text" name="id_eps2" value="<?php echo $resultado->id_eps; ?>" required></td>
				</tr>
				<tr>
					<td>nombre eps</td>
					<td><input type="text" name="nombre_eps2" value="<?php echo $resultado->nombre_eps; ?>" required></td>
				</tr>
				<tr>
					<td>numero nit</td>
					<td><input type="text" name="numero_nit2" value="<?php echo $resultado->numero_nit; ?>" required></td>
				</tr>
				<tr>
					<td>telefono</td>
					<td><input type="text" name="telefono2" value="<?php echo $resultado->telefono; ?>" required></td>
				</tr>
				<tr>
					<td>direccion</td>
					<td><input type="text" name="direccion2" value="<?php echo $resultado->direccion; ?>" required></td>
				</tr>
				<tr>
					<td>estado: </td>
					<td><?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado WHERE id_eps=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_estado; 
						?>
					</td>
				</tr>
				<tr>
					<td>nuevo estado</td>		
					<td>
					<select name="id_estado2" required>
					<option value="">Tipo de salud</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM estado");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_estado.">".$dato->tipo_estado."</option>";
                     	} ?> 	 
					<td></select>
				</tr>

				<tr>
					<input type="hidden" name="oculto">
					<td colspan="2"><input type="submit" name="editar"></td>
				</tr>


			</table>
				
			</form>
		</center>