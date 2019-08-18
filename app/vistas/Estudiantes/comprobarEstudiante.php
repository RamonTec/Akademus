<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>
<!------------------------Formulario----------------------------------------->
<br>
<br>
<br>
<div class="container">
  <form class="form-inline" action="<?php echo RUTA_URL; ?>/Estudiantes/index" method="POST">
    <div class="form-group mb-2">
      <label for="ci" class="sr-only">Cedula de identidad</label>
      <input type="text" readonly class="form-control-plaintext" name="ci" value="">
    </div>
    <div class="form-group mx-sm-3 mb-2">
      <label for="ci" class="sr-only">Cedula</label>
      <input type="text" class="form-control" name="ci" id="inputPassword2" placeholder="Cedula">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Confirmar cedula</button>
  </form>
</div>
<!---Footer---------------------------------------------->
<?php require_once RUTA_APP . '/vistas/inc/footer.php'; ?>
