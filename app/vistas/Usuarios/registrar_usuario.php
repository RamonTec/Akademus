<?php require_once RUTA_APP . "/vistas/inc/header.php";?>

<div class="container"><!---- Inicio del primer container ----->
  <h4 class="text-center pt-5">Registro de usuario</h4>

    <form action="<?php echo RUTA_URL; ?>/Usuarios/index" method="POST">

      <div class="row justify-content-center">
        <div class="col-md-3">      
          <input required class="form-control mt-4" id="ci" name="ci" placeholder="Cedula de identidad">
          <span id="ci_mensaje"></span>   
        </div>
      </div>

      <div class="row justify-content-center"><!---- Inicio del primer row ----->
        <div class="col-md-3">      
          <select required id="inputState" id="nacionalidad" name="nacionalidad" class="form-control">
            <option disabled selected>Nacionalidad...</option>
            <option value="V">Venezolano</option>
            <option value="E">Extranjero</option>
          </select>

          <select required id="sexo_p" name="sexo_p" class="form-control mt-4">
            <option disabled selected>Sexo...</option>
            <option value="M">Hombre</option>
            <option value="F">Mujer</option>
            <option value="O">Otro</option>
          </select> 
              
        </div>

        <div class="col-md-3"><!---- Inicio del primer col ----->
          <div class="form-group">
            <input required type="text" class="form-control" id="pnombre" name="pnombre" placeholder="Primer nombre">
            <input required type="text" class="form-control mt-4" id="segnombre" name="segnombre" placeholder="Segundo nombre">             
          </div>
        </div><!---- Cierre del primer col ----->

        <div class="col-md-3"><!---- Inicio del segundo col ----->
          <div class="form-group">              
            <input required type="text" class="form-control" id="papellido" name="papellido" placeholder="Primer apellido">
            <input required type="text" class="form-control mt-4" id="segapellido" name="segapellido" placeholder="Segundo apellido">
          </div>
        </div><!---- Cierre del segundo col ----->
      </div><!---- Cierre del primer row ----->

      <div class="row pt-3 justify-content-center"><!---- Inicio del segundo row ----->        
        <div class="col-md-3"><!---- Inicio del tercer col ----->
          <div class="form-group">
            <input required type="text" class="form-control mt-4" id="nom_u" name="nom_u" placeholder="Nombre de usuario">
            <input required type="password" class="form-control mt-4" id="clave" name="clave" placeholder="Primer contraseña">
          </div>
        </div><!---- Cierre del tercer col ----->
        <div class="col-md-3"><!---- Inicio del cuarto col ----->
          <div class="form-group mt-4">
            <?php
              if ($datos["mensaje"] == "No") {
                ?>                
                <select required id="inputState" id="privilegio" name="privilegio" class="form-control mt-4">
                    <option disabled selected>Privilegio</option>              
                    <option value="Director">Director</option>
                    <option value="Seccional">Seccional</option>
                  </select>
                <?php 
              } else{
                ?>
                  <select required id="inputState" id="privilegio" name="privilegio" class="form-control mt-4">
                    <option disabled selected>Privilegio</option>
                    <option value="Seccional">Seccional</option>
                  </select>
                <?php
              }
            ?>
          </div>
        </div><!---- Cierre del cuarto col ----->

        <div class="col-md-3"><!---- Inicio del quinto col ----->
          <div class="form-group">
            <select required id="inputState" id="pregunta_s" name="pregunta_s" class="form-control mt-4">
              <option disabled selected>Pregunta secreta</option>
              <option value="Nombre de mi primer mascota">Nombre de mi primer mascota</option>
              <option value="Carro favorito">Carro favorito</option>
              <option value="Color favorito">Color favorito</option>
              <option value="Nombre de mi mamá">Nombre de mi mamá</option>
              <option value="Comida favorita">Comida favorita</option>
              <option value="Pais que siempre he querido conocer">Pais que siempre he querido conocer</option>
            </select>
            <input type="text" class="form-control mt-4" id="respuesta_s" name="respuesta_s" placeholder="Respuesta secreta">          
          </div>
        </div><!---- Cierre del quinto col ----->
      </div><!---- Cierre del segundo row ----->

      <div class="row pt-3 justify-content-center"><!---- Inicio del tercer row ----->
        <div class="col-md-1"><!---- Inicio del sexto col ----->
          <div class="form-group"> 
            <button class="btn btn-success mt-4" type="submit">Registrarse</button>
          </div>
        </div><!---- Cierre del sexto col ----->
        
    </form>
</div><!---- Cierre del primer container ----->

 
<script type="text/javascript" src="<?php echo RUTA_URL; ?>/js/validar_registro_usuario.js"></script>
<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?>
