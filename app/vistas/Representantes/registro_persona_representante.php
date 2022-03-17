<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/registro_persona_representante" method="POST">
<h4 class="text-center pt-5">Registro de representante primera vez</h4>

<h6 class="text-center">Los campos con * son obligatorios</h6>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-3 mt-4">
        <div class="form-group">          
          <select required class="form-control" id="nacionalidad" name="nacionalidad">
            <option required selected disabled option="0" > Nacionalidad*</option>
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
          </select>

          <select required class="form-control mt-3" id="sexo_p" name="sexo_p">
            <option required selected disabled option="0" >Sexo*</option>
            <option value="V">Hombre</option>
            <option value="E">Mujer</option>
          </select>
        </div>         
      </div>
      
      <div class="col-3 mt-4">
        <div class="form-group">
          <input required class="form-control" type="text" name="ci" id="ci" placeholder="Cedula de identidad*">
          <input required class="form-control" type="text" name="numero1" id="numero1" placeholder="Numero de telefono*">
        </div>
      </div>       
    </div>      
    
    <div class="row justify-content-center">
      
      <div class="col-3 mt-4">        
        <input required class="form-control" type="text" name="pnombre" id="pnombre" placeholder="Primer nombre*">
        <input required class="form-control" type="text" name="papellido" id="papellido" placeholder="Primer apellido*">        
      </div>
      <div class="col-3 mt-4">
        <input required class="form-control" type="text" name="segnombre" id="segnombre" placeholder="Segundo nombre*">
        <input required class="form-control" type="text" name="segapellido" id="segapellido" placeholder="Segundo apellido*">        
      </div>
    </div>

    <div class="row">
      
      <div class="col-6 offset-3">
        <input required class="form-control" type="text" name="nom_po" id="nom_po" placeholder="Profesion u Oficio *">
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-6">        
        <input required type="text" class="form-control" name="pto_ref" id="pto_ref" placeholder="Direccion del representante*">
      </div>        
    </div>
    <div class="row">
      <div class="col-2 offset-3">
        <select required class="form-control" id="nom_pais" name="nom_pais">
          <option required selected disabled option="0">Pais*</option>
          <option>Venezuela</option>
        </select>          
      </div>
      <div class="col-2">
        <select required class="form-control" id="nom_estado" name="nom_estado">
          <option required selected disabled option="0">Estado*</option>
          <option>Anzoategui</option>
        </select>
      </div>
      <div class="col-2">
        <select required class="form-control" id="nombre_muni" name="nombre_muni">
          <option required selected disabled option="0" >Municipio*</option>
          <option value="Simon Rodriguez">Simon Rodriguez</option>
          <option value="San Jose De Guanipa">San Jose De Guanipa</option>
        </select>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-2 mt-5">
        <button id="btn_representante_1" type="submit" class="btn btn-success ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>