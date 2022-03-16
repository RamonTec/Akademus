<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/registro_representante" method="POST">
<h4 class="text-center pt-5">Registro de representante que laboran en la institucion</h4>
<h6 class="text-center">Los campos con * son obligatorios</h6>

  <div class="container">

    <div class="row">
      <?php $_SESSION['ci_representante'] = $datos['ci_representante']; ?>
      <div class="col-3 offset-3 mt-5">
        <input disabled class="form-control" type="text" value="<?php echo($datos['pnombre']) ?>" name="pnombre" id="pnombre">
      </div> 
      
      <div class="col-3 mt-5">
        <input disabled class="form-control" type="text" value="<?php echo($datos['papellido']) ?>" name="papellido" id="papellido">
      </div>

    </div>

    <div class="row">
      
      <div class="col-6 offset-3">
        <input disabled class="form-control" type="text" value="<?php echo($datos['ci_representante']) ?>" name="ci_representante" id="ci_representante">
      </div>
    </div>

    <div class="row">
      
      <div class="col-6 offset-3">
        <input class="form-control" type="text" name="nom_po" id="nom_po" placeholder="Profesion u Oficio *">
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-6">        
        <input type="text" class="form-control" name="pto_ref" id="pto_ref" placeholder="Direccion del representante*">
      </div>        
    </div>

    <div class="row">
      <div class="col-2 offset-3">
        <select class="form-control" id="nom_pais" name="nom_pais">
          <option selected disabled option="0">Pais*</option>
          <option>Venezuela</option>
        </select>          
      </div>
      <div class="col-2">
        <select class="form-control" id="nom_estado" name="nom_estado">
          <option selected disabled option="0">Estado*</option>
          <option>Anzoategui</option>
        </select>
      </div>
      <div class="col-2">
        <select class="form-control" id="nombre_muni" name="nombre_muni">
          <option selected disabled option="0" >Municipio*</option>
          <option value="Simon Rodriguez">Simon Rodriguez</option>
          <option value="San Jose De Guanipa">San Jose De Guanipa</option>
        </select>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-6 mt-4">
        <input class="form-control" type="text" name="numero1" id="numero1" placeholder="Numero de telefono*">        
      </div>
    </div>
    <div class="row">
      <div class="col-2 offset-5 mt-4">
        <button type="submit" class="btn btn-success ml-5">Agregar representante</button>
      </div>
    </div>
  </div>
</form>
<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>