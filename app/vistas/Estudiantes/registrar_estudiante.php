<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/registrar_estudiante" method="POST">    
<h4 class="text-center pt-5">Registro de estudiante</h4>
  <div class="container">

    <div class="row">
      <div class="col-2 offset-2 mt-4">
        <div class="form-group">
          <select class="form-control" id="nacionalidad_e" name="nacionalidad_e">
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
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
      <div class="col-2 offset-2">
        <div class="form-group">
          <select class="form-control" id="sexo" name="sexo">
            <option value="H">Hombre</option>
            <option value="M">Mujer</option>
          </select>
        </div>          
      </div>
      <div class="col-3">        
        <input type="text" class="form-control" name="pnom" id="pnom" placeholder="Primer nombre">
        <input type="text" class="form-control" name="pape" id="pape" placeholder="Primer apellido">
      </div>
      <div class="col-3">
        <input type="text" class="form-control" name="segnom" id="segnom" placeholder="Segundo nombre">
        <input type="text" class="form-control" name="segape" id="segape" placeholder="Segundo apellido">
      </div>
    </div>   

    <div class="row">
      <div class="col-2 mt-4 offset-2">        
        <select class="form-control" id="tipo_est" name="tipo_est">
          <option>Tipo de estudiante</option>
          <option value="Nuevo ingreso" >Nuevo ingreso</option>
          <option value="Regular" >Regular</option>
        </select>

        <select class="form-control mt-4" id="tipo_est" name="pariente_representate">
          <option>Parentesco del representante</option>
          <option value="Padre" >Padre</option>
          <option value="Madre" >Madre</option>
          <option value="Tio(a)" >Tio(a)</option>
          <option value="Hermano(a)" >Hermano(a)</option>
          <option value="Primo(a)" >Primo(a)</option>
          <option value="Abuelo(a)" >Abuelo(a)</option>
        </select>
      </div>
      
      <div class="col-3">          
        <label for="exampleInputEmail1">Nacimiento </label>
        <input type="text" class="form-control" name="lugar_n" id="lugar_n" placeholder="Lugar de nacimiento">
        <input type="date" class="form-control" name="fecha_n" id="fecha_n" placeholder="Fecha de nacimiento">
      </div>

      <div class="col-3">          
        <label for="exampleInputEmail1">Datos medicos </label>
        <input type="text" class="form-control" name="condicion_s" id="condicion_s" placeholder="Condicion medica">
        <input type="text" class="form-control" name="obervacion_s" id="obervacion_s" placeholder="Descripcion">
      </div>
    </div>

    <div class="row">
      <div class="col-2 offset-5">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>

<?php
  if($datos['mensaje'] !== '' && $datos['mensaje'] !== "1") {
    $resultado_ci = strpos($datos['mensaje'], $datos['ci_escolar']);
    ?> 
      <div class="row justify-content-center mt-5">

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php 
            if($resultado_ci !== false) echo("Cedula escolcar registrada, intenta con otra cedula");
          ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

      </div>
    <?php
  }

?>

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>