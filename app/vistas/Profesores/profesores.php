<?php require_once RUTA_APP . "/vistas/inc/header.php" ?>

<div class="container mt-5">
<h4><p class="text-center pb-3 gestion-usuario">Gestion de profesores</p></h4>
<table class="table table-hover text-center tabla">
	<thead>		
		<tr>			
			<th>Cedula de identidad</th>
			<th>Primer nombre</th>
			<th>Primer apellido</th>
			<th>Tipo de Docente</th>
      <th>Codigo</th>
			<th>Acciones</th>
		</tr> 
	</thead> 
	<tbody>
    <?php
      if($datos) {
        foreach($datos['profesores'] as $profesor) : ?> 
          <tr>
          <td><?php echo $profesor -> ci ?></td>
          <td><?php echo $profesor -> pnombre ?></td>
          <td><?php echo $profesor -> papellido ?></td>
          <td><?php echo $profesor -> tipo_prof ?></td>
          <td><?php echo $profesor -> cod_prof ?></td>
            <td>								
              <a href="<?php echo RUTA_URL;?>/Profesores/editar_profesor_persona/<?php echo $profesor -> id_prof ?>">Editar</a> - 
                <a href="<?php echo RUTA_URL;?>/Profesores/eliminar_profesor/<?php echo $profesor -> id_prof ?>">Eliminar</a>
            </td>		
          </tr>
        <?php  endforeach;
      } else {
        ?>
        <div class="container"><!--- Primer container --->
          <div> 
            <p class="text-center">No hay profesores registrados.</p>
          </div>
        </div>
        <?php
      }

    ?>
		
	
	</tbody>
</table>
</div>



<?php require_once RUTA_APP . "/vistas/inc/footer.php" ?>