<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-5">
  
  <h4 class="text-center pt-3 gestion-usuario">Asignar seccion</h4>
  <div class="row justify-content-center mt-3">
    <div class='col-6'>
      <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Estudiantes/estudiante_seccion" method="POST">

        <select required class="form-control mt-4" name="id_seccion">
          <option disabled value='0'>Selecciona</option>
          <?php foreach($datos['secciones'] as $seccion) :  ?>
            <?php  echo "<option value='". $seccion -> id_seccion . "'>" . $seccion -> cod_sec . ' ' . $seccion -> nom_sec . "</option>"; ?>
          <?php endforeach; ?>
        </select>

        <div class="row justify-content-center mt-5">
          <div class="col-md-6 text-center">
            <div class="form-group">
              <button type="submit" class="btn boton-de-envio">Asignar seccion</button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>

</div>


<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>