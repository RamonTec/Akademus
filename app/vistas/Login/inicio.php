<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>   
  <div class="container mt-5"><!--- Primer container ---->
  <h4 class="mt-5">Registrar</h4> 
    <div class="row mt-3"><!--- Inicio del segundo row --->
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL ?>/Secciones/index">Registrar seccion</a>
        </div>
      </div>                  
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/Estudiantes/index">Registrar estudiante</a>
        </div>
      </div>
      <hr> 
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL ?>/Profesores/index">Registrar profesor</a>
        </div>
      </div>  
    </div><!--- Cierre del row --->    
    <hr class="mt-5">
  </div><!--- Cierre del primer container ---->

  <div class="row justify-content-center mt-5">
    <img src="../public/img/logo.jpg" style="width:150px;">
  </div>

  <div class="container mt-3"><!--- Primer container ---->
  <h4 class="mt-5">Consultar</h4> 
    <div class="row mt-3"><!--- Inicio del segundo row --->
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL ?>/Secciones/obtener_una_seccion">Consultar seccion</a>
        </div>
      </div>                  
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/Representantes/obtener_representante">Consultar estudiantes</a>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-success" href="<?php echo RUTA_URL; ?>/Reportes/reportes">Generar reportes</a>
        </div>
      </div>
       
    </div><!--- Cierre del row --->    
    <hr class="mt-5">
  </div><!--- Cierre del primer container ---->
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>