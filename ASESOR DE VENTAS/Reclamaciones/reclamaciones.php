<?php 

session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){	
		
		$nombre1 = $_SESSION['nombre1'];
include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_superior.php'; 
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador WHERE usuario = '$nombre1' ");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>

<div class="container px-4">
 <div class="row pt-5">
 <div class="form-group col-md-4">
<h1>Reclamaciones</h1>
</div>
<div class="form-group pt-2 col-md-3">
<a href="reclamacionesinsertar.php" class="btn btn-success ">Insertar Reclamacion</a>
</div>
</div>

<br>

<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
	<h4>Ver Reclamacion</h4>

					 <br>


<div class="border border-secondary shadow px-4 bg-white rounded " >
			 
			<table class="table">

	


	
		<tr>
			<th>Id reclamaciones</th>
			<th>Fecha de reclamacion</th>
			<th>Descripcion</th>
			<th>Colaborador</th>
			<th>Editar</th>
			<th>Eliminar</th>
			
		</tr>

		<?php 
		include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
		$sentencia = $bd->query("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador WHERE usuario = '$nombre1'");
		$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

			foreach ($datos as $dato) {
				?>
					<tr>
						<td><?php echo $dato->id_reclamaciones; ?></td>
						<td><?php echo $dato->fecha_reclamacion; ?></td>
						<td><?php echo $dato->Descripcion; ?></td>
						<td><?php echo $dato->nombre; ?> <?php echo $dato->apellidos; ?></td>
						<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_reclamaciones; ?>" >Editar</td>
						<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_reclamaciones; ?>">Eliminar</td>
						
					</tr>
				<?php
			}

		 ?>

		
	</table>
	
	</div>	

</div>
<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>