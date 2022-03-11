<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/registro_persona_representante" method="POST">
<h4 class="text-center pt-5">Registro de representante</h4>
<?php print_r($datos); ?>
  <div class="container">
    <div class="row">
      <div class="col-1 offset-2">
        <span>Identidad</span>
        <div class="form-group">          
          <select class="form-control" id="nacionalidad" name="nacionalidad">
            <option>...</option>
            <option value="V">V</option>
            <option value="E">E</option>
          </select>
        </div>          
      </div>
      <div class="col-3 mt-4">
        <div class="form-group">
          <input class="form-control" type="text" name="ci" id="ci" placeholder="Cedula de identidad">
          <input class="form-control" type="text" name="posee_po" id="posee_po" placeholder="Posee profesion">
        </div>
      </div>
      <div class="col-3 mt-4">
        <input class="form-control" type="text" name="nom_po" id="nom_po" placeholder="Nombre de la profesion">
        <input class="form-control" type="text" name="lugar_po" id="lugar_po" placeholder="Lugar de la profesion">
      </div>        
    </div>      
    <div class="row">
      <div class="col-1 offset-2">
        <span>Sexo.</span>
        <div class="form-group">          
          <select class="form-control" id="sexo_p" name="sexo_p">
            <option>...</option>
            <option value="M">Hombre</option>
            <option value="F">Mujer</option>
            <option value="O">Otros</option>
          </select>
        </div>          
      </div>
      <div class="col-3 mt-4">        
        <input class="form-control" type="text" name="pnombre" id="pnombre" placeholder="Primer nombre">
        <input class="form-control" type="text" name="papellido" id="papellido" placeholder="Primer apellido">        
      </div>
      <div class="col-3 mt-4">
        <input class="form-control" type="text" name="segnombre" id="segnombre" placeholder="Segundo nombre">
        <input class="form-control" type="text" name="segapellido" id="segapellido" placeholder="Segundo apellido">        
      </div>
    </div>    
    <div class="row">
      <div class="col-3 offset-3">          
        <input class="form-control" type="text" name="tlf_po" id="tlf_po" placeholder="Telefono de la profesion">
      </div>
      <div class="col-3">
        <input class="form-control" type="text" name="cod_area1" id="cod_area1" placeholder="Codigo de telefono">
      </div>
    </div>
    <div class="row">
      <div class="col-3 offset-3">        
        <input type="text" class="form-control" name="n_casa" id="n_casa" placeholder="Numero de casa">
        <input type="text" class="form-control" name="calle" id="calle" placeholder="Calle">
      </div>
      <div class="col-3">        
        <input type="text" class="form-control" name="pto_ref" id="pto_ref" placeholder="Punto de referencia">
        <input type="text" class="form-control" name="sector" id="sector" placeholder="Sector">
      </div>        
    </div>
    <div class="row">
      <div class="col-2 offset-3">
        <select class="form-control" id="nom_pais" name="nom_pais">
          <option>Pais</option>
          <option>Venezuela</option>
        </select>          
      </div>
      <div class="col-2">
        <select class="form-control" id="nom_estado" name="nom_estado">
          <option>Estado</option>
          <option>Anzoategui</option>
        </select>
      </div>
      <div class="col-2">
        <select class="form-control" id="nombre_muni" name="nombre_muni">
          <option>Municipio</option>
          <option>Simon Rodriguez</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-2 offset-3 mt-4">                
        <select class="form-control" id="tutor_legal" name="tutor_legal">
          <option>Tutor legal</option>
          <option value="Si" >Si</option>
          <option value="No" >No</option>          
        </select>
      </div>
      <div class="col-2 mt-4">
        <input class="form-control" type="text" name="numero1" id="numero1" placeholder="Numero de telefono">        
      </div>
      <div class="col-2 mt-4">        
        <input class="form-control" type="text" name="tipo1" id="tipo1" placeholder="Tipo de telefono">
      </div>
    </div>
    <div class="row">
      <div class="col-2 offset-5">
        <button type="submit" class="btn btn-primary ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>
<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>