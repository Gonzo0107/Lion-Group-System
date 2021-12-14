<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
		
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM eps INNER JOIN estado ON eps.id_estado = estado.id_estado");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>

<!DOCTYPE html>
<html>
<head>
<td><a href="http://localhost/lion_group_system/principal/principal.php">ir a pagina principal</a></td>
	<title>EPS</title>	
</head>
<body>
	<center>
		<h3>eps</h3>
			<table>
				<tr>
					<th>id eps</th>
					<th>nombre eps</th>
					<th>numero nit</th>
					<th>telefono</th>
					<th>direccion</th>
					<th>estado</th>
					<th>editar</th>
					<th>eliminar</th>

				</tr>

				<?php 

					foreach ($datos as $dato) {
						?>
							<tr>
								<td><?php echo $dato->id_eps; ?></td>		
								<td><?php echo $dato->nombre_eps; ?></td>
								<td><?php echo $dato->numero_nit; ?></td>
								<td><?php echo $dato->telefono; ?></td>
								<td><?php echo $dato->direccion; ?></td>
								<td><?php echo $dato->tipo_estado; ?></td>
								<td><a href="editar.php?id=<?php echo $dato->id_eps; ?>">editar</a></td>
								<td><a href="eliminar.php?id=<?php echo $dato->id_eps; ?>">eliminar</a></td>

							</tr>
						<?php
					}

				 ?>

				
			</table>
			<!-- inicio insert -->
			<hr>
			<h3>ingresar eps</h3>
			<form method="POST" action="insertar.php">
			<table>
				<tr>
					<td>id eps</td>
					<td><input type="text" name="id_eps" required></td>
				</tr>
				<tr>
					<td>nombre eps</td>
					<td><input type="text" name="nombre_eps" required></td>
				</tr>
				<tr>
					<td>numero nit</td>
					<td><input type="text" name="numero_nit" required></td>
				</tr>
				<tr>
					<td>telefono</td>
					<td><input type="text" name="telefono" required></td>
				</tr>
				<tr>
					<td>direccion</td>
					<td><input type="text" name="direccion" required></td>
				</tr>
				<tr>
					<td>estado</td>
					<td><select name="id_estado" required>
						<option value="">Tipo de estado</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM estado");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_estado.">".$dato->tipo_estado."</option>";
                        } ?>
                 </select></td>
				</tr>

				<input type="hidden" name="oculto" value="1">
				<tr>
					<td><input type="reset" name=""></td>
					<td><input type="submit" value="insertar EPS"></td>
				</tr>

			</table>
				
			</form>



			<!-- fin insert -->

			
	</center>
</body>
</html>