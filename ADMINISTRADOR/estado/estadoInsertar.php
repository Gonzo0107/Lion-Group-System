<?php 

session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){	
	

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php'; 
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM estado");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);
	
	}else{
		echo 'error en el sistema';
	}

 ?>


			<!-- inicio insert -->

			<div class="container px-4">
			<h1 class="mt-4 ">Estado</h1>
			<h5 class="text-secondary mt-2">Registrar un estado</h5>
			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Ingresa un nuevo estado</h4>
			<form method="POST" action="insertar.php">
			

			<div class="row">
				
				<div class="form-group col-md-6">
					<label class="col-sm-2 col-form-label">Id estado*</label>
					<input class="form-control" type="text" name="id_estado" placeholder="ID Estado" required>
				</div>

				<div class="form-group col-md-6">
				<label class="col-sm-4 col-form-label" >Estado*</label>
				<input class="form-control" type="text" name="tipo_estado" placeholder="Tipo Estado" required>
				
				</div>
				
				</div>

				<br>
				<input type="hidden" name="oculto" value="1">
				<a type="submit" class="btn btn-danger" href="estado.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
				
			</form>
			
		</div>
	</div>



			<!-- fin insert -->


<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>