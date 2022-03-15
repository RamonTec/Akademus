<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>        
<div class="container">
      <div class="container mt-3"><!--- Primer container ---->
  <h4 class="mt-5">Reportes disponibles</h4> 
    <div class="row mt-5"><!--- Inicio del segundo row --->

      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL ?>/Reportes/ficha_inscripcion">Ficha de inscripcion</a>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Representantes/obtener_representante">Boletin Descriptivo Preescolar</a>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Reportes/reportes">Boletin Descriptivo Primaria</a>
        </div>
      </div>
       
    </div><!--- Cierre del row --->    
    <hr class="mt-5">
  </div><!--- Cierre del primer container ---->
    </div>
</div>         
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>