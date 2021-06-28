<?php include("conexion.php") ?>

<h1>Expediente</h1>


<div >
	<div >
		<div >


		<?php if (isset($_SESSION['message'])) { 

		echo $_SESSION['message'];

		}
		?>

		<?php session_unset(); ?>


			<div >
				<form action="guardar_inf.php" method="POST">

					<div>
						<input type="text" name="id_inf"  placeholder="ID informe" autofocus>
					</div>

					<div >
						<textarea name="descripcion" rows="2" placeholder="descripcion"></textarea>
					</div>
				
					<input type="submit"  name="guardar_inf" value="guardar">
				</form>
			</div>

		</div>

			<div >
				<table >
					<thead>
						<tr>
							
							<th>ID informe</th>
							<th>descripcion</th>
							
						</tr>
					</thead>
					<tbody>
					
						<?php 

						$query = "SELECT * FROM informe";
						$result_tasks = mysqli_query($conex, $query);

						while($row = mysqli_fetch_array($result_tasks)) { ?>
							
						<tr>
							
							<td><?php echo $row['id_inf'] ?></td>
							<td><?php echo $row['descripcion'] ?></td>
						
							<td>
								<a href="actualizar_inf.php?id_inf=<?php echo $row['id_inf']?>" >
									Editar
								</a>
								<a href="borrar_inf.php?id_inf=<?php echo $row['id_inf']?>" >
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





