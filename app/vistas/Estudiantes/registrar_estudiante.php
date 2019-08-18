<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>

<h4 class="text-center pt-5">Registro de estudiante</h4>
  <form id="registro_estudiante" action="<?php echo RUTA_URL?>/Estudiantes/registrar_estudiante" method="POST"s>
    <div class="container text-center">
 
    <div class="form-row">

      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control mt-4" id="ci_est" name="ci_est" placeholder="Cedula de identidad">
        <input type="text" class="form-control mt-4" id="pape" name="pape" placeholder="Primer apellido">
        <input type="text" class="form-control mt-4" id="otrosape" name="otrosape" placeholder="Otros apellidos">
      </div>

      <div class="form-group col-md-3">        
        <input type="text" class="form-control mt-4" id="pnom" name="pnom" placeholder="Primer nombre">
        <input type="text" class="form-control mt-4" id="segape" name="segape" placeholder="Segundo apellido">
        <select id="inputState" name="nacionalidad" class="form-control mt-4">
          <option selected>Nacionalidad</option>
          <option value="V">Venezolano</option>
          <option value="E">Extranjero</option>
        </select>
      </div>

      <div class="form-group col-md-3">        
        <input type="text" class="form-control mt-4" id="segnom" name="segnom" placeholder="Segundo nombre">
        <input type="text" class="form-control mt-4" id="otrosnom" name="otrosnom" placeholder="Otros nombres">
        <select id="sexo" name="sexo" class="form-control mt-4">
          <option selected>Sexo</option>
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
        </select>                  
      </div>

    </div>

    <div class="form-row">

      <div class="form-group col-md-3 offset-2">        
        <select id="cod_area1" name="cod_area1" class="form-control">
          <option selected>Elija...</option>
          <option value="0424">0424</option>
          <option value="0416">0416</option>
          <option value="0412">0412</option>
          <option value="0414">0414</option>
        </select>
      </div>

      <div class="form-group col-md-3">        
        <input type="text" class="form-control" id="numero1" name="numero1" placeholder="Numero de telefono">
      </div>

      <div class="form-group col-md-3">        
        <select id="tipo1" name="tipo1" class="form-control">
          <option selected>Elija...</option>
          <option value="Movil">Movil</option>
          <option value="Fijo">Fijo</option>
        </select>
      </div>

    </div>

    <div class="form-row mt-2">

      <div class="form-group col-md-3 offset-2">        
        <input type="text" class="form-control" id="nºcasa" name="nºcasa" placeholder="Numero de casa">
        <input type="text" class="form-control mt-3" id="calle" name="calle" placeholder="Calle de donde vive">
      </div>

      <div class="form-group col-md-3">                        
        <input type="text" class="form-control" id="sector" name="sector" placeholder="Sector donde vive">
      </div>

      <div class="form-group col-md-3">
        <textarea class="form-control" id="pto_ref" name="pto_ref" placeholder="Punto de referencia"  rows="3"></textarea>
      </div>

    </div>
            
    <div class="form-row">

      <div class="form-group col-md-3 offset-2">        
        <select id="nom_pais" name="nom_pais" class="form-control">                  
          <option value="Venezuela">Venezuela</option>
        </select>
      </div>

      <div class="form-group col-md-3">        
        <select id="nom_estado" name="nom_estado" class="form-control">                  
          <option value="Anzoategui">Anzoategui</option>
        </select>
      </div>

      <div class="form-group col-md-3">        
        <select id="nombre_muni" name="nombre_muni" class="form-control">                  
          <option value="Simon Rodriguez">Simon Rodriguez</option>
        </select>
      </div>

    </div>

    <hr>
       
    <div class="form-row">
      
      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control" id="ci_escolar" name="ci_escolar" placeholder="Cedula escolar">
        <select id="tipo_est" name="tipo_est" class="form-control mt-4">
          <option selected>Elija...</option>
          <option value="Nuevo ingreso">Nuevo ingreso</option>
          <option value="Regular">Regular</option>
          <option value="Repitiente">Repitiente</option>
        </select>
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="pasaporte" name="pasaporte" placeholder="Pasaporte">
        <textarea class="form-control mt-4" id="lugar_n" name="lugar_n" placeholder="Lugar de nacimiento" rows="3"></textarea>
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="ci_diplomatica" name="ci_diplomatica" placeholder="Cedula diplomatica">
        <input type="date" class="form-control mt-4 " id="fecha_n" name="fecha_n" placeholder="Fecha de nacimiento">
      </div>

    </div>

    <hr>
    
    <div class="form-row">

      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control" id="correo" name="correo" placeholder="Nombre del correo">
        
      </div>

      <div class="form-group col-md-3">                
        <select id="tipo_correo" name="tipo_correo" class="form-control">
          <option selected>Correo</option>
          <option value="Gmail">Gmail</option>
          <option value="Hotmail">Hotmail</option>
          <option value="yahoo">yahoo</option>
          <option value="outlok">outlok</option>
        </select>
       
      </div>

      <div class="form-group col-md-3">                
        
        
      </div>

    </div>

    <hr>

    <div class="form-row">

      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control" id="posee_can" name="posee_can" placeholder="Tiene canaima">
        <select id="modelo_can" name="modelo_can" class="form-control mt-4">
          <option selected>Tipo de canaima</option>
          <option value="Letras rojas">Letras rojas</option>
          <option value="Letras azules">Letras azules</option>
        </select>
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="codigo_can" name="codigo_can" placeholder="Codigo de la caniama">
        <select id="condicion_can" name="condicion_can" class="form-control mt-4">
          <option selected>Estado de la canaima</option>
          <option value="Buen estado">Buen estado</option>
          <option value="Regular">Regular</option>
          <option value="Mal estado">Mal estado</option>
        </select>
      </div>

      <div class="form col-md-3">
        <input type="text" class="form-control" id="serial_can" name="serial_can" placeholder="Serial de la canaima">
      </div>

    </div>
           
    <hr>

    <div class="form-row">

      <div class="form-group col-md-3 offset-2">            
        <input type="text" class="form-control" id="posee_beca" name="posee_beca" placeholder="Posee beca">
      </div>

      <div class="form-group col-md-3">                
        <select id="tipo_bca" name="tipo_beca" class="form-control">
          <option selected>Tipo de beca</option>
          <option value="Deportiva">Deportiva</option>
          <option value="Cultural">Cultural</option>
          <option value="Gubernamental">Gubernamental</option>
        </select>
      </div>

      <div class="form-group col-md-3">                
        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción de la canaima" rows="3"></textarea>
      </div>

    </div>

    <hr>
    
    <div class="form-row">

      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control" id="talla_c" name="talla_c" placeholder="Talla de camisa">
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="talla_p" name="talla_p" placeholder="Talla de pantalones">
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="talla_z" name="talla_z" placeholder="Talla de zapatos">
      </div>

    </div>

    <hr>

    <div class="form-row">

      <div class="form-group col-md-3 offset-2">                
        <input type="text" class="form-control" id="nombre_pro" name="nombre_pro" placeholder="Institucion de procedencia">
      </div>

      <div class="form-group col-md-3">                
        <input type="text" class="form-control" id="cod_dea" name="cod_dea" placeholder="Codigo DEA de la institucion">
      </div>

    </div>
          
   

    <hr>

    <div class="form-row">
  
      <div class="form-group col-md-3 offset-2">
        
        <input type="text" class="form-control" id="condicion_s" name="condicion_s" placeholder="Condicion del estudiante">
      </div>

      <div class="form-group col-md-3">
        
        <textarea class="form-control" id="observacion_s" name="observacion_s" placeholder="Observacion medica" rows="3"></textarea>
      </div>

    </div>

    <div class="form-row">
              
      <div class="form-group col-md-3 offset-2">        
        <input type="text" class="form-control" id="peso" name="peso" placeholder="Altura del estudiante">
      </div>
      <div class="form-group col-md-3">        
        <input type="text" class="form-control" id="altura" name="altura" placeholder="Peso del Estudiante">
      </div>

    </div>
  
    <hr> 
        
    <div class="form-row">
              
      <div class="form-group col-md-3 offset-2">
        <input type="text" class="form-control" id="nombre_i" name="nombre_i" placeholder="Incapacidad del estudiante">
        <select id="tipo_i" name="tipo_i" class="form-control mt-4">
          <option selected>Elija...</option>
          <option value="Gmail">Gmail</option>
          <option value="Hotmail">Hotmail</option>
          <option value="yahoo">yahoo</option>
          <option value="outlok">outlok</option>
        </select>
      </div>

      <div class="form-group col-md-3">
        <input type="text" class="form-control" id="nom_d" name="nom_d" placeholder="Discapacidad del estudiante">
        <select id="tipo_d" name="tipo_d" class="form-control mt-4">
          <option selected>Elija...</option>
          <option value="Gmail">Gmail</option>
          <option value="Hotmail">Hotmail</option>
          <option value="yahoo">yahoo</option>
          <option value="outlok">outlok</option>
        </select>
      </div>

    </div> 
      
    <hr>

    <div class="form-row">
      
      <div class="form-group col-md-3 offset-2">
        
        <input type="text" class="form-control" id="nom_t" name="nom_t" placeholder="Tratamiento del estudiante">
      </div>
      <div class="form-group col-md-3">
        
        <select id="tipo_t" name="tipo_t" class="form-control">
          <option selected>Elija...</option>
          <option value="Gmail">Gmail</option>
          <option value="Hotmail">Hotmail</option>
          <option value="yahoo">yahoo</option>
          <option value="outlok">outlok</option>
        </select>
      </div>
      
    </div>
            
    <hr>

    <div class="form-row">
      
      <div class="form-group col-md-3 offset-2">
        
        <textarea class="form-control" id="descripcion_v" name="descripcion_v" placeholder="Descripcion de las vacunas"  rows="3"></textarea>
      </div>
      <div class="form-group col-md-3">
        
        <select id="falva_v" name="falta_v" class="form-control">
          <option selected>Elija...</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

    </div>       
            
    <hr>

    <div class="form-row">
      
      <div class="form-group col-md-3 offset-2">
        
        <textarea class="form-control" id="nom_e" name="nom_e" placeholder="Descripcion de enfermedad" rows="3"></textarea>
      </div>
      <div class="form-group col-md-3">
        
      <select id="tipo_2" name="tipo_e" class="form-control">
          <option selected>Elija...</option>
          <option value="Si">Si</option>
          <option value="No">No</option>
        </select>
      </div>

    </div>

 </div>
          
  <button type="submit" class="btn btn-primary">Registrar</button>

</form>




<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
