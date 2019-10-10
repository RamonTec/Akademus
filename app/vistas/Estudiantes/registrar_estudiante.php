<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<h4 class="text-center pt-5">Registro de estudiante</h4>
  <form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/registrar_estudiante" method="POST"s>
    Datos de la tabla estudiante
    
    <div class="row">
      <div class="col-md-2">      
        <input class="form-group" type="text" name="ci_est" id="ci_est" placeholder="Cedula de estudiante">    
        <input class="form-group" type="text" name="ci_escolar" id="ci_escolar" placeholder="Cedula escolar">    
        <input class="form-group" type="text" name="pasaporte" id="pasporte" placeholder="Pasaporte">    
        <input class="form-group" type="text" name="ci_diplomatica" id="ci_diplomatica" placeholder="Cedula diplomatica">    
        <input class="form-group" type="text" name="tipo_est" id="tipo_est" placeholder="Tipo de estudiante">    
        <input class="form-group" type="text" name="fecha_n" id="fecha_n" placeholder="Fecha de nacimiento">    
        <input class="form-group" type="text" name="lugar_n" id="lugar_n" placeholder="Lugar de nacimiento">
        <input class="form-group" type="text" name="nacionalidad_e" id="nacionalidad_e" placeholder="Nacionalidad">
        <input class="form-group" type="text" name="sexo" id="sexo" placeholder="Sexo">    
        <input class="form-group" type="text" name="pnom" id="pnom" placeholder="Primer nombre">    
        <input class="form-group" type="text" name="segnom" id="segnom" placeholder="Segundo nombre">    
        <input class="form-group" type="text" name="otrosnom" id="otrosnom" placeholder="Otros nombres">    
        <input class="form-group" type="text" name="pape" id="pape" placeholder="Primer apellido">    
        <input class="form-group" type="text" name="segape" id="segape" placeholder="Segundo apellido">
        <input class="form-group" type="text" name="otrosape" id="otrosape" placeholder="Otros apellidos">      
      </div>
      
      <div class="col-md-2">      
        <input class="form-group" type="text" name="posee_b" id="posee_b" placeholder="Posee beca">    
        <input class="form-group" type="text" name="tipo_beca" id="tipo_beca" placeholder="Tipo de beca">    
        <input class="form-group" type="text" name="descripcion" id="descripcion" placeholder="Dscripcion">            
      </div>
      
      <div class="col-md-2">      
        <input class="form-group" type="text" name="n_casa" id="n_casa" placeholder="Numero de casa">    
        <input class="form-group" type="text" name="pto_ref" id="pto_ref" placeholder="Punto de referencia">    
        <input class="form-group" type="text" name="calle" id="calle" placeholder="Calle">            
        <input class="form-group" type="text" name="sector" id="sector" placeholder="Sector">        
        <input class="form-group" type="text" name="nom_pais" id="nom_pais" placeholder="Pais">        
        <input class="form-group" type="text" name="nom_estado" id="nom_estado" placeholder="Estado">        
        <input class="form-group" type="text" name="nombre_muni" id="nombre_muni" placeholder="Municipio">                
      </div>

      <div class="col-md-2">
        <input class="form-group" type="text" name="posee_can" id="posee_can" placeholder="Posee canaima">
        <input class="form-group" type="text" name="modelo" id="modelo" placeholder="Modelo">
        <input class="form-group" type="text" name="codigo" id="codigo" placeholder="Codigo">
        <input class="form-group" type="text" name="serial_can" id="serial_can" placeholder="Serial">
        <input class="form-group" type="text" name="condicion" id="condicion" placeholder="Condicion">
      </div>

      <div class="col-md-2">
        <input class="form-group" type="text" name="nom_pro" id="nom_pro" placeholder="Institucion de procedencia">
        <input class="form-group" type="text" name="cod_dea" id="cod_dea" placeholder="Codigo DEA">
      </div>

      <div class="col-md-2">
        <input class="form-group" type="text" name="nom_pro" id="nom_pro" placeholder="Institucion de procedencia">
        <input class="form-group" type="text" name="nom_pro" id="nom_pro" placeholder="Institucion de procedencia">
        <input class="form-group" type="text" name="nom_pro" id="nom_pro" placeholder="Institucion de procedencia">
      </div>

    </div>
    

  <button type="submit" class="btn btn-primary">Registrar</button>

</form>




<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>


