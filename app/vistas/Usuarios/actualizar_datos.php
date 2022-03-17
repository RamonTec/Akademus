<?php require_once RUTA_APP . "/vistas/inc/header.php";?>
<div class="container formulario">
    <div class="titulo-formulario col-md-8 col-xs-12  m-auto">
         <div class="row text-center">
             <div class="col-xs-12 col-md-8">
                 <h2>Actualizacion de usuario</h2>
                 <?php
                   print_r($datos);
                 ?>
             </div>
         </div>
     </div>
     <form class="formulario-login col-md-8 col-xs-12 m-auto" action="<?php echo RUTA_URL; ?>/Usuarios/actualizar_usuario" method="POST">
          <div class="row justify-content-center">
             <div class="col-md-4">
                 <div class="form-group text-center">                     
                    <input required type="text" class="text-center form-control" name="nombre_viejo" id="nombre_viejo" placeholder="Nombre de usuario viejo">

                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-4">
                 <div class="form-group text-center">                     
                     <input required type="text" class="text-center form-control" name="nom_u" id="nom_u" placeholder="Nombre de usuario nuevo">

                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-4">
                 <div class="form-group text-center">                     
                    <input required type="password" class="text-center form-control" name="clave" id="clave" placeholder="Clave">
                 </div>
             </div>
         </div>
         <div class="row justify-content-center">
             <div class="col-md-6 text-center">
                 <div class="form-group">
                     <button class="btn boton-de-envio mt-4 ml-5 mp-5" type="submit">Actualizar</button>
                 </div>
             </div>
         </div>
     </form>
</div>
<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?>
