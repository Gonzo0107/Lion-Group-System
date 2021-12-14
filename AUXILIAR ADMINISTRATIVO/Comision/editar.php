<?php 

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	

	if (!isset($_GET['id'])) {
		header('location:index.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/comision/vistas/pagina_superior.php';  
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM comision WHERE id_comision=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
	
 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Comision</h1>
<h5 class="text-secondary mt-2">Editar Comision</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">


			<h4>Nuevos datos de comision</h4>
			<form method="POST" action="editarProceso.php">
		
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Id comision</label>
					<input class="form-control" type="text" name="id_comision2" value="<?php echo $resultado->id_comision; ?>" required>
				</div>

				<div class="row">
				<div class="form-group col-md-6">
					<label class="col-sm-6 col-form-label" >Tipo de novedad</label>
				
						<?php 
							include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Tipo salud: $resultado->nombre_salud"; 
						?>
				</div>
				<div class="form-group col-md-6">
						<?php 
							include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Tipo pension: $resultado->nombre_pension"; 
						?>
					
						</div>
					</div> 
					<div class="row">  
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label" >Nueva novedad</label>		
				
					<select class="form-control" name="id_salud2" required>
					<option value="">Tipo de salud</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_salud");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_salud.">".$dato->nombre_salud."</option>";
                     	} ?> 	 
					</select>
				</div>
					
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >&nbsp</label>
					<select class="form-control" name="id_pension2" required>
					<option value="">Tipo de pension</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_pension");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_pension.">".$dato->nombre_pension."</option>";
                     	} ?> 	 
					</select>
					</div>
				</div>

				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Colaborador:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre; ?> <?php echo $resultado->apellidos ; 
						?>
			</div>

				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Nuevo colaborador</label>	
					
					<select class="form-control" name="id_colaborador2" required>
					<option value="">Nombre</option>
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

				

				<div class="row">
				 <div class="form-group col-md-4">
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Fecha de radicacion: $resultado->fecha_radicacion"; 
						?>
				</div>
				<div class="form-group col-md-2">
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Liquidacion: $resultado->liquidacion"; 
						?>
				</div>
				</div>
				<div class="row">
 				<div class="form-group col-md-4">
					<label class="col-sm-4 col-form-label" >Nueva fecha</label>
					<input class="form-control" type="date" name="fecha_radicacion2" value="<?php $resultado->fecha_radicacion; ?>" required>
				</div>
				
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label" >Nueva liquidacion</label>
					<input class="form-control" type="text" name="liquidacion2" value="<?php $resultado->liquidacion; ?>" required>
				</div>
				</div>

				<div class="row">
				<div class="form-group col-md-4">
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision INNER JOIN eps ON comision.id_eps = eps.id_eps WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "EPS: $resultado->nombre_eps"; 
						?>
				</div>	
				<div class="form-group col-md-4">	
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM comision INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario WHERE id_comision=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Numero Formulario: $resultado->id_formulario"; 
						?>
				</div>
				</div>
				
				<div class="row">
				<div class="form-group col-md-4">	
					<label class="col-sm-4 col-form-label" >Nueva EPS</label> 		
					
					<select class="form-control" name="id_eps2" required>
					<option value="">Nombre</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM eps");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_eps.">".$dato->nombre_eps."</option>";
                     	} ?> 	 
					</select>
				</div>	
				<div class="form-group col-md-4">
					<label class="col-sm-2 col-form-label" >Nuevo</label>		
					
					<select class="form-control" name="id_formulario2" required>
					<option value="">Formulario</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_formulario.">".$dato->id_formulario."</option>";
                     	} ?> 	 
					</select>
				</div>	
					</div>			

				<br>
					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="comision.php">Cancelar</a>
			
					</form>
		</div>

				<?php 
	include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/comision/vistas/pagina_inferior.php';  

 ?>