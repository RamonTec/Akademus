<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/modificar_representante" method="POST">
<h4 class="text-center pt-5">Editar representante</h4>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-3 mt-4">
        <div class="form-group">          
          <select required class="form-control" id="nacionalidad" name="nacionalidad">
            <option selected disabled option="0" > Nacionalidad*</option>
            <option <?php if($datos[0] -> nacionalidad == 'V') echo 'selected' ?> value="V">Venezolano</option>
            <option <?php if($datos[0] -> nacionalidad == 'E') echo 'selected' ?> value="E">Extranjero</option>
          </select>

          <select required class="form-control mt-3" id="sexo_p" name="sexo_p">
            <option selected disabled option="0" >Sexo*</option>
            <option <?php if($datos[0] -> sexo_p == 'H') echo 'selected' ?> value="H">Hombre</option>
            <option <?php if($datos[0] -> sexo_p == 'M') echo 'selected' ?> value="M">Mujer</option>
          </select>
        </div>         
      </div>
      
      <div class="col-3 mt-4">
        <div class="form-group">
          <input required value="<?php echo $datos[0] -> ci ?>" number class="form-control" type="text" name="ci" id="ci" placeholder="Cedula de identidad*">
          <input required value="<?php echo $datos[0] -> numero1 ?>" class="form-control" type="text" name="numero1" id="numero1" placeholder="Numero de telefono*">
        </div>
      </div>       
    </div>      
    
    <div class="row justify-content-center">
      
      <div class="col-3 mt-4">        
        <input required value="<?php echo $datos[0] -> pnombre ?>" class="form-control" type="text" name="pnombre" id="pnombre" placeholder="Primer nombre*">
        <input required value="<?php echo $datos[0] -> papellido ?>" class="form-control" type="text" name="papellido" id="papellido" placeholder="Primer apellido*">        
      </div>
      <div class="col-3 mt-4">
        <input required value="<?php echo $datos[0] -> segnombre ?>" class="form-control" type="text" name="segnombre" id="segnombre" placeholder="Segundo nombre*">
        <input required value="<?php echo $datos[0] -> segapellido ?>" class="form-control" type="text" name="segapellido" id="segapellido" placeholder="Segundo apellido*">        
      </div>
    </div>

    <div class="row">
      
      <div class="col-6 offset-3">
        <input required value="<?php echo $datos[0] -> nom_po ?>" class="form-control" type="text" name="nom_po" id="nom_po" placeholder="Profesion u Oficio *">
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-6">        
        <input required value="<?php echo $datos[0] -> pto_ref ?>" type="text" class="form-control" name="pto_ref" id="pto_ref" placeholder="Direccion del representante*">
      </div>        
    </div>
    <div class="row">
      <div class="col-2 offset-3">
        <select required class="form-control" id="nom_pais" name="nom_pais">
          <option selected disabled option="0">Pais*</option>
          <option <?php if($datos[0] -> nom_pais == 'Venezuela') echo 'selected' ?>  >Venezuela</option>
        </select>          
      </div>
      <div class="col-2">
        <select required class="form-control" id="nom_estado" name="nom_estado">
          <option selected disabled option="0">Estado*</option>
          <option <?php if($datos[0] -> nom_estado == 'Anzoategui') echo 'selected' ?> >Anzoategui</option>
        </select>
      </div>
      <div class="col-2">
        <select required class="form-control" id="nombre_muni" name="nombre_muni">
          <option selected disabled option="0" >Municipio*</option>
          <option <?php if($datos[0] -> nombre_muni == 'Simon Rodriguez') echo 'selected' ?> value="Simon Rodriguez">Simon Rodriguez</option>
          <option <?php if($datos[0] -> nombre_muni == 'San Jose De Guanipa') echo 'selected' ?> value="San Jose De Guanipa">San Jose De Guanipa</option>
        </select>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-2 mt-5">
        <button id="btn_representante_1" type="submit" class="btn btn-success ml-5">Modificar</button>
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

<?php
  if($datos['mensaje'] != '') {
    $resultado_ci = strpos($datos['mensaje'], $datos['new_ci']);
    ?> 
      <div class="row justify-content-center mt-5">

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php 
            if($resultado_ci !== false) echo("Cedula registrada, intenta con otra cedula");
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