<?php require_once RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="container"><!---- Inicio del primer container ----->
  <h4 class="text-center pt-5 gestion-usuario">Atualización de usuario</h4>
    <form action="<?php echo RUTA_URL; ?>/Usuarios/editar_usuario/<?php echo $datos['id_u'] ?>" method="POST">
      <div class="row pt-3"><!---- Inicio del segundo row ----->        
        <div class="col-md-3 offset-1"><!---- Inicio del tercer col ----->
          <div class="form-group">
            <input type="text" class="form-control mt-4" id="nom_u" name="nom_u" value="<?php if($datos['nom_u']) echo $datos['nom_u']  ?>" placeholder="Nombre de usuario">
            <input type="password" class="form-control mt-4" id="clave" name="clave" placeholder="Primer contraseña">  
          </div>
        </div><!---- Cierre del tercer col ----->
        <div class="col-md-3"><!---- Inicio del cuarto col ----->
          <div class="form-group mt-4">
            <input type="text" class="form-control mt-4" id="clave2" placeholder="Segunda contraseña">
              <?php              
              $privilegio = trim($datos['privilegio']);                            
                if ($privilegio != "Director") {
                  ?>                
                  <select id="inputState" id="privilegio" name="privilegio" class="form-control mt-4">                              
                      <option value="Director" <?php if($privilegio == 'Director') echo 'selected' ?> >Director</option>
                      <option value="Autorizado" <?php if($privilegio == 'Autorizado') echo 'selected' ?> > Autorizado</option>
                      <option value="Seccional" <?php if($privilegio == 'Seccional') echo 'selected' ?> > Seccional</option>
                      <option value="Academico" <?php if($privilegio == 'Academico') echo 'selected' ?> > Academico</option>
                    </select>
                  <?php 
                } else{
                  ?>
                    <select id="inputState" id="privilegio" name="privilegio" class="form-control mt-4">                              
                      <option value="Autorizado" <?php if($privilegio == 'Autorizado') echo 'selected' ?>  >Autorizado</option>
                      <option value="Seccional" <?php if($privilegio == 'Seccional') echo 'selected' ?>  >Seccional</option>
                      <option value="Academico" <?php if($privilegio == 'Academico') echo 'selected' ?>  >Academico</option>
                    </select>
                  <?php
                }
              ?>
            </div>
        </div><!---- Cierre del cuarto col ----->
        <div class="col-md-3"><!---- Inicio del quinto col ----->
          <div class="form-group">
            <select id="inputState" id="pregunta_s" name="pregunta_s" class="form-control mt-4">
              <option selected>Pregunta secreta</option>
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
        <div class="col-md-3 offset-5">
          <button class="btn btn btn-primary mt-4 ml-5 mp-5" type="submit">Actualizar</button>
        </div>
      </div><!---- Cierre del segundo row ----->
    </form>
</div><!---- Cierre del primer container ----->






<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?> 