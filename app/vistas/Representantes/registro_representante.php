<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>
<div class="container formulario">
    <div class="row">
      <div class="col-md-4"></div>
         <div class="col-md-6">
           <br>
           <h2>Registro de representantes</h2>
         </div>
     </div>
 
<form action="<?php echo RUTA_URL; ?>/Estudiantes/registrarEstudiante" method="POST">
     <div class="accordion" id="accordionExample">
      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              Datos peronales de representantes
            </button>
          </h2>
        </div>
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="form-row">
              <div class="col-md-1"></div>
              <div class="form-group col-md-3">
                <label for="ci">Cedula de identidad</label>
                <input type="text" class="form-control" id="ci" name="ci" placeholder="Cedula de identidad">
              </div>
              <div class="form-group col-md-3">
                <label for="pnombre">Primer nombre</label>
                <input type="text" class="form-control" id="pnombre" name="pnombre" placeholder="Primer nombre">
              </div>
              <div class="form-group col-md-3">
                <label for="segnombre">Segundo nombre</label>
                <input type="text" class="form-control" id="segnombre" name="segnombre" placeholder="Segundo nombre">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3"></div>
              <div class="form-group col-md-3">
                <label for="papellido">Primer apellido</label>
                <input type="text" class="form-control" id="papellido" name="papellido" placeholder="Primer apellido">
              </div>
              <div class="form-group col-md-3">
                <label for="segapellido">Segundo apellido</label>
                <input type="text" class="form-control" id="segapellido" name="segapellido" placeholder="Segundo apellido">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3"></div>
              <div class="form-group col-md-3">
                <label for="otrosnombres">Otros nombres</label>
                <input type="text" class="form-control" id="inputEmail4" name="otrosnombres" placeholder="Nombre">
              </div>
              <div class="form-group col-md-3">
                <label for="otrosapellidos">Otros apellidos</label>
                <input type="text" class="form-control" id="inputPassword4" name="otrosapellidos" placeholder="Apellido">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-2"></div>
              <div class="form-group col-md-4">
                <label for="inputState">Nacionalidad</label>
                <select id="inputState" name="nacionalidad" class="form-control">
                  <option selected>Choose...</option>
                  <option value="V">Venezolano</option>
                  <option value="E">Extranjero</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="sexo">Sexo</label>
                <select id="sexo" name="sexo" class="form-control">
                  <option selected>Choose...</option>
                  <option value="M">Masculino</option>
                  <option value="F">Femenino</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col-md-1"></div>
              <div class="form-group col-md-3">
                <label for="cod_area1">Codigo de area</label>
                <select id="cod_area1" name="cod_area1" class="form-control">
                  <option selected>Elija...</option>
                  <option value="0424">0424</option>
                  <option value="0416">0416</option>
                  <option value="0412">0412</option>
                  <option value="0414">0414</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="numero1">Numero de telefono 1</label>
                <input type="text" class="form-control" id="numero1" name="numero1" placeholder="Numero de telefono">
              </div>
              <div class="form-group col-md-3">
                <label for="tipo1">Tipo de telefono</label>
                <select id="tipo1" name="tipo1" class="form-control">
                  <option selected>Elija...</option>
                  <option value="Movil">Movil</option>
                  <option value="Fijo">Fijo</option>
                </select>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-1"></div>
              <div class="form-group col-md-3">
                <label for="cod_area2">Codigo de area</label>
                <select id="cod_area2" name="cod_area2" class="form-control">
                  <option selected>Elija...</option>
                  <option value="0424">0424</option>
                  <option value="0416">0416</option>
                  <option value="0412">0412</option>
                  <option value="0414">0414</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="numero2">Numero de telefono 2</label>
                <input type="text" class="form-control" id="numero2" name="numero2" placeholder="Numero de telefono">
              </div>
              <div class="form-group col-md-3">
                <label for="tipo2">Tipo de telefono</label>
                <select id="tipo2" name="tipo2" class="form-control">
                  <option selected>Elija...</option>
                  <option value="Movil">Movil</option>
                  <option value="Fijo">Fijo</option>
                </select>
              </div>
            </div>
            <hr>
            <div class="form-row">
              <div class="col-md-3"></div>
              <div class="form-group col-md-3">
                <label for="nºcasa">Numero de casa</label>
                <input type="text" class="form-control" id="nºcasa" name="nºcasa" placeholder="Numero de casa">
              </div>
              <div class="form-group col-md-3">
                <label for="calle">Calle</label>
                <input type="text" class="form-control" id="calle" name="calle" placeholder="Calle de donde vive">
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-3"></div>
              <div class="form-group col-md-3">
                <label for="pto_ref">Punto de referencia</label>
                <textarea class="form-control" id="pto_ref" name="pto_ref"  rows="3"></textarea>
              </div>
              <div class="form-group col-md-3">
                <label for="sector">Sector</label>
                <input type="text" class="form-control" id="sector" name="sector" placeholder="Sector donde vive">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="nombre_pais">Pais</label>
                <select id="nombre_pais" name="nombre_pais" class="form-control">
                  <option selected>Elija...</option>
                  <option value="Venezuela">Venezuela</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="nombre_estado">Estado</label>
                <select id="nombre_estado" name="nombre_estado" class="form-control">
                  <option selected>Elija...</option>
                  <option value="Anzoategui">Anzoategui</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="nombre_muni">Municipio</label>
                <select id="nombre_muni" name="nombre_muni" class="form-control">
                  <option selected>Eleija...</option>
                  <option value="Simon Rodriguez">Simon Rodriguez</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
  

<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>
