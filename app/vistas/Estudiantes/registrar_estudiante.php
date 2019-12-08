<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/registrar_estudiante" method="POST">    
<h4 class="text-center pt-5">Registro de estudiante.</h4>
  <div class="container">
    <div class="row">
      <div class="col-1 offset-2">
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
        <div class="form-group">
          <input type="text" class="form-control" id="ci_est" name="ci_est" placeholder="Cedula de identidad">
          <input type="text" class="form-control" name="ci_diplomatica" id="ci_diplomatica" placeholder="Cedula diplomatica">
        </div>
      </div>
      <div class="col-3 mt-4">
        <input type="text" class="form-control" name="ci_escolar" id="ci_escolar" placeholder="Cedula escolar">
        <input type="text" class="form-control" name="pasaporte" id="pasporte" placeholder="Pasaporte">
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
        <input type="text" class="form-control" name="otrosnom" id="otrosnom" placeholder="Otros nombres">
      </div>
      <div class="col-3 mt-4">
        <input type="text" class="form-control" name="segnom" id="segnom" placeholder="Segundo nombre">
        <input type="text" class="form-control" name="segape" id="segape" placeholder="Segundo apellido">
        <input type="text" class="form-control" name="otrosape" id="otrosape" placeholder="Otros apellidos">
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
      <div class="col-2 mt-4">
        <input type="text" class="form-control" name="nom_pro" id="nom_pro" placeholder="Institucion de procedencia">  
      </div>
      <div class="col-2 mt-4">        
        <input type="text" class="form-control" name="cod_dea" id="cod_dea" placeholder="Codigo DEA">  
      </div>
    </div>
    <div class="row">
      <div class="col-2 offset-5">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>
<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>