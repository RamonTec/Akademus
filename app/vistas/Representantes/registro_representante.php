<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
<div class="container formulario">
    <div class="row">
      <div class="col-md-4"></div>
         <div class="col-md-6">
           <br>
           <h2>Registro de representantes</h2>
         </div>
     </div>
 
<form action="<?php echo RUTA_URL; ?>/Representantes/registro_representante" method="POST">
     
    <div class="row">      
      <div class="col-md-2">
      <input class="form-group" type="text" name="ci" id="ci" placeholder="Cedula de identidad">
        <input class="form-group" type="text" name="posee_po" id="posee_po" placeholder="Posee profesion">
        <input class="form-group" type="text" name="nom_po" id="nom_po" placeholder="Nombre de la profesion">
        <input class="form-group" type="text" name="lugar_po" id="lugar_po" placeholder="Lugar de la profesion">
        <input class="form-group" type="text" name="tlf_po" id="tlf_po" placeholder="Telefono de la profesion">
      </div>      
      <div class="col-md-2">      
        <input class="form-group" type="text" name="n_casa" id="n_casa" placeholder="Numero de casa">    
        <input class="form-group" type="text" name="pto_ref" id="pto_ref" placeholder="Punto de referencia">    
        <input class="form-group" type="text" name="calle" id="calle" placeholder="Calle">            
        <input class="form-group" type="text" name="sector" id="sector" placeholder="Sector">        
        <input class="form-group" type="text" name="nom_pais" id="nom_pais" placeholder="Pais">        
        <input class="form-group" type="text" name="nom_estado" id="nom_estado" placeholder="Estado">        
        <input class="form-group" type="text" name="nombre_muni" id="nombre_muni" placeholder="Municipio">                
      </div>
      <div class="col-md-2">
        <input class="form-group" type="text" name="tutor_legal" id="posee_po" placeholder="Tutor legal">
      </div>  
      <div class="col-md-2">
        <input class="form-group" type="text" name="cod_area1" id="cod_area1" placeholder="Codigo de telefono">
        <input class="form-group" type="text" name="numero1" id="numero1" placeholder="Numero de telefono">
        <input class="form-group" type="text" name="tipo1" id="tipo1" placeholder="Tipo de telefono">
      </div>  
    </div>
    <button type="submit" >Registrarse</button>

<form>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
