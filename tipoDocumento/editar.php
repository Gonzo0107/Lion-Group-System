<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	

	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/tipodocumento/vistas/pagina_superior.php'; 
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM tipo_documento WHERE id_tipo_documento=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

		}else{
		echo 'error en el sistema';
	}

 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Tipo de documento</h1>
<h5 class="text-secondary mt-2">Editar tipo de documento</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h3>Nuevos datos de tipo de documento</h3>
			<form method="POST" action="editarProceso.php">
			
				
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Id tipo de documento</label>
					<input class="form-control" type="text" name="id_tipo_documento2" value="<?php echo $resultado->id_tipo_documento; ?>" required>
				</div>
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Tipo de documento</label>
					<input class="form-control" type="text" name="tipo_documento2" value="<?php echo $resultado->tipo_documento; ?>" required>
				</div>

				<br>

					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="tipodocumento.php">Cancelar</a>
			

			
				
			</form>
</div>
				<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/tipodocumento/vistas/pagina_inferior.php';

 ?>