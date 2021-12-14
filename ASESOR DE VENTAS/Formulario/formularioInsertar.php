<?php 

session_start();
	if (!isset($_SESSION['nombre1'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre1'])){	
	

	include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/formulario/vistas/pagina_superior.php';	
	include 'C:\xampp\htdocs\lion_group_system\conexion\conexion.php';
	$sentencia = $bd->query("SELECT * FROM formulario INNER JOIN tipo_salud ON formulario.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON formulario.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON formulario.id_colaborador = colaborador.id_colaborador INNER JOIN tipo_documento ON formulario.id_tipo_documento = tipo_documento.id_tipo_documento INNER JOIN eps ON formulario.id_eps = eps.id_eps");
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}

 ?>
	<!-- inicio insert -->

					

    <div class="container px-4">
			<h1 class="mt-4 ">Novedad</h1>			
			<h5 class="text-secondary mt-2">Insertar novedad</h5>

			<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">

			<h4>Ingresa los datos de la nueva novedad</h4>
			<form method="POST" action="insertar.php">


				<div class="">
			
				<div>
					<label class="col-sm-2 col-form-label">Id formulario*</label>
					<input class="form-control" type="text" name="id_formulario" placeholder="ID formulario" required>
				</div>
				<div>
					<label class="col-sm-2 col-form-label">Tipo de novedad*</label>
					<select class="form-control" name="id_salud" required>
						<option value="">Tipo de salud*</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_salud");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_salud.">".$dato->nombre_salud."</option>";
                        } ?>
                 </select>
				</div>
				<br>
					<div>
					<select class="form-control" name="id_pension" required>
						<option value="">Tipo de pension*</option>
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
					<label class="col-sm-6 col-form-label">Colaborador*</label>
					<select class="form-control" name="id_colaborador" required>
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
				<label class="col-sm-6 col-form-label" >Nombres cotizante*</label>
					<input class="form-control" type="text" name="nombre_cotizante" placeholder="Nombre del cotizante" required>
				</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Apellidos cotizante*</label>
					<input class="form-control" type="text" name="apellidos_cotizante" placeholder="Apellidos del cotizante" required>
				</div>
				</div>
				
				<div class="row">
					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label">Tipo Documento*</label>
					<select class="form-control" name="id_tipo_documento" required>
						<option value="">Tipo de documento</option>
                        <?php 
                        $sentencia = $bd->query("SELECT * FROM tipo_documento");
						$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

                        foreach ($datos as $dato) {
                            echo "<option value=".$dato->id_tipo_documento.">".$dato->tipo_documento."</option>";
                        } ?>
                 		</select>
					</div>
				<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Numero Documento*</label>
					<input class="form-control" type="text" name="numero_documento" placeholder="Numero de documento" required>
					</div>
					<div class="form-group col-md-4">
				<label class="col-sm-6 col-form-label" >Nombre Razon Social*</label>
					<input class="form-control" type="text" name="nombre_razon" placeholder="Nombre Razon social" required>
				</div>	
				</div>
				<div class="row">
					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label" >Numero Nit*</label>
					<input class="form-control" type="text" name="numero_nit" placeholder="Numero Nit" required>
					</div>

					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label" >Fecha de radicacion*</label>
					<input class="form-control" type="date" name="fecha_radicacion" required>
					</div>
					<div class="form-group col-md-4">
					<label class="col-sm-6 col-form-label" >Nombre EPS*</label>
					<select class="form-control" name="id_eps" required>
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
				<input type="hidden" name="oculto" value="1">
				<a type="submit" class="btn btn-danger" href="formulario.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
			

			
				
			</form>
			</div>

			</div>



			<!-- fin insert -->

            <?php 

include 'C:/xampp/htdocs/lion_group_system/ASESOR DE VENTAS/formulario/vistas/pagina_inferior.php';	

 ?>