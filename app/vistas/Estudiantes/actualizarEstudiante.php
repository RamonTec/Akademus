<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/modificar_estudiante" method="POST">    
<h4 class="text-center pt-5">Modificacion de estudiante</h4>
<h6 class="text-center">Los campos con * son obligatorios</h6>

  <div class="container">
<?php print_r($datos); ?>
    <div class="row">
      <div class="col-2 offset-2 mt-4">
        <div class="form-group">
          <select required class="form-control" id="nacionalidad_e" name="nacionalidad_e">
            <option disabled selected value="0">Nacionalidad *</option>
            <option <?php if($datos['estudiante'] -> nacionalidad_e == 'V') echo 'selected' ?> value="V">Venezolano</option>
            <option <?php if($datos['estudiante'] -> nacionalidad_e == 'E') echo 'selected' ?> value="E">Extranjero</option>
          </select>
        </div>          
      </div>
      <div class="col-6 mt-4">
        <input required type="text" value="<?php echo $datos['estudiante'] -> ci_escolar ?>" class="form-control" name="ci_escolar" id="ci_escolar" placeholder="Cedula escolar *">
      </div>        
    </div>

    <div class="row">
      <div class="col-2 offset-2">
        <div class="form-group">
          <select required class="form-control" id="sexo" name="sexo">
            <option selected disabled value="0">Genero *</option>
            <option <?php if($datos['estudiante'] -> sexo == 'H') echo 'selected' ?> value="H">Hombre</option>
            <option <?php if($datos['estudiante'] -> sexo == 'M') echo 'selected' ?> value="M">Mujer</option>
            <option <?php if($datos['estudiante'] -> sexo == 'O') echo 'selected' ?> value="O">Otro</option>
          </select>
        </div>          
      </div>
      <div class="col-3">        
        <input value="<?php echo $datos['estudiante'] -> pnom ?>" required type="text" class="form-control" name="pnom" id="pnom" placeholder="Primer nombre *">
        <input value="<?php echo $datos['estudiante'] -> pape ?>" required type="text" class="form-control" name="pape" id="pape" placeholder="Primer apellido *">
      </div>
      <div class="col-3">
        <input value="<?php echo $datos['estudiante'] -> segnom ?>" required type="text" class="form-control" name="segnom" id="segnom" placeholder="Segundo nombre *">
        <input value="<?php echo $datos['estudiante'] -> segape ?>" required type="text" class="form-control" name="segape" id="segape" placeholder="Segundo apellido">
      </div>
    </div>   

    <div class="row">
      <div class="col-2 mt-4 offset-2">
           
        <select required class="form-control" id="tipo_est" name="tipo_est">
          <option disabled selected >Tipo de estudiante *</option>
          <option <?php if($datos['estudiante'] -> tipo_est == 'Nuevo ingreso') echo 'selected' ?> value="Nuevo ingreso" >Nuevo ingreso</option>
          <option <?php if($datos['estudiante'] -> tipo_est == 'Regular') echo 'selected' ?> value="Regular" >Regular</option>
        </select>

        <select required class="form-control mt-4" id="pariente_representate" name="pariente_representate">
          <option selected disabled>Parentesco del representante *</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Padre') echo 'selected' ?> value="Padre" >Padre</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Madre') echo 'selected' ?> value="Madre" >Madre</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Tio(a)') echo 'selected' ?> value="Tio(a)" >Tio(a)</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Hermano(a)') echo 'selected' ?> value="Hermano(a)" >Hermano(a)</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Primo(a)') echo 'selected' ?> value="Primo(a)" >Primo(a)</option>
          <option <?php if($datos['estudiante'] -> pariente_representate == 'Abuelo(a)') echo 'selected' ?> value="Abuelo(a)" >Abuelo(a)</option>
        </select>
      </div>
      
      <div class="col-3">          
        <label for="exampleInputEmail1">Nacimiento *</label>
        <input value="<?php echo $datos['estudiante'] -> lugar_n ?>" required type="text" class="form-control" name="lugar_n" id="lugar_n" placeholder="Lugar de nacimiento *">
        <input value="<?php echo $datos['estudiante'] -> fecha_n ?>" required type="date" class="form-control" name="fecha_n" id="fecha_n" placeholder="Fecha de nacimiento *">
      </div>

      <div class="col-3">          
        <label for="exampleInputEmail1">Datos medicos *</label>
        <input value="<?php echo $datos['estudiante'] -> condicion_s ?>" required type="text" class="form-control" name="condicion_s" id="condicion_s" placeholder="Condicion medica *">
        <input value="<?php echo $datos['estudiante'] -> obervacion_s ?>" required type="text" class="form-control" name="obervacion_s" id="obervacion_s" placeholder="Descripcion *">
      </div>
    </div>

    <div class="row">
      <div class="col-2 offset-5">
        <button type="submit" class="btn btn-success ml-5">Modificar</button>
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