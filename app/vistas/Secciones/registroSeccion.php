<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<form class="" action="<?php echo RUTA_URL; ?>/Secciones/registrarSeccion" method="POST">
  <div class="form-group col-md-6">
    <label for="nombre">Nombre de seccion</label>
    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la seccion">
  </div>
  <div class="form-group col-md-6">
    <label for="cod_seccion">Codigo seccion</label>
    <input type="text" class="form-control" id="cod_seccion" name="cod_seccion" placeholder="Codigo de seccion">
  </div>
  <button type="submit" name="button">Registrar seccion</button>
</form>




<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>
