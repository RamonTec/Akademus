<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/registrar_estudiante" method="POST">    
<h4 class="text-center pt-5">Registro de estudiante.</h4>
  <div class="container">
    <div class="row">
      <div class="col-2 offset-2">
        <span>Identidades.</span>
        <div class="form-group">
          <select class="form-control" id="nacionalidad_e" name="nacionalidad_e">
            <option>...</option>
            <option value="V">V</option>
            <option value="E">E</option>
          </select>
        </div>          
      </div>
      <div class="col-3 mt-4">
        <input type="text" class="form-control" name="ci_est" id="ci_est" placeholder="Cedula estudiante">
      </div>   
      <div class="col-3 mt-4">
        <input type="text" class="form-control" name="ci_escolar" id="ci_escolar" placeholder="Cedula escolar">
      </div>        
    </div>      
    <div class="row">
      <div class="col-1 offset-2">
        <span>Datos.</span>
        <div class="form-group">
          <select class="form-control" id="sexo" name="sexo">
            <option>...</option>
            <option value="M">M</option>
            <option value="F">F</option>
          </select>
        </div>          
      </div>
      <div class="col-3 mt-4">        
        <input type="text" class="form-control" name="pnom" id="pnom" placeholder="Primer nombre">
        <input type="text" class="form-control" name="pape" id="pape" placeholder="Primer apellido">
      </div>
      <div class="col-3 mt-4">
        <input type="text" class="form-control" name="segnom" id="segnom" placeholder="Segundo nombre">
        <input type="text" class="form-control" name="segape" id="segape" placeholder="Segundo apellido">
      </div>
    </div>    
    <div class="row">
      <div class="col-3 offset-3">          
        <input type="text" class="form-control" name="lugar_n" id="lugar_n" placeholder="Lugar de nacimiento">
      </div>
      <div class="col-3">
        <input type="date" class="form-control" name="fecha_n" id="fecha_n" placeholder="Fecha de nacimiento">
      </div>
    </div>
    <div class="row">
      <div class="col-3 offset-3">        
        <input type="text" class="form-control" name="n_casa" id="n_casa" placeholder="Numero de casa">
        <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle">
      </div>
      <div class="col-3">        
        <input type="text" class="form-control" name="pto_ref" id="pto_ref" placeholder="Punto de referencia">
        <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector">
      </div>        
    </div>
    <div class="row">
      <div class="col-2 offset-3">
        <select class="form-control" id="nom_pais" name="nom_pais">
          <option>Pais</option>
          <option>Venezuela</option>
        </select>          
      </div>
      <div class="col-2">
        <select class="form-control" id="nom_estado" name="nom_estado">
          <option>Estado</option>
          <option>Anzoategui</option>
        </select>
      </div>
      <div class="col-2">
        <select class="form-control" id="nombre_muni" name="nombre_muni">
          <option>Municipio</option>
          <option>Simon Rodriguez</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-2 offset-3 mt-4">        
        <select class="form-control" id="tipo_est" name="tipo_est">
          <option>Tipo de estudiante</option>
          <option value="Nuevo ingreso" >Nuevo ingreso</option>
          <option value="Repitiente" >Repitiente</option>
          <option value="Regular" >Regular</option>
        </select>
      </div>
    </div>
    <div class="col-3">        
        <input type="text" class="form-control" name="usuario" value="<?php echo($_SESSION['id_usuario']) ?>">
      </div> 
    <div class="row">
      <div class="col-2 offset-5">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>
<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>