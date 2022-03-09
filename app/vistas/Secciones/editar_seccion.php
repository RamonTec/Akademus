<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <br>
        <h2 class="text-center">Editar seccion</h2>
      </div>
    </div>
  </div>
 
  <form action="<?php echo RUTA_URL; ?>/Secciones/editar_seccion/<?php echo $datos['id_seccion'] ?>" method="POST">
     
    <div class="row justify-content-center">  
      <div class="col-3 mt-4">        
        <input type="text" class="form-control" name="nom_sec" value="<?php if($datos['nom_sec']) echo $datos['nom_sec']  ?>" id="nom_sec" placeholder="Seccion">
        <input type="text" class="form-control" name="cod_sec" value="<?php if($datos['cod_sec']) echo $datos['cod_sec']  ?>" id="cod_sec" placeholder="Codigo de seccion">
      </div>
    </div>
  <form>

  <div class="row justify-content-center">
    <div class="col-1">
      <button type="submit" class="btn btn-primary">Modificar</button>
    </div>
  </div>

  <?php
    if($datos['mensaje'] != '') {
      $resultado = strpos($datos['mensaje'], $datos['nom_sec']);
      $resultado2 = strpos($datos['mensaje'], $datos['cod_sec']);
      ?> 
        <div class="row justify-content-center mt-5">

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
              if($resultado !== false) echo("Seccion registrada, intenta con otro nombre");
              if($resultado2 !== false) echo("Codigo registrado, intenta con otro codigo");
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      <?php
    }

  ?>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
