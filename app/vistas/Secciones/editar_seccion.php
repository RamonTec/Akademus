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
      <div class="col-6 mt-4">        

        <div class="row justify-content-center">  
          <div class="col-6 mt-4">        
            <select required class="form-control mt-4" id="cod_sec" name="cod_sec">
              <option disabled value="" >--- Preescolar</option>
              <option <?php if($datos['cod_sec'] == 'Primer nivel') echo 'selected' ?> value="Primer nivel" >Primer nivel</option>
              <option <?php if($datos['cod_sec'] == 'Segundo nivel') echo 'selected' ?> value="Segundo nivel" >Segundo nivel</option>
              <option <?php if($datos['cod_sec'] == 'Tercer nivel') echo 'selected' ?> value="Tercer nivel" >Tercer nivel</option>

              <option disabled value="" >--- Primaria </option>
              <option <?php if($datos['cod_sec'] == 'Primer Grado') echo 'selected' ?> value="Primer Grado" >Primer Grado</option>
              <option <?php if($datos['cod_sec'] == 'Segundo Grado') echo 'selected' ?> value="Segundo Grado" >Segundo Grado</option>
              <option <?php if($datos['cod_sec'] == 'Tercer Grado') echo 'selected' ?> value="Tercer Grado" >Tercer Grado</option>
              <option <?php if($datos['cod_sec'] == 'Cuarto Grado') echo 'selected' ?> value="Cuarto Grado" >Cuarto Grado</option>
              <option <?php if($datos['cod_sec'] == 'Quinto Grado') echo 'selected' ?> value="Quinto Grado" >Quinto Grado</option>
              <option <?php if($datos['cod_sec'] == 'Sexto Grado') echo 'selected' ?> value="Sexto Grado" >Sexto Grado</option>
            </select>

            <select required class="form-control mt-4" id="nom_sec" name="nom_sec">
              <option disabled value="" >--- Seccion</option>
              
              <option <?php if($datos['nom_sec'] == 'A') echo 'selected' ?> value="A" >A</option>
              <option <?php if($datos['nom_sec'] == 'B') echo 'selected' ?> value="B" >B</option>
              <option <?php if($datos['nom_sec'] == 'C') echo 'selected' ?> value="C" >C</option>
            </select>

            <select required class="form-control mt-4" id="turno" name="turno">
              <option disabled value="" >--- Turno</option>
              <option <?php if($datos['turno'] == 'Mañana') echo 'selected' ?> value="Mañana" >Mañana</option>
              <option <?php if($datos['turno'] == 'Tarde') echo 'selected' ?> value="Tarde" >Tarde</option>
            </select>

          </div>
        </div>
      </div>
    </div>
  <form>

  <div class="row justify-content-center">
    <div class="col-1 mt-4">
      <button type="submit" class="btn btn-success">Modificar</button>
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
