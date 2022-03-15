<?php require_once RUTA_APP . '/vistas/inc/header.php' ?>
<div class="container mt-5">
  
  <?php
  
    if(empty($datos['seccion'])) {
      ?>
        <h4 class="text-center pt-3 gestion-usuario">
          No hay datos registrados para la seccion
        </h4>

      <?php

    } else {
      ?>

    <h4 class="text-center pt-3 gestion-usuario">
        <?php
          echo $datos["seccion"] -> cod_sec;
          echo " ";
          echo $datos["seccion"] -> nom_sec;
        ?>
      </h4>

      <h4 class="text-left pt-3 gestion-usuario">
        Profesor asignado: 
        <?php
          echo $datos["seccion"] -> pnombre;
          echo " ";
          echo $datos["seccion"] -> papellido;
        ?>
      </h4>

      <h4 class="text-left gestion-usuario">
        Estudiantes inscritos: 
        <?php
          echo count($datos["estudiantes"]);
        ?>
      </h4>

      <h4 class="text-left gestion-usuario">
        Turno: 
        <?php
          echo $datos["seccion"] -> turno;
        ?>
      </h4>
      <?php
    }
  ?>

  <table class="table table-striped text-center tabla">
    <thead>
      <tr>
        <th>Primer Nombre</th>
        <th>Primer Apellido</th>
        <th>Segundo Apellido</th>
        <th>Segundo Nombre</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($datos['estudiantes'] as $estudiante) : ?>
      <tr>
        <td><?php echo $estudiante -> pnom ?></td>
        <td><?php echo $estudiante -> pape ?></td>
        <td><?php echo $estudiante -> segape ?></td>
        <td><?php echo $estudiante -> segnom ?></td>
      </tr>
    <?php  endforeach;?>
    </tbody>
  </table>

</div>

<?php
    if($datos['mensaje'] != '') {
      ?> 
        <div class="row justify-content-center mt-5">

          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php 
              if($datos['mensaje']) echo($datos["mensaje"]);
            ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        </div>
      <?php
    }

  ?>

<?php require_once RUTA_APP . '/vistas/inc/footer.php' ?>