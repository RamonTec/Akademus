<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Link Estilos de Bootstrap-->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo RUTA_URL; ?>/img/logo.jpg">
    <link rel="stylesheet" href="<?php echo RUTA_URL;?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL;?>/css/fonts.css">
    <link rel="stylesheet" href="<?php echo RUTA_URL;?>/css/estilos_elias.css">
        
    <title><?php echo NOMBRE_SITIO ?></title>
    
<body>
    <?php
       
      if (empty($_SESSION['nom_u'])) {
        ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-success">
              <a class="navbar-brand ml-5 px-5" href="<?php echo RUTA_URL ?>">Sistema De Informacion U.E. JOSE RAFAEL POCATERRA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
        <?php
      } else {
        ?>
          <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">   
              <a class="navbar-brand" href="<?php echo RUTA_URL; ?>/Logins/inicio">Sistema De Informacion U.E. JOSE RAFAEL POCATERRA</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
              <div class="collapse navbar-collapse flex-columm" id="navbarSupportedContent">
                  <ul class="navbar-nav ml-auto">
                      
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" 
                          aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks" data-toggle="tooltip" title="Sección donde se puede gestionar la informacion registrada en el sistema."></i> 
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/Estudiantes/estudiantes">Estudiantes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/Representantes/representantes">Representantes</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/Profesores/profesores">Profesores</a>
                            <div class="dropdown-divider"></div>                              
                            <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/Usuarios/usuarios">Usuarios</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo RUTA_URL; ?>/Secciones/secciones">Secciones</a>
                          </div>
                      </li>
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fas fa-cogs" data-toggle="tooltip" title="Sección donde se puede crear el respaldo y la restauracion de toda la informacion registrada en el sistema."></i>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="<?php echo RUTA_URL ?>/Configuraciones/index">Respaldo</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Restauración</a> 
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?php echo RUTA_URL ?>/Logins/cerrar_sesion">Cerrar sesión</a>
                          </div>                    
                      </li>          
                  </ul>                
              </div>
          </div>
        <?php
      }
    ?>
</nav>
    
