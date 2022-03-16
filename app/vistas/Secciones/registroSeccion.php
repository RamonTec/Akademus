<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <br>
        <h2 class="text-center">Registro de seccion</h2>
      </div>
    </div>
  </div>
 
  <form action="<?php echo RUTA_URL; ?>/Secciones/registro_seccion" method="POST">
     
    <div class="row justify-content-center">  
      <div class="col-3 mt-4">        
        <select class="form-control mt-4" id="cod_sec" name="cod_sec">
          <option disabled value="" >--- Preescolar</option>
          <option value="Primer nivel" >Primer nivel</option>
          <option value="Segundo nivel" >Segundo nivel</option>
          <option value="Tercer nivel" >Tercer nivel</option>

          <option disabled value="" >--- Primaria </option>
          <option value="Primer Grado" >Primer Grado</option>
          <option value="Segundo Grado" >Segundo Grado</option>
          <option value="Tercer Grado" >Tercer Grado</option>
          <option value="Cuarto Grado" >Cuarto Grado</option>
          <option value="Quinto Grado" >Quinto Grado</option>
          <option value="Sexto Grado" >Sexto Grado</option>
        </select>

        <select class="form-control mt-4" id="nom_sec" name="nom_sec">
          <option disabled value="" >--- Seccion</option>
          <option value="A" >A</option>
          <option value="B" >B</option>
          <option value="C" >C</option>
        </select>

        <select class="form-control mt-4" id="turno" name="turno">
          <option disabled value="" >--- Turno</option>
          <option value="Mañana" >Mañana</option>
          <option value="Tarde" >Tarde</option>
        </select>

      </div>
    </div>
  <form>

  <div class="row justify-content-center">
    <div class="col-1 mt-4">
      <button type="submit" class="btn btn-success">Registrar</button>
    </div>
  </div>

  <?php
    if($datos) {
      ?> 
        <div class="row justify-content-center">
          <div class="col-4">
            <div class="text-center alert alert-danger mt-3" role="alert">
            <?php print_r($datos['mensaje']) ?>
          </div>
          </div>
        </div>
      <?php
    }

  ?>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
