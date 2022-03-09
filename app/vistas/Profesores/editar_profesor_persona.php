<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Profesores/editar_profesor_persona/<?php echo $datos['id_per'] ?>" method="POST">
<h4 class="text-center pt-5">Editar de profesor</h4>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4 mt-4">
        <div class="form-group">
          <input class="form-control" value="<?php if($datos['ci']) echo $datos['ci']  ?>" type="text" name="ci" id="ci" placeholder="Cedula de identidad">
        </div>
      </div>

      <div class="col-2 mt-4">
        <div class="form-group">          
          <select class="form-control" id="nacionalidad" name="nacionalidad">
            <option>...</option>
            <option <?php if($datos['nacionalidad'] == 'V') echo 'selected' ?> value="V">Venezolano</option>
            <option <?php if($datos['nacionalidad'] == 'E') echo 'selected' ?> value="E">Extranjero</option>
          </select>
        </div> 
      </div>
      <div class="col-2 mt-4">
        <div class="form-group">          
          <select class="form-control" id="sexo_p" name="sexo_p">
            <option>...</option>
            <option <?php if($datos['sexo_p'] == 'M') echo 'selected' ?> value="M">Hombre</option>
            <option <?php if($datos['sexo_p'] == 'F') echo 'selected' ?> value="F">Mujer</option>
            <option <?php if($datos['sexo_p'] == 'O') echo 'selected' ?> value="O">Otros</option>
          </select>
        </div> 
      </div> 
    </div>    
    <div class="row justify-content-center">
      <div class="col-4 mt-4">        
        <input class="form-control" type="text" value="<?php if($datos['pnombre']) echo $datos['pnombre']  ?>" name="pnombre" id="pnombre" placeholder="Primer nombre">
        <input class="form-control" type="text" value="<?php if($datos['papellido']) echo $datos['papellido']  ?>" name="papellido" id="papellido" placeholder="Primer apellido">        
      </div>
      <div class="col-4 mt-4">
        <input class="form-control" type="text" value="<?php if($datos['segnombre']) echo $datos['segnombre']  ?>" name="segnombre" id="segnombre" placeholder="Segundo nombre">
        <input class="form-control" type="text" value="<?php if($datos['segapellido']) echo $datos['segapellido']  ?>" name="segapellido" id="segapellido" placeholder="Segundo apellido">        
      </div>
    </div>
    <div class="row justify-content-center">  
      <div class="col-4 mt-4">
        <input type="text" value="<?php if($datos['tipo_prof']) echo $datos['tipo_prof']  ?>" class="form-control" name="tipo_prof" id="tipo_prof" placeholder="Tipo de profesor">
      </div>
      <div class="col-4 mt-4">
        <input type="text" value="<?php if($datos['cod_prof']) echo $datos['cod_prof']  ?>" class="form-control" name="cod_prof" id="cod_prof" placeholder="Codigo de profesor">
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-2 mt-4">
        <button type="submit" class="btn btn-primary ml-5">Editar</button>
      </div>
    </div>
    
  </div>
</form>

<?php
  if($datos['mensaje'] != '') {
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