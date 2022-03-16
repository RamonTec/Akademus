<?php require_once RUTA_APP . "/vistas/inc/header.php";?>
<br>
<br>
<br>
  <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-4">
      <form action="<?php echo RUTA_URL; ?>/Usuarios/modificarUsuario/<?php echo $datos['nombre_u']?>" method="POST">
        <br>
        <h3>Edicion de usuario</h3>
        <div class="form-group">
          <label for="nombre_u">Nombre de usuario</label>
          <input type="text" class="form-control" id="nombre_u" name="nombre_u" aria-describedby="emailHelp" placeholder="Nombre de usuario" value="<?php echo $datos['nombre_u'] ?>">
        </div>
        <div class="form-group">
          <label for="clave">Contraseña</label>
          <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave"
          value="<?php echo $datos['clave'] ?>">
        </div>
        <div class="form-group">
          <label for="privilegio">Privilegio de usuario</label>
          <input type="text" class="form-control" id="privilegio" name="privilegio" aria-describedby="emailHelp" placeholder="Privilegio" 
          value="<?php echo $datos['privilegio'] ?>">
        </div>
        <div class="form-group">
          <label for="pregunta_S">Pregunta secreta</label>
          <input type="text" class="form-control" id="pregunta_S" name="pregunta_S" aria-describedby="emailHelp" placeholder="Pregunta secreta"
          value="<?php echo $datos['pregunta_s'] ?>">
        </div>
        <div class="form-group">
          <label for="respuesta_S">Respuesta secreta</label>
          <input type="text" class="form-control" id="respuesta_S" name="respuesta_S" aria-describedby="emailHelp" placeholder="Respuesta secreta"
          value="<?php echo $datos['respuesta_s'] ?>">
        </div>
        <div class="form-group">
          <label for="respuesta_S">Cargo</label>
        </div>
        <br>
        <button class="btn boton-de-envio mt-4 ml-5 mp-5" type="submit">Actualizar usuario</button>
      </form>
    </div>
  </div>
<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?>
