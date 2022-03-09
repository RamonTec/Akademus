<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <br>
        <h2 class="text-center">Registro de seccion</h2>
      </div>
    </div>
  </div>
 
  <form action="<?php echo RUTA_URL; ?>/Secciones/registro_seccion" method="POST">
     
    <div class="row justify-content-center">  
      <div class="col-3 mt-4">        
        <input type="text" class="form-control" name="nom_sec" id="nom_sec" placeholder="Seccion">
        <input type="text" class="form-control" name="cod_sec" id="cod_sec" placeholder="Codigo de seccion">
      </div>
    </div>
  <form>

  <div class="row justify-content-center">
    <div class="col-1">
      <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
  </div>

  <?php
    if($datos) {
      ?> 
        <div class="row justify-content-center">
          <div class="col-4">
            <div class="text-center alert alert-danger mt-3" role="alert">
            <?php print_r($datos['mensaje']) ?>
          </div>
          </div>
        </div>
      <?php
    }

  ?>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
