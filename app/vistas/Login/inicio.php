<?php require_once RUTA_APP . '/vistas/inc/header.php'; 


?>   
    <div class="container mt-5"><!--- Primer container ---->
        <div class="row"><!--- Inicio del segundo row --->                          
            <div class="col-8">
                <h3>Misión - visión</h3>
                <p class="text-justify">
                    Educar a jóvenes y adolescentes ofreciéndoles innovaciones pedagógicas
                    necesarias que les permite obtener experiencias enriquecedoras, con el fin de 
                    prepararlos para la vida y puedan asumir los nuevos retos educativos a través 
                    del reforzamiento de los diferentes valores éticos y morales inculcados por el docente.
                </p>
                <p class="text-justify">
                    Formar adolescentes y jóvenes con capacidad integral y de clidad en las 
                    especialidades de Ciencias, Humanidades y Áreas comerciales (en sus tres menciones:
                    Contabilidad, Secretariado y Mercadeo), para asumir el compromiso de formar seres 
                    sociales, humanistas, dignos y luchadores por nuestro país.
                </p>
            </div>
            <div class="col-4">
                <h4>Los sistemas informaticos.</h4>
                <p class="text-justify">
                    Las Tecnologías de la Información han sido conceptualizadas como la integración y convergencia de la computación, 
                    las telecomunicaciones y la técnica para el procesamiento de datos, donde sus principales componentes son: 
                    el factor humano, los contenidos de la información, el equipamiento, la infraestructura, el software y los 
                    mecanismos de intercambio de información, los elementos de política y regulaciones, 
                    además de los recursos financieros.
                </p>                                
            </div>
        </div><!--- Cierre del row --->    
    <hr>
    </div><!--- Cierre del primer container ---->
    <div class="container"><!--- Segundo container --->
    <h4 class="mt-5">Servicios</h4>    
        <div class="row"><!--- Inicio del segundo row --->                                      
            <div class="col-md-4 text-center">                       
                <img class="img-fluid pb-2" src="<?php echo RUTA_URL; ?>/img/icono_busqueda.png" width="150" alt="">               
                <p class="text-justify">
                    Podra buscar información relacionada en cuanto a los esutdiantes, representantes, usuarios y secciones registradas 
                    en el sistema, contando con un filtro para las busquedas en tiempo real.
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
                    El sistema le permitira poder gestional todo lo relacionado al proceso de control de notas y evaluaciones que se impartan
                    a los estudiantes.
                </p>
            </div>           
        </div><!--- Cierre del row --->
    <hr>
    </div><!--- Cierre del segundo container ---->
<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>