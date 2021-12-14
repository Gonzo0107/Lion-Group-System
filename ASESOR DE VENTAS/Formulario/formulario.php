<?php 

session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){	
	
	$nombre1 = $_SESSION['nombre1'];
	include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_superior.php'; 
	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM formulario INNER JOIN tipo_salud ON formulario.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON formulario.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON formulario.id_colaborador = colaborador.id_colaborador INNER JOIN tipo_documento ON formulario.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN eps ON formulario.id_eps = eps.id_eps WHERE usuario = '$nombre1' ");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>

<div class=" px-5" style="width: 1600px;">
 <div class="row pt-5">
 <div class="form-group col-md-2">
<h1>Novedades</h1>
</div>
<div class="form-group pt-2 col-md-2">
<a href="formularioinsertar.php" class="btn btn-success ">Insertar Novedad</a>
</div>
</div>
<br>

<div class="px-4 py-4 border border-secondary shadow  bg-white rounded pb-5" >
	<h4>Ver Novedades</h4>
<br>


<div class="border border-secondary shadow px-4 bg-white rounded " >
<table class="table">
	


		
		<tr>
			<th>Id formulario</th>
			<th>Nombre de salud</th>
			<th>Nombre de pension</th>
			<th>Nombre colaborador</th>
			<th>Tipo de documento</th>
			<th>Numero de documento</th>
			<th>Nombres cotizante</th>
			<th>Apellidos cotizante</th>
			<th>Nombre razon social</th>
			<th>Numero de nit</th>
			<th>Fecha de radicacion</th>
			<th>Nombre de EPS</th>
			<th>Editar</th>
			<th>Eliminar</th>
	
		</tr>

		<?php 
			include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
			$sentencia = $bd->query("SELECT * FROM formulario INNER JOIN tipo_salud ON formulario.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON formulario.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON formulario.id_colaborador = colaborador.id_colaborador INNER JOIN tipo_documento ON formulario.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN eps ON formulario.id_eps = eps.id_eps WHERE usuario = '$nombre1'");
			$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);
			foreach ($datos as $dato) {
				?>
					<tr>
						<td><?php echo $dato->id_formulario; ?></td>
						<td><?php echo $dato->nombre_salud; ?></td>
						<td><?php echo $dato->nombre_pension; ?></td>
						<td><?php echo $dato->nombre; ?> <?php echo $dato->apellidos; ?></td>
						<td><?php echo $dato->tipo_documento; ?></td>
						<td><?php echo $dato->numero_documento; ?></td>
						<td><?php echo $dato->nombre_cotizante; ?></td>
						<td><?php echo $dato->apellidos_cotizante; ?></td>
						<td><?php echo $dato->nombre_razon; ?></td>
						<td><?php echo $dato->numero_nit_form; ?></td>
						<td><?php echo $dato->fecha_radicacion; ?></td>
						<td><?php echo $dato->nombre_eps; ?></td>
						<td><a type="submit" class="btn btn-primary" href="editar.php?id=<?php echo $dato->id_formulario; ?>" >Editar</td>
						<td><a type="submit" class="btn btn-danger"  href="eliminar.php?id=<?php echo $dato->id_formulario; ?>">Eliminar</td>
						
					</tr>
				<?php
			}

		 ?>

		
	</table>
	</div>	
</div>
	
	</div>
	




<?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_inferior.php';

 ?>
			
