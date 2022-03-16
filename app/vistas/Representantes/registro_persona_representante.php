<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/registro_persona_representante" method="POST">
<h4 class="text-center pt-5">Registro de representante primera vez</h4>

<h6 class="text-center">Los campos con * son obligatorios</h6>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-3 mt-4">
        <div class="form-group">          
          <select class="form-control" id="nacionalidad" name="nacionalidad">
            <option selected disabled option="0" > Nacionalidad*</option>
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
          </select>

          <select class="form-control mt-3" id="sexo_p" name="sexo_p">
            <option selected disabled option="0" >Sexo*</option>
            <option value="V">Hombre</option>
            <option value="E">Mujer</option>
          </select>
        </div>         
      </div>
      
      <div class="col-3 mt-4">
        <div class="form-group">
          <input number class="form-control" type="text" name="ci" id="ci" placeholder="Cedula de identidad*">
          <input number class="form-control" type="text" name="numero1" id="numero1" placeholder="Numero de telefono*">
        </div>
      </div>       
    </div>      
    
    <div class="row justify-content-center">
      
      <div class="col-3 mt-4">        
        <input class="form-control" type="text" name="pnombre" id="pnombre" placeholder="Primer nombre*">
        <input class="form-control" type="text" name="papellido" id="papellido" placeholder="Primer apellido*">        
      </div>
      <div class="col-3 mt-4">
        <input class="form-control" type="text" name="segnombre" id="segnombre" placeholder="Segundo nombre*">
        <input class="form-control" type="text" name="segapellido" id="segapellido" placeholder="Segundo apellido*">        
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
      <div class="col-2 mt-5">
        <button id="btn_representante_1" type="submit" class="btn btn-success ml-5">Registrar</button>
      </div>
    </div>
  </div>
</form>

<script src="">
      function habilitar() {
        ci = document.getElementById("ci").value
        val = 0
        if(ci == "") {
          val++
        }

        if(val == 0) {
          alert("hola")
          document.getElementById('btn_representante_1').disabled = false
        } else {
          document.getElementById('btn_representante_1').disabled = true
        }

      }
      document.getElementById("ci").addEventListener("keyup", habilitar())
    </script>
<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>