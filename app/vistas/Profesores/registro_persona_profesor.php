<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Profesores/registro_persona_profesor" method="POST">
<h4 class="text-center pt-5">Registro de profesor.</h4>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4 mt-4">
        <div class="form-group">
          <input class="form-control" type="text" name="ci" id="ci" placeholder="Cedula de identidad">
        </div>
      </div>
      <div class="col-2 mt-4">
        <div class="form-group">          
          <select class="form-control" id="nacionalidad" name="nacionalidad">
            <option>...</option>
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
          </select>
        </div> 
      </div>
      <div class="col-2 mt-4">
        <div class="form-group">          
          <select class="form-control" id="sexo_p" name="sexo_p">
            <option>...</option>
            <option value="M">Hombre</option>
            <option value="F">Mujer</option>
            <option value="F">Otros</option>
          </select>
        </div> 
      </div> 
    </div>    
    <div class="row justify-content-center">
      <div class="col-4 mt-4">        
        <input class="form-control" type="text" name="pnombre" id="pnombre" placeholder="Primer nombre">
        <input class="form-control" type="text" name="papellido" id="papellido" placeholder="Primer apellido">        
      </div>
      <div class="col-4 mt-4">
        <input class="form-control" type="text" name="segnombre" id="segnombre" placeholder="Segundo nombre">
        <input class="form-control" type="text" name="segapellido" id="segapellido" placeholder="Segundo apellido">        
      </div>
    </div>
    <div class="row justify-content-center">  
      <div class="col-4 mt-4">
        <input type="text" class="form-control" name="tipo_prof" id="tipo_prof" placeholder="Tipo de profesor">
      </div>
      <div class="col-4 mt-4">
        <input type="text" class="form-control" name="cod_prof" id="cod_prof" placeholder="Codigo de profesor">
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-2 mt-4">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>
    
  </div>
</form>

<?php
  if($datos['mensaje']) {
    $resultado_ci = strpos($datos['mensaje'], $datos['ci']);
    $resultado_cod = strpos($datos['mensaje'], $datos['cod_prof']);
    ?> 
      <div class="row justify-content-center mt-5">

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php 
            if($resultado_ci !== false) echo("Cedula registrada, intenta con otra cedula");
            if($resultado_cod !== false) echo("Codigo de profesor registrado, intenta con otro codigo");
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