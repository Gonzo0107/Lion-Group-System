<?php 

session_start();
	if (!isset($_SESSION['nombre2'])) {
		header('location: http://localhost/lion_group_system/login/login.php');
	}elseif(isset($_SESSION['nombre2'])){	
	
    include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/comision/vistas/pagina_superior.php';  
	include 'C:/xampp/htdocs/lion_group_system/conexion/conexion.php';
	$sentencia = $bd->query("SELECT * FROM comision INNER JOIN tipo_salud ON comision.id_salud = tipo_salud.id_salud INNER JOIN tipo_pension ON comision.id_pension = tipo_pension.id_pension INNER JOIN colaborador ON comision.id_colaborador = colaborador.id_colaborador INNER JOIN eps ON comision.id_eps = eps.id_eps INNER JOIN formulario ON comision.id_formulario = formulario.id_formulario " );
	$datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

	}else{
		echo 'error en el sistema';
	}
 ?><!-- inicio insert -->




 <div class="container px-4">
 <h1 class="mt-4 ">Comision</h1>
 <h5 class="text-secondary mt-2">Insertar comision</h5>
 

<div class="container px-4 border border-secondary shadow p-3 mb-5 bg-white rounded">
 

 <h4>Ingresa los datos de la nueva comision</h4>
 <form method="POST" action="insertar.php">

 <div class="row">
     <div class="">

         <label class="col-sm-6 col-form-label">Id comision*</label>
         <input class="form-control" type="text" name="id_comision" required>
     </div>
 </div>
 <div class="">
     <div class="">
     <label class="col-sm-6 col-form-label" >Tipo de novedad</label>
         <select class="form-control" name="id_salud" required>
             <option value="">Tipo de salud</option>
             <?php 
             $sentencia = $bd->query("SELECT * FROM tipo_salud");
             $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

             foreach ($datos as $dato) {
                 echo "<option value=".$dato->id_salud.">".$dato->nombre_salud."</option>";
             } ?>
      </select>
     </div>
     <br>
         <div class="">
         <select class="form-control" name="id_pension" required>
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
         <div class="form-group col-md-6">
         <label class="col-sm-4 col-form-label" >Colaborador</label>
         <select class="form-control" name="id_colaborador" required>
             <option value="">Colaborador</option>
             <?php 
             $sentencia = $bd->query("SELECT * FROM colaborador");
             $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

             foreach ($datos as $dato) {
                 echo "<option value=".$dato->id_colaborador.">".$dato->nombre." ".$dato->apellidos."</option>";
             } ?>
      </select>
         </div>
         <div class="form-group col-md-6">
             <label class="col-sm-4 col-form-label" >Fecha de radicacion</label>
             <input class="form-control" type="date" name="fecha_radicacion" required>
         </div>
     </div>

     <div class="row">
     <div class="form-group col-md-4">					
             <label class="col-sm-2 col-form-label" >Liquidacion</label>
             <input class="form-control" type="text" name="liquidacion" required>
         </div>
     <div class="form-group col-md-6">	
         <label class="col-sm-2 col-form-label" >Nombre EPS</label>
         <select class="form-control" name="id_eps" required>
             <option value="">Vacio</option>
             <?php 
             $sentencia = $bd->query("SELECT * FROM eps");
             $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

             foreach ($datos as $dato) {
                 echo "<option value=".$dato->id_eps.">".$dato->nombre_eps."</option>";
             } ?>
      </select>
     </div>

     <div class="form-group col-md-2">	
         
      <label class="col-sm-2 col-form-label" >Formulario</label>
         <select class="form-control" name="id_formulario" required>
             <option value="">Vacio</option>
             <?php 
             $sentencia = $bd->query("SELECT * FROM formulario");
             $datos = $sentencia->fetchALL(PDO::FETCH_OBJ);

             foreach ($datos as $dato) {
                 echo "<option value=".$dato->id_formulario.">".$dato->id_formulario."</option>";
             } ?>
      </select>
     </div>
     </div>

     
     <br>		
     <input type="hidden" name="oculto" value="1">
     <a type="submit" class="btn btn-danger" href="comision.php">Cancelar</a>
     <input class="btn btn-primary" type="submit" value="Aceptar">
     <input class="btn btn-outline-secondary" type="reset" name="">
     
 

 

 </form>
</div>
</div>


 <!-- fin insert -->

 <?php 

    include 'C:/xampp/htdocs/lion_group_system/AUXILIAR ADMINISTRATIVO/comision/vistas/pagina_inferior.php';  

 ?>