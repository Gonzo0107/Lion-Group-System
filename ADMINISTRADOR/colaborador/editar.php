<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	if (!isset($_GET['id'])) {
		header('location:index.php');
	}

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/colaborador/vistas/pagina_superior.php'; 
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM colaborador WHERE id_colaborador=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
	
 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Colaborador</h1>
<h5 class="text-secondary mt-2">Editar Colaborador</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Nuevos datos de colaborador</h4>
			<form method="POST" action="editarProceso.php">
		
			<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Id colaborador</label>
					<input class="form-control" type="text" name="id_colaborador2" value="<?php echo $resultado->id_colaborador; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Tipo de documento:</label>
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM colaborador INNER JOIN tipo_documento ON colaborador.id_tipo_documento = tipo_documento.id_tipo_documento WHERE id_colaborador=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_documento; 
						?>
					</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo tipo de documento</label>	
					
					<select class="form-control" name="id_tipo_documento2" required>
					<option value="">Tipo de documento</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_documento");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_documento.">".$dato->tipo_documento."</option>";
                     	} ?> 	 
					</select>
				</div>
				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Documento</label>
					<input class="form-control" type="text" name="documento2" value="<?php echo $resultado->documento; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nombre</label>
					<input class="form-control" type="text" name="nombre2" value="<?php echo $resultado->nombre; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Apellidos</label>
					<input class="form-control" type="text" name="apellidos2" value="<?php echo $resultado->apellidos; ?>" required>
				</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Tipo de colaborador:</label>
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM colaborador INNER JOIN tipo_colaborador ON colaborador.id_tipo_colaborador = tipo_colaborador.id_tipo_colaborador WHERE id_colaborador=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_colaborador; 
						?>
			
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo tipo de colaborador</label>	
					
					<select class="form-control" name="id_tipo_colaborador2" required>
					<option value="">Tipo de colaborador</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM tipo_colaborador");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_colaborador.">".$dato->tipo_colaborador."</option>";
                     	} ?> 	 
					</select>
				</div>
				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Telefono</label>
					<input class="form-control" type="text" name="telefono2" value="<?php echo $resultado->telefono; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Correo</label>
					<input class="form-control" type="text" name="correo2" value="<?php echo $resultado->correo; ?>" required>
				</div>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Estado:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM colaborador INNER JOIN estado ON colaborador.id_estado = estado.id_estado WHERE id_colaborador=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_estado; 
						?>
			</div>
			<div class="row">
			<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo estado</label>		
					
					<select class="form-control" name="id_estado2" required>
					<option value="">Estado</option>
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM estado");
							$sentencia->execute([$id]);
							$datos = $sentencia->fetchAll(PDO::FETCH_OBJ);

						 	foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_estado.">".$dato->tipo_estado."</option>";
                     	} ?> 	 
					</select>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Usuario</label>
					<input class="form-control" type="text" name="usuario2" value="<?php echo $resultado->usuario; ?>" required>
				</div>
				</div>

				<br>

					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="colaborador.php">Cancelar</a>
				

		
			</form>



				<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/colaborador/vistas/pagina_inferior.php';

 ?>