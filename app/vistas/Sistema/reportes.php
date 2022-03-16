<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>        
<div class="container">
  <div class="container mt-3"><!--- Primer container ---->
    <h4 class="mt-5">Reportes disponibles</h4> 
      <div class="row mt-5 justify-content-center"><!--- Inicio del segundo row --->

        <div class="col-4 mt-3">
          <div class="text-center">
            <a target="_blank" class="btn btn-success" href="<?php echo RUTA_URL ?>/Reportes/ficha_inscripcion">Seccion</a>
          </div>
        </div>

        <div class="col-4 mt-3">
          <div class="text-center">
            <a target="_blank" class="btn btn-success" href="<?php echo RUTA_URL; ?>/Reportes/actaRepresentante">Estudiantes</a>
          </div>
        </div>

        <div class="col-4 mt-3">
          <div class="text-center">
            <a target="_blank" class="btn btn-success" href="<?php echo RUTA_URL; ?>/Reportes/boletin_descriptivo_preescolar">Profesores</a>
          </div>
        </div>
        

      </div><!--- Cierre del row --->    
      <hr class="mt-5">
    </div><!--- Cierre del primer container ---->

  </div>
</div>         
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>