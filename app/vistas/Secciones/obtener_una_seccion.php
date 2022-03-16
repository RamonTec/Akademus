<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-5">
  
  <h4 class="text-center pt-3 gestion-usuario">Secciones registradas</h4>
  <div class="row justify-content-center mt-3">
    <div class='col-6'>
      <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Secciones/obtener_una_seccion" method="POST">
        <select class="form-control mt-4" name="id_seccion">
          <option disabled value='0'>Selecciona</option>
          <?php foreach($datos['secciones'] as $seccion) :  ?>
            <?php  echo "<option value='". $seccion -> id_seccion . "'>" . $seccion -> cod_sec . ' ' . $seccion -> nom_sec . "</option>"; ?>
          <?php endforeach; ?>
        </select>

        <div class="row justify-content-center mt-5">
          <div class="col-md-6 text-center">
            <div class="form-group">
              <button type="submit" class="btn btn-success">Obtener seccion</button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>

<?php
    if($datos['mensaje'] != '') {
      ?> 
        <div class="row justify-content-center mt-5">

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
              if($datos['mensaje']) echo($datos["mensaje"]);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      <?php
    }

  ?>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>