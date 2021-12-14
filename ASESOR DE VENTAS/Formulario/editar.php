<?php 
session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){


	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/formulario/vistas/pagina_superior.php'; 
	$id = $_GET['id'];

	$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
	$sentencia->execute([$id]);
	$resultado = $sentencia->fetch(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
 ?>

 <div class="container px-4">
<h1 class="mt-4 ">Novedad</h1>
<h5 class="text-secondary mt-2">Editar Novedad</h5>
<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Nuevos datos de la Novedad</h4>
			<form method="POST" action="editarProceso.php">
		
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Id formulario</label>
					<input class="form-control" type="text" name="id_formulario2" value="<?php echo $resultado->id_formulario; ?>" required>
				</div>
				
				<div class="row">
				<div class="form-group col-md-6">
					<label class="col-sm-6 col-form-label">Tipo de novedad</label> 
					
						<?php 
							include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario INNER JOIN tipo_salud ON formulario.id_salud = tipo_salud.id_salud WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Tipo salud: $resultado->nombre_salud"; 
						?>
					</div>
					<div class="form-group col-md-4">
				
						<?php 
							include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario INNER JOIN tipo_pension ON formulario.id_pension = tipo_pension.id_pension WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo "Tipo pension: $resultado->nombre_pension"; 
						?>
				</div>
				</div>

				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nueva novedad</label> 
					<select class="form-control" name="id_salud2" required>
						<option value="">Tipo de salud</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_salud");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_salud.">".$dato->nombre_salud."</option>";
                        } ?>
                  
              
                 </select>
              	</div>
              	<div class="form-group col-md-4">
              	<label class="col-sm-6 col-form-label">&nbsp</label> 
				<select class="form-control" name="id_pension2" required>
						<option value="">Tipo de pension</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_pension");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_pension.">".$dato->nombre_pension."</option>";
                        } ?>
                 </select>
			
                 </div>
                 </div>
                 <div class="row">
                 <div class="form-group col-md-4">
				
					<label class="col-sm-6 col-form-label">Colaborador:</label> 
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario INNER JOIN colaborador ON formulario.id_colaborador = colaborador.id_colaborador WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre; ?> <?php echo $resultado->apellidos; 
						?>
					
				</div>

					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Tipo de documento:</label> 
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario INNER JOIN tipo_documento ON formulario.id_tipo_documento = tipo_documento.id_tipo_documento WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->tipo_documento; 
						?>
					
				</div>

				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Numero documento:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->numero_documento; 
						?>
					
				</div>
				</div>

				<div class="row">
				<div class="form-group col-md-4">

					<label class="col-sm-6 col-form-label">Nuevo Colaborador:</label> 		
					<select class="form-control" name="id_colaborador2" required>
						<option value="">Escoja al colaborador</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM colaborador");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_colaborador.">".$dato->nombre." ".$dato->apellidos."</option>";
                        } ?>
                 </select>
				</div>

			
				<div class="form-group col-md-4">

				<label class="col-sm-8 col-form-label">Nuevo tipo de documento</label> 		
					<select class="form-control" name="id_tipo_documento2" required>
						<option value="">Escoja el tipo de documento</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_documento");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_documento.">".$dato->tipo_documento."</option>";
                        } ?>
                 </select>
			
                 </div>

				
			<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo numero</label> 
					<input class="form-control" type="text" name="numero_documento2" value="<?php echo $resultado->numero_documento; ?>" required>
			</div>
			</div>	
			<div class="row">
			<div class="form-group col-md-4">
			
					<label class="col-sm-6 col-form-label">Nombre cotizante:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre_cotizante; 
						?>
				</div>	

					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Apellidos cotizante:</label>  
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->apellidos_cotizante; 
						?>
				</div>

						<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nombre razon social:</label>  
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre_razon; 	
						?>
				</div>
				</div>
				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevos nombres</label> 
					<input class="form-control" type="text" name="nombre_cotizante2" value="<?php echo $resultado->nombre_cotizante; ?>" required>
				</div>

			
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo apellidos</label> 
					<input class="form-control" type="text" name="apellidos_cotizante2" value="<?php echo $resultado->apellidos_cotizante; ?>" required>
				</div>
				

		
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">nueva razon social</label> 
					<input class="form-control" type="text" name="nombre_razon2" value="<?php echo $resultado->nombre_razon; ?>" required>
				</div>
				</div>

				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Numero nit:</label> 
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->numero_nit_form; 
						?>
					
				</div>

					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Fecha de radicacion:</label> 
					
						<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->fecha_radicacion; 
						?>
				</div>

					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">EPS:</label>  
					
					<?php 
							include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
							$id = $_GET['id'];

							$sentencia = $bd->prepare("SELECT * FROM formulario INNER JOIN eps ON formulario.id_eps = eps.id_eps WHERE id_formulario=?;");
							$sentencia->execute([$id]);
							$resultado = $sentencia->fetch(PDO::FETCH_OBJ);
							echo $resultado->nombre_eps; 
						?>
				</div>
				</div>

				<div class="row">
				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nuevo numero nit</label> 
					<input class="form-control" type="text" name="numero_nit2" value="<?php echo $resultado->numero_nit; ?>" required>
				</div>


			
				<div class="form-group col-md-4">
			
					<label class="col-sm-6 col-form-label">Nueva fecha</label> 
					<input class="form-control" type="date" name="fecha_radicacion2" value="<?php $resultado->fecha_radicacion; ?>" required>
				</div>
			

				<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Nueva EPS</label> 	
					<select class="form-control" name="id_eps2" required>
						<option value="">Escoja la EPS</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM eps");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_eps.">".$dato->nombre_eps."</option>";
                        } ?>
                 </select>
				</div>
				</div>

				<br>

					<input type="hidden" name="oculto">
					<input class="btn btn-primary" type="submit" name="editar" value="Editar"> 
					<a type="submit" class="btn btn-danger"  href="formulario.php">Cancelar</a>

	
				
			</form>
</div>


<?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/formulario/vistas/pagina_inferior.php';

 ?>




				
				