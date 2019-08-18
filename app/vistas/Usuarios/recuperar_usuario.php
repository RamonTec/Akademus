<?php require_once RUTA_APP . "/vistas/inc/header.php";?>

<div class="container formulario">
    <div class="titulo-formulario col-md-8 col-xs-12  m-auto">
         <div class="row text-center">
             <div class="col-xs-12 col-md-8">
                 <h2>Verificacion de usuario</h2>
                 <?php
                   print_r($datos);
                 ?>
             </div>
         </div>
     </div>
     <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Usuarios/recuperar_usuario" method="POST">
          <div class="row justify-content-center">
             <div class="col-xs-12 col-sm-6 col-md-6">
                 <div class="form-group text-center">
                     <label for="ci"><i class="fas fa-user"></i></label>
                     <input type="text" class="text-center form-control" name="ci" id="ci" placeholder="Cedula de identidad">
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-6">
                <select id="inputState" id="pregunta_s" name="pregunta_s" class="form-control mt-4">
                    <option selected>Pregunta secreta</option>
                    <option value="Nombre de mi primer mascota">Nombre de mi primer mascota</option>
                    <option value="Carro favorito">Carro favorito</option>
                    <option value="Color favorito">Color favorito</option>
                    <option value="Nombre de mi mamá">Nombre de mi mamá</option>
                    <option value="Comida favorita">Comida favorita</option>
                    <option value="Pais que siempre he querido conocer">Pais que siempre he querido conocer</option>
                </select>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-6">
                 <div class="form-group text-center">
                     <label for="respuesta_S"><i class="fas fa-unlock-alt"></i></label>
                     <input type="text" class="text-center form-control" name="respuesta_s" id="respuesta_s" placeholder="Respuesta secreta">
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-6 text-center">
                 <div class="form-group">
                     <button type="submit" class="btn boton-de-envio">Verificar</button>
                 </div>
             </div>
         </div>
     </form>
</div>

<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?>
