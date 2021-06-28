<?php include("conexion.php") ?>

<div id="contenedor">
<img class="imagen" src="Logo.png">
	<h1>EXPEDIENTE</h1>
<link rel="stylesheet" href="estilos_ini_ses.css">
	<div >
		<div >


		<?php if (isset($_SESSION['message'])) { 

		echo $_SESSION['message'];

		}
		?>

		<?php session_unset(); ?>


			<div >
				<form action="guardar_t.php" method="POST">

					<div >
						<input type="text" name="id_exp"  placeholder="ID expediente" autofocus>
					</div>
					<div >
						<input type="date" name="fecha_exp"  placeholder="Fecha expediente" autofocus>
					</div>
 					<div >
						<input type="text" name="id_inf"  placeholder="ID inf" autofocus>
					</div>
					<div >
						<textarea name="descripcion" rows="2" placeholder="descripcion"></textarea>
					</div>

					<div >
						<textarea name="observacion" rows="2" placeholder="observacion"></textarea>
					</div>
				
					<input id="boton" type="submit"  name="guardar_t" value="guardar">
				</form>
			</div>

		</div>

			<div >
				<table >
					<thead>
						<tr>
							<th>ID expediente</th>
							<th>Fecha expediente</th>
							<th>ID informe</th>
							<th>descripcion</th>
							<th>observacion</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					
						<?php 

						$query = "SELECT * FROM expediente";
						$result_tasks = mysqli_query($conex, $query);

						while($row = mysqli_fetch_array($result_tasks)) { ?>
							
						<tr>
							<td><?php echo $row['id_exp'] ?></td>
							<td><?php echo $row['fecha_exp'] ?></td>
							<td><?php echo $row['id_inf'] ?></td>
							<td><?php echo $row['descripcion'] ?></td>
							<td><?php echo $row['observacion'] ?></td>
							<td>
								<a href="actualizar_t.php?id_exp=<?php echo $row['id_exp']?>" >
									Editar
								</a>
								<a  href="borrar_t.php?id_exp=<?php echo $row['id_exp']?>" >
									Eliminar
								</a>
							</td>
						</tr>



						<?php } ?>
					</tbody>
				</table>
			

		</div>
	</div>
</div>





