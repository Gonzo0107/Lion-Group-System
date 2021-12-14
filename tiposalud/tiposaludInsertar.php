<?php 


session_start();
	if (!isset($_SESSION['nombre'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre'])){		


    include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_superior.php';   
include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';

	$sentencia = $bd->query("SELECT * FROM tipo_salud");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}


 ?>
<!-- inicio insert -->


<div class="container px-4">
			<h1 class="mt-4">Tipo de salud</h1>
			<h5 class="text-secondary mt-2">Registrar un tipo de salud</h5>


			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
			<h4>Ingresa el nuevo estado de salud</h4>
			<form method="POST" action="insertar.php">


			<div class="row">
				<div class="form-group col-md-6">
					<label class="col-sm-6 col-form-label" >Id salud*</label>
					<input class="form-control" type="text" name="id_salud" placeholder="ID Salud" required>
				</div>
				<div class="form-group col-md-6">
				<label class="col-sm-6 col-form-label" >Nombre de salud*</label>
				<input class="form-control" type="text" name="nombre_salud" placeholder="Tipo de Salud" required>
				</div>
			</div>
				<div>
					<div>
					<label class="col-sm-2 col-form-label" >Descripcion*</label>
					<input class="form-control" type="text" name="descrpcion" placeholder="Descripcion" required>
					</div>
				</div>
					
				
					<br>
				<input type="hidden" name="oculto" value="1">
				
                <a type="submit" class="btn btn-danger" href="tiposalud.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
			

			
				
			</form>
			</div>

		</div>



			<!-- fin insert -->







<?php 

include 'C:/xampp/htdocs/lion_group_system/ADMINISTRADOR/eps/vistas/pagina_inferior.php';

 ?>