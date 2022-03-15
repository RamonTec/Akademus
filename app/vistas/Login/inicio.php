<?php require_once RUTA_APP . '/vistas/inc/header.php'; 


?>   
  <div class="container mt-5"><!--- Primer container ---->
  <h4 class="mt-5">Registrar</h4> 
    <div class="row mt-3"><!--- Inicio del segundo row --->
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL ?>/Secciones/index">Registrar seccion</a>
        </div>
      </div>                  
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Estudiantes/index">Registrar estudiante</a>
        </div>
      </div>
      <hr> 
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL ?>/Profesores/index">Registrar profesor</a>
        </div>
      </div>  
    </div><!--- Cierre del row --->    
    <hr class="mt-5">
  </div><!--- Cierre del primer container ---->

  <div class="container mt-3"><!--- Primer container ---->
  <h4 class="mt-5">Consultar</h4> 
    <div class="row mt-3"><!--- Inicio del segundo row --->
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL ?>/Secciones/obtener_una_seccion">Consultar seccion</a>
        </div>
      </div>                  
      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Representantes/obtener_representante">Consultar estudiantes</a>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="text-center">
          <a class="btn btn-primary" href="<?php echo RUTA_URL; ?>/Reportes/reportes">Generar reportes</a>
        </div>
      </div>
       
    </div><!--- Cierre del row --->    
    <hr class="mt-5">
  </div><!--- Cierre del primer container ---->

    <div class="container"><!--- Segundo container --->
    <h4 class="mt-5">Servicios</h4>    
        <div class="row"><!--- Inicio del segundo row --->                                      
            <div class="col-md-4 text-center">                       
                <img class="img-fluid pb-2" src="<?php echo RUTA_URL; ?>/img/icono_busqueda.png" width="150" alt="">               
                <p class="text-justify">
                  Podra buscar información relacionada en cuanto a los estudiantes, representantes, usuarios y secciones registradas 
                  en el sistema.
                </p>
            </div>                 
            <div class="col-md-4 text-center">     
              <img class="img-fluid mt-1 pb-3" src="<?php echo RUTA_URL; ?>/img/icono_registro_estudiante.png" width="150" alt="">                
              <p class="text-justify">
                Contara con el servicio de registro de estudiantes para la agilización del proceso de inscripción estudiantil.
              </p>
            </div>

            <div class="col-md-4 text-center">
              <img class="img-fluid pb-3" src="<?php echo RUTA_URL; ?>/img/icono_control_de_notas.png" width="150" alt="">
              <p class="text-justify">
                  El sistema le permitira poder gestional todo lo relacionado al proceso de inscripcion, reportes como boletines y actas de representante
                  y constancia de inscripcion.
              </p>
            </div>           
        </div><!--- Cierre del row --->
    <hr>
    </div><!--- Cierre del segundo container ---->
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>