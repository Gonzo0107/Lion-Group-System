<?php 

session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){	

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_superior.php';  
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM reclamaciones WHERE id_reclamaciones=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

		}else{
		echo 'error en el sistema';
	}

 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Reclamacion</h1>
<h5 class="text-secondary mt-2">Editar Reclamacion</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">


			<h3>Nuevos datos Reclamacion</h3>
			<form method="POST" action="editarProceso.php">
			
			<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Id reclamacion</label>
					<input class="form-control" type="text" name="id_reclamaciones2" value="<?php echo $resultado->id_reclamaciones; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Fecha de reclamacion</label>
					<input class="form-control" type="date" name="fecha_reclamacion2" value="<?php echo $resultado->fecha_reclamacion; ?>" required>
				</div>
			</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Descripcion</label>
					<textarea class="form-control" name="descripcion2" placeholder="<?php echo $resultado->Descripcion; ?>" rows="5" cols="25" required></textarea>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Colaborador:</label>
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM reclamaciones INNER JOIN colaborador ON reclamaciones.id_colaborador = colaborador.id_colaborador WHERE id_reclamaciones=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre; ?> <?php echo $resultado->apellidos;
						?>
				</div>
				<div class="form-group col-md-4">	
					<label class="col-sm-6 col-form-label">Nuevo coloborador</label>
				
					<select class="form-control" name="id_colaborador2" required>
					<option value="">Colaborador</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM colaborador");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_colaborador.">".$dato->nombre." ".$dato->apellidos."</option>";
                     	} ?> 	 
					</select>
				</div>

		<br>
					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="reclamaciones.php">Cancelar</a>
		
				
			</form>
</div>
				<?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/comision/vistas/pagina_inferior.php'; 

 ?>
